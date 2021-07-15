<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{AdminModel, GuruModel, SiswaModel};


class HomeController extends BaseController
{
	protected $admin;
	protected $guru;
	protected $siswa;
	public function __construct()
	{
		$this->admin = new AdminModel();
		$this->guru = new GuruModel();
		$this->siswa = new SiswaModel();
	}

	public function index()
	{
		return view('app/home');
	}

	public function profile()
	{
		return view('app/profile', ['validation' => $this->validation]);
	}

	public function profileAdmin()
	{
		$rules = [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('profile')->withInput();
		}

		$user = $this->admin->where('email', session()->get('email'))->first();

		$fileImage = $this->request->getFile('image');

		// cek gambar,apakah tetap gambar lama
		if ($fileImage->getError() == 4) {
			$namaImage = $user['image'];
		} else {
			// generate nama file random
			$namaImage = $fileImage->getRandomName();
			// pindahkan gambar
			$fileImage->move('assets/img/admin/', $namaImage);
			// hapus file yang lama
			if ($user['image'] != 'default.png') {
				unlink('assets/img/admin/' . $user['image']);
			}
		}

		$this->admin->update($user['id'], [
			'name' => $this->request->getVar('name'),
			'image' => $namaImage
		]);
		$this->session->setFlashdata('pesan', 'Data profile telah di perbaharui');
		return redirect()->route('profile');
	}

	public function passwordAdmin()
	{
		$rules = [
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
			return redirect()->route('profile')->withInput();
		}
		$user = $this->admin->where('email', session()->get('email'))->first();

		if ($this->request->getVar('password')) {
			$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		} else {
			$password = $user['password'];
		}

		$this->admin->update($user['id'], [
			'password' => $password
		]);
		$this->session->setFlashdata('pesan', 'Password telah diperbaharui');
		return redirect()->route('profile');
	}

	public function profileGuru()
	{
		$rules = [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('profile')->withInput();
		}

		$user = $this->guru->where('nip', session()->get('nip'))->first();

		$fileImage = $this->request->getFile('image');

		// cek gambar,apakah tetap gambar lama
		if ($fileImage->getError() == 4) {
			$namaImage = $user['image'];
		} else {
			// generate nama file random
			$namaImage = $fileImage->getRandomName();
			// pindahkan gambar
			$fileImage->move('assets/img/guru/', $namaImage);
			// hapus file yang lama
			if ($user['image'] != 'guru.jpg') {
				unlink('assets/img/guru/' . $user['image']);
			}
		}

		$this->guru->update($user['id'], [
			'name' => $this->request->getVar('name'),
			'image' => $namaImage
		]);
		$this->session->setFlashdata('pesan', 'Data profile telah di perbaharui');
		return redirect()->route('profile');
	}

	public function passwordGuru()
	{
		$rules = [
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
			return redirect()->route('profile')->withInput();
		}
		$user = $this->guru->where('nip', session()->get('nip'))->first();

		if ($this->request->getVar('password')) {
			$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		} else {
			$password = $user['password'];
		}

		$this->guru->update($user['id'], [
			'password' => $password
		]);
		$this->session->setFlashdata('pesan', 'Password telah diperbaharui');
		return redirect()->route('profile');
	}

	public function profileSiswa()
	{
		$rules = [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('profile')->withInput();
		}

		$user = $this->siswa->where('nus', session()->get('nus'))->first();

		$fileImage = $this->request->getFile('image');

		// cek gambar,apakah tetap gambar lama
		if ($fileImage->getError() == 4) {
			$namaImage = $user['image'];
		} else {
			// generate nama file random
			$namaImage = $fileImage->getRandomName();
			// pindahkan gambar
			$fileImage->move('assets/img/siswa/', $namaImage);
			// hapus file yang lama
			if ($user['image'] != 'siswa.png') {
				unlink('assets/img/siswa/' . $user['image']);
			}
		}

		$this->siswa->update($user['id'], [
			'name' => $this->request->getVar('name'),
			'image' => $namaImage
		]);
		$this->session->setFlashdata('pesan', 'Data profile telah di perbaharui');
		return redirect()->route('profile');
	}

	public function passwordSiswa()
	{
		$rules = [
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
			return redirect()->route('profile')->withInput();
		}
		$user = $this->siswa->where('nus', session()->get('nus'))->first();

		if ($this->request->getVar('password')) {
			$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		} else {
			$password = $user['password'];
		}

		$this->siswa->update($user['id'], [
			'password' => $password
		]);
		$this->session->setFlashdata('pesan', 'Password telah diperbaharui');
		return redirect()->route('profile');
	}
}
