<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MapelModel;

class MapelController extends BaseController
{
	protected $mapel;
	public function __construct()
	{
		$this->mapel = new MapelModel();
	}
	public function index()
	{
		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$mapel = $this->mapel->search($keyword)->asObject();
		} else {
			$mapel = $this->mapel->getAll()->asObject();
		}

		return view('app/mapel/index', [
			'title' => 'Halaman Mata Pelajaran',
			'mapel' => $this->mapel->paginate(5, 'mapel'),
			'pager' => $this->mapel->pager,
			'validation' => $this->validation
		]);
	}

	public function create()
	{

		$rules = [

			'mapel' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Mata Pelajaran harus diisi'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('mapel')->withInput();
		}

		if ($this->request->getVar('active')) {
			$active = $this->request->getVar('active');
		} else {
			$active = 0;
		}

		$this->mapel->save([
			'mapel' => $this->request->getVar('mapel'),
			'id_guru' => $this->request->getVar('id_guru'),
			'id_kelas' => $this->request->getVar('id_kelas'),
			'active' => $active,
		]);
		$this->session->setFlashdata('pesan', 'Data mapel dengan mata pelajaran ' . $this->request->getVar('mapel') . ' telah ditambahkan');
		return redirect()->route('mapel');
	}

	public function update($id = null)
	{

		$rules = [

			'mapel' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Mata Pelajaran harus diisi'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('mapel')->withInput();
		}

		$mapel = $this->mapel->where('id', $id)->first();

		if ($this->request->getVar('id_guru')) {
			$guru = $this->request->getVar('id_guru');
		} else {
			$guru = $mapel['id_guru'];
		}

		if ($this->request->getVar('id_kelas')) {
			$kelas = $this->request->getVar('id_kelas');
		} else {
			$kelas = $mapel['id_kelas'];
		}

		if ($this->request->getVar('active')) {
			$active = $this->request->getVar('active');
		} else {
			$active = 0;
		}

		$this->mapel->update($id, [
			'mapel' => $this->request->getVar('mapel'),
			'id_guru' => $guru,
			'id_kelas' => $kelas,
			'active' => $active,
		]);
		$this->session->setFlashdata('pesan', 'Data mapel dengan mata pelajaran ' . $this->request->getVar('mapel') . ' telah ditambahkan');
		return redirect()->route('mapel');
	}

	public function delete($id = null)
	{
		$this->mapel->delete($id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->route('mapel');
	}
}
