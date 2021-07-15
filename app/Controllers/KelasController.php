<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class KelasController extends BaseController
{

	protected $kelas;

	public function __construct()
	{
		$this->kelas = new KelasModel();
	}

	public function index()
	{
		if (session()->get('id_akses') != 1) {
			return redirect()->back();
		}
		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');

		if ($keyword) {
			$kelas = $this->kelas->search($keyword);
		} else {
			$kelas = $this->kelas->asObject();
		}

		return view('app/kelas/index', [
			'title' => 'Halaman Daftar Kelas',
			'validation' => $this->validation,
			'kelas' => $kelas->paginate(5, 'kelas'),
			'pager' => $this->kelas->pager,
			'currentPage' =>$currentPage
		]);
	}

	public function create()
	{
		$rules = [
			'kelas' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama kelas harus diisi',
				]
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jurusan harus diisi'
				]
			],
			'tahun' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tahun harus diisi'

				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('kelas')->withInput();
		}

		$this->kelas->save([
			'kelas' => $this->request->getVar('kelas'),
			'jurusan' => $this->request->getVar('jurusan'),
			'tahun' => $this->request->getVar('tahun'),

		]);
		$this->session->setFlashdata('pesan', 'Data kelas dengan kelas ' . $this->request->getVar('kelas') . ' ' . $this->request->getVar('jurusan') . ' telah ditambahkan');
		return redirect()->route('kelas');
	}

	public function delete($id)
	{
		$this->kelas->delete($id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->route('kelas');
	}

	public function update($id = null)
	{
		$rules = [
			'kelas' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama kelas harus diisi',
				]
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jurusan harus diisi'
				]
			],
			'tahun' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tahun harus diisi'

				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('kelas')->withInput();
		}

		$this->kelas->update($id, [
			'kelas' => $this->request->getVar('kelas'),
			'jurusan' => $this->request->getVar('jurusan'),
			'tahun' => $this->request->getVar('tahun'),

		]);
		$this->session->setFlashdata('pesan', 'Data kelas dengan kelas ' . $this->request->getVar('kelas') . ' ' . $this->request->getVar('jurusan') . ' telah diperbaharui');
		return redirect()->route('kelas');
	}
}
