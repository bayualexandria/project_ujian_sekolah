<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class GuruController extends BaseController
{
	protected $guru;
	public function __construct()
	{
		$this->guru = new GuruModel();
	}
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		if (session()->get('id_akses') != 1) {
			return redirect()->back();
		}
		// $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$guru = $this->guru->search($keyword);
		} else {
			$guru = $this->guru;
		}

		return view('app/guru/index', [
			'title' => 'Halaman Daftar Guru',
			'guru' => $guru->paginate(10, 'guru'),
			'pager' => $this->guru->pager,
			'validation' => $this->validation
		]);
	}

	public function create()
	{
		$rules = [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'nip' => [
				'rules' => 'required|is_unique[guru.nip]',
				'errors' => [
					'required' => 'NIP harus diisi',
					'is_unique' => 'NIP sudah terdaftar'
				]
			],
			'password' => [
				'rules'  => 'required|min_length[6]|matches[confPassword]',
				'errors' => [
					'min_length' => 'Password minimal 6 karakter',
					'required' => 'Password harus diisi',
					'matches' => 'Password tidak sama'
				]
			],
			'confPassword' => [
				'rules'  => 'required|min_length[6]|matches[password]',
				'errors' => [
					'min_length' => 'Konfirmasi Password minimal 6 karakter',
					'required' => 'Konfirmasi Password harus diisi',
					'matches' => 'Konfirmasi Password tidak sama'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('guru')->withInput();
		}

		if ($this->request->getVar('active')) {
			$active = $this->request->getVar('active');
		} else {
			$active = 0;
		}

		$this->guru->save([
			'nip' => $this->request->getVar('nip'),
			'name' => $this->request->getVar('name'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'gender' => $this->request->getVar('gender'),
			'active' => $active,
		]);
		$this->session->setFlashdata('pesan', 'Data guru dengan nama ' . $this->request->getVar('name') . ' telah ditambahkan');
		return redirect()->route('guru');
	}

	public function update($id = null)
	{
		$rules = [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'nip' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'NIP harus diisi',
					'is_unique' => 'NIP sudah terdaftar'
				]
			],
			'password' => [
				'rules'  => 'matches[confPassword]',
				'errors' => [
					'matches' => 'Password tidak sama'
				]
			],
			'confPassword' => [
				'rules'  => 'matches[password]',
				'errors' => [
					'matches' => 'Konfirmasi Password tidak sama'
				]
			],

		];

		if (!$this->validate($rules)) {
			return redirect()->route('guru')->withInput();
		}

		$guru = $this->guru->where('id', $id)->first();

		if ($this->request->getVar('password')) {
			$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		} else {
			$password = $guru['password'];
		}

		if ($this->request->getVar('gender')) {
			$gender = $this->request->getVar('gender');
		} else if ($this->request->getVar('gender') == null) {
			$gender = $guru['gender'];
		}

		$this->guru->update($id, [
			'name' => $this->request->getVar('name'),
			'nip' => $this->request->getVar('nip'),
			'password' => $password,
			'active' => $this->request->getVar('active') ?? $guru['active'],
			'gender' => $gender,
		]);

		$this->session->setFlashdata('pesan', 'Data guru dengan nama ' . $this->request->getVar('name') . ' telah diubah');
		return redirect()->route('guru');
	}


	public function delete($id = null)
	{
		$this->guru->delete($id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->route('guru');
	}
}
