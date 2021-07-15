<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SoalModel;
use App\Models\UjianModel;

class SoalController extends BaseController
{
	protected $soal;
	protected $ujian;
	public function __construct()
	{
		$this->soal = new SoalModel();
		$this->ujian = new UjianModel();
	}
	public function index($id = null)
	{


		return view('app/soal/index', [
			'title' => 'Halaman Tambah Soal',
			'ujian' => $this->ujian->where('id', $id)->first(),
			'validation' => $this->validation
		]);
	}

	public function create()
	{
		$rules = [
			'soal' => [
				'rules'  => 'required',
				'errors' => [

					'required' => 'Soal harus diisi',
				]
			],

		];

		$ujian = $this->request->getVar('id_ujian');

		if (!$this->validate($rules)) {
			return redirect()->to(base_url('soal/get/' . $ujian))->withInput();
		}

		$this->soal->save([
			'soal' => $this->request->getVar('soal'),
			'a' => $this->request->getVar('a'),
			'b' => $this->request->getVar('b'),
			'c' => $this->request->getVar('c'),
			'd' => $this->request->getVar('d'),
			'e' => $this->request->getVar('e'),
			'id_ujian' => $ujian,
		]);

		$this->session->setFlashdata('pesan', 'Data soal telah ditambahkan');
		return redirect()->to(base_url('soal/get/' . $ujian));
	}

	public function delete($id = null)
	{
		$data = $this->soal->asObject()->where('id', $id)->first();

		$this->soal->delete($id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->to(base_url('ujian/detail/' . $data->id_ujian));
	}

	public function edit($id)
	{
		$soal = $this->soal->asObject()->where('id', $id)->first();
		return view('app/soal/edit', [
			'title' => 'Halaman Edit Soal',
			'ujian' => $this->ujian->where('id', $soal->id_ujian)->first(),
			'validation' => $this->validation,
			'soal' => $soal
		]);
	}

	public function update($id)
	{
		$rules = [
			'soal' => [
				'rules'  => 'required',
				'errors' => [

					'required' => 'Soal harus diisi',
				]
			],

		];

		$ujian = $this->request->getVar('id_ujian');

		if (!$this->validate($rules)) {
			return redirect()->to(base_url('soal/get/' . $ujian))->withInput();
		}

		$soal = $this->soal->where('id', $id)->first();

		if ($this->request->getVar('a')) {
			$a = $this->request->getVar('a');
		} else if ($this->request->getVar('a') == null) {
			$a = $soal['a'];
		}

		if ($this->request->getVar('b')) {
			$b = $this->request->getVar('b');
		} else if ($this->request->getVar('b') == null) {
			$b = $soal['b'];
		}

		if ($this->request->getVar('c')) {
			$c = $this->request->getVar('c');
		} else if ($this->request->getVar('c') == null) {
			$c = $soal['c'];
		}

		if ($this->request->getVar('d')) {
			$d = $this->request->getVar('d');
		} else if ($this->request->getVar('d') == null) {
			$d = $soal['d'];
		}

		if ($this->request->getVar('e')) {
			$e = $this->request->getVar('e');
		} else if ($this->request->getVar('e') == null) {
			$e = $soal['e'];
		}

		$this->soal->update($id, [
			'soal' => ($this->request->getVar('soal')) ? $this->request->getVar('soal') : $soal->soal,
			'a' => $a,
			'b' => $b,
			'c' => $c,
			'd' => $d,
			'e' => $e,
			'id_ujian' => ($ujian) ? $ujian : $soal->id_ujian,
		]);

		$this->session->setFlashdata('pesan', 'Data soal telah diperbaharui');
		return redirect()->to(base_url('ujian/detail/' . $ujian));
	}
}
