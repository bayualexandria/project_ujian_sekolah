<?php

namespace App\Validation;

class ValidationAuth
{


	// public function custom_rule(): bool
	// {
	// 	return true;
	// }

	public function register()
	{
		return [
			'name' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'email'    => [
				'rules'  => 'required|valid_email|is_unique[admin.email]',
				'errors' => [
					'valid_email' => 'Email yang anda masukan tidak valid. Mohon cek kembali',
					'required' => 'Email harus diisi',
					'is_unique' => 'Email yang anda masukan sudah terdaftar'
				]
			],
			'password' => [
				'rules'  => 'required|min_length[6]|matches[conf_password]',
				'errors' => [
					'min_length' => 'Password minimal 6 karakter',
					'required' => 'Password harus diisi',
					'matches' => 'Password tidak sama'
				]
			],
			'conf_password' => [
				'rules'  => 'required|min_length[6]|matches[password]',
				'errors' => [
					'min_length' => 'Konfirmasi Password minimal 6 karakter',
					'required' => 'Konfirmasi Password harus diisi',
					'matches' => 'Konfirmasi Password tidak sama'
				]
			],
		];
	}
}
