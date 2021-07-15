<?php

namespace App\Controllers;

use App\Models\{SiswaModel};
use App\Controllers\BaseController;

class SiswaController extends BaseController
{
	protected $siswa;
	public function __construct()
	{
		$this->siswa = new SiswaModel();
	}
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$siswa = $this->siswa->search($keyword)->asObject();
		} else {
			$siswa = $this->siswa->getAll()->asObject();
		}

		return view('app/siswa/index', [
			'title' => 'Halaman Daftar Siswa',
			'siswa' => $siswa->paginate(10, 'siswa'),
			'pager' => $this->siswa->pager,
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
			'nus' => [
				'rules' => 'required|is_unique[siswa.nus]',
				'errors' => [
					'required' => 'NUS harus diisi',
					'is_unique' => 'NUS sudah terdaftar'
				]
			],
			'id_kelas' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kelas harus diisi',
				]
			],

			'gender' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jenis kelamin harus diisi',
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
			return redirect()->route('siswa')->withInput();
		}

		if ($this->request->getVar('is_active')) {
			$is_active = $this->request->getVar('is_active');
		} else {
			$is_active = 0;
		}

		$this->siswa->save([
			'nus' => $this->request->getVar('nus'),
			'name' => $this->request->getVar('name'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'gender' => $this->request->getVar('gender'),
			'is_active' => $is_active,
			'id_kelas' => $this->request->getVar('id_kelas'),
		]);
		$this->session->setFlashdata('pesan', 'Data siswa dengan nama ' . $this->request->getVar('name') . ' telah ditambahkan');
		return redirect()->route('siswa');
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
			'nus' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'NUS harus diisi',
					'is_unique' => 'NUS sudah terdaftar'
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
			return redirect()->route('siswa')->withInput();
		}

		$siswa = $this->siswa->where('id', $id)->first();


		if ($this->request->getVar('password')) {
			$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		} else {
			$password = $siswa['password'];
		}

		if ($this->request->getVar('gender')) {
			$gender = $this->request->getVar('gender');
		} else if ($this->request->getVar('gender') == null) {
			$gender = $siswa['gender'];
		}

		$this->siswa->update($id, [
			'name' => $this->request->getVar('name'),
			'nus' => $this->request->getVar('nus'),
			'password' => $password,
			'is_active' => $this->request->getVar('is_active'),
			'gender' => $gender,
		]);


		$this->session->setFlashdata('pesan', 'Data siswa dengan nama ' . $this->request->getVar('name') . ' telah diubah');
		return redirect()->route('siswa');
	}

	public function delete($id = null)
	{
		$this->siswa->delete($id);
		$this->session->setFlashdata('pesan', 'Data telah dihapus');
		return redirect()->route('siswa');
	}
}
