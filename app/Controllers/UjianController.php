<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SoalModel;
use App\Models\UjianModel;

class UjianController extends BaseController
{
	protected $ujian;
	protected $soal;

	public function __construct()
	{
		$this->ujian = new UjianModel();
		$this->soal = new SoalModel();
	}

	public function index()
	{
		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$ujian = $this->ujian->search($keyword)->asObject();
		} else {
			$ujian = $this->ujian->getAll()->asObject();
		}

		return view('app/ujian/index', [
			'title' => 'Halaman Ujian',
			'validation' => $this->validation,
			'ujian' => $ujian->paginate(3, 'ujian'),
			'pager' => $ujian->pager
		]);
	}

	public function create()
	{
		$rules = [
			'ujian' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama ujian harus diisi'
				]
			],
			'date' => [
				'rule' => 'required',
				'errors' => [
					'required' => 'Tanggal ujian harus diisi'
				]
			],
			'time' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Waktu ujian harus diisi'
				]
			]
		];


		if (!$this->validate($rules)) {
			return redirect()->route('ujian')->withInput();
		}

		$this->ujian->save([
			'ujian' => $this->request->getVar('ujian'),
			'id_mapel' => $this->request->getVar('id_mapel'),
			'date' => $this->request->getVar('date'),
			'time' => $this->request->getVar('time'),
		]);

		$this->session->setFlashdata('pesan', 'Data ujian dengan nama ujian ' . $this->request->getVar('ujian') . ' telah ditambahkan');

		return redirect()->route('ujian');
	}

	public function edit($id)
	{
		return view('app/ujian/update', [
			'title' => 'Halaman Edit Ujian',
			'validation' => $this->validation,
			'ujian' => $this->ujian->asObject()->where('id', $id)->first()

		]);
	}

	public function update($id = null)
	{
		$rules = [
			'ujian' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama ujian harus diisi'
				]
			],
			'date' => [
				'rule' => 'required',
				'errors' => [
					'required' => 'Tanggal ujian harus diisi'
				]
			],
			'time' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Waktu ujian harus diisi'
				]
			]
		];


		if (!$this->validate($rules)) {
			return redirect()->route('ujian')->withInput();
		}

		$ujian = $this->ujian->where('id', $id)->first();

		if ($this->request->getVar('id_mapel')) {
			$mapel = $this->request->getVar('id_mapel');
		} else {
			$mapel = $ujian['id_mapel'];
		}

		$this->ujian->update($id, [
			'ujian' => $this->request->getVar('ujian'),
			'id_mapel' => $mapel,
			'date' => $this->request->getVar('date'),
			'time' => $this->request->getVar('time'),
		]);

		$this->session->setFlashdata('pesan', 'Data ujian dengan nama ujian ' . $this->request->getVar('ujian') . ' telah diperbaharui');

		return redirect()->route('ujian');
	}

	public function delete($id = null)
	{
		$this->ujian->delete($id);
		$this->soal->delete('id_ujian', $id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->route('ujian');
	}

	public function detail($id)
	{
		return view('app/ujian/detail', [
			'title' => 'Halaman Detail Ujian',
			'ujian' => $this->ujian->asObject()->where('id', $id)->first(),
			'soal' => $this->soal->asObject()->where('id_ujian', $id)->findAll(),
		]);
	}
}
