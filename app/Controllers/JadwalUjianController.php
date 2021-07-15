<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{ActivityModel, JawabanModel, SiswaModel, UjianModel, SoalModel};
use Config\Database;
use Dompdf\Dompdf;

class JadwalUjianController extends BaseController
{
	protected $ujian;
	protected $soal;
	protected $activity;
	protected $jawaban;
	protected $siswa;
	protected $page;


	public function __construct()
	{
		$this->ujian = new UjianModel();
		$this->soal = new SoalModel();
		$this->activity = new ActivityModel();
		$this->jawaban = new JawabanModel();
		$this->siswa = new SiswaModel();
	}

	public function index()
	{

		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$ujian = $this->ujian->searchJadwal($keyword)->asObject();
		} else {
			$ujian = $this->ujian->asObject()->getJadwal();
		}

		return view('app/jadwal/index', [
			'title' => 'Daftar Jadwal Ujian',
			'ujian' => $ujian->paginate(5, 'ujian'),
			'pager' => $ujian->pager
		]);
	}

	public function start($id)
	{
		// $ujian = $this->ujian->asObject()->where('id', $id)->first();
		$soal = $this->soal->where('id_ujian', $id)->findAll();
		$user = $this->siswa->where('id', auth()->id)->first();
		session()->set('start');
		$db      = Database::connect();
		$builder = $db->table('jawaban');
		for ($i = 0; $i < count($soal); $i++) {
			$builder->insert([
				'id_soal' => $soal[$i]['id'],
				'id_ujian' => $soal[$i]['id_ujian'],
				'id_siswa' => $user['id']
			]);
		}


		return redirect()->to(base_url('jadwal/get/' . $id));
	}

	public function get($id)
	{
		$currentPage = $this->request->getVar('page_soal') ? $this->request->getVar('page_soal') :
			1;
		$ujian = $this->ujian->where('id', $id)->first();

		$soal = $this->soal->asObject()->where('id_ujian', $id);

		return view('app/jadwal/start', [
			'title' => 'Halaman Pengerjaan Soal',
			'soal' => $soal->paginate(1, 'soal'),
			'pager' => $soal->pager,
			'ujian' => $this->ujian->asObject()->where('id', $id)->first(),
			// 'jawaban' => $this->jawaban->asObject()->where(['id_soal' => 1, 'id_siswa' => auth()->id])->first()
			'currentPage' => $currentPage
		]);
	}

	public function finish()
	{
		session()->remove('start');
		$this->session->setFlashdata('pesan', 'Selamat anda telah menyelesaikan ujian ini');
		return redirect()->route('jadwal');
	}

	public function soalUpdate($id)
	{
		$jawaban = $this->jawaban->asObject()->where('id_soal', $id)->first();
		$this->jawaban->update($jawaban->id, [
			'jawaban' => $this->request->getVar('jawaban')
		]);

		return redirect()->to(base_url('jadwal/get/' . $jawaban->id_ujian . '?page_soal=' . $this->request->getVar('page_soal')));
	}

	public function doc_ujian()
	{
		$dompdf = new Dompdf();

		$dompdf->loadHtml(view('app/pdf/index'));
		$dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream();
	}
}
