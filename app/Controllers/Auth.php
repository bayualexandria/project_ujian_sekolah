<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{AdminModel, AuthTokenModel, GuruModel, SiswaModel};

class Auth extends BaseController
{
	protected $Admin;
	protected $Token;
	protected $guru;
	protected $siswa;

	public function __construct()
	{
		$this->Admin = new AdminModel();
		$this->Token = new AuthTokenModel();
		$this->guru = new GuruModel();
		$this->siswa = new SiswaModel();
	}

	public function login()
	{
		if (session()->get('email')) {
			return redirect()->to('/');
		} elseif (session()->get('resetEmail')) {
			return redirect()->to('change');
		}
		return view('auth/admin', ['validation' => $this->validation]);
	}

	public function accessLogin()
	{
		$rules = [
			'email'    => [
				'rules'  => 'required|valid_email',
				'errors' => [
					'valid_email' => 'Email yang anda masukan tidak valid. Mohon cek kembali',
					'required' => 'Email harus diisi',
				]
			],
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password harus diisi',
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->to('admin')->withInput();
		}

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$user = $this->Admin->where('email', $email)->first();
		if ($user) {
			if ($user['active'] == 1) {
				$verify_pass = password_verify($password, $user['password']);
				if ($verify_pass) {
					$data = [
						'email' => $user['email'],
						'id_akses' => $user['id_akses']
					];
					$this->session->set($data);
					$this->session->setFlashdata('loginSuccess', 'Selamat anda berhasil masuk ke sistem kami!');
					// $this->_sendEmail();
					return redirect()->to('/');
				} else {
					$this->session->setFlashdata('error', 'Password yang anda masukan salah!');
					return redirect()->route('auth/admin');
				}
			} else {
				$this->session->setFlashdata('error', 'Email belum teraktifasi! Silahkan cek pesan yang dikirimkan melalui email anda');
				return redirect()->route('auth/admin');
			}
		} else {
			$this->session->setFlashdata('error', 'Email yang anda masukkan belum terdaftar!');
			return redirect()->route('auth/admin');
		}
	}

	public function register()
	{
		if (session()->get('email')) {
			return redirect()->to('/');
		} elseif (session()->get('resetEmail')) {
			return redirect()->to('change');
		}
		return view('auth/register', [
			'validation' => $this->validation
		]);
	}

	public function ActionRegister()
	{

		$rule = [
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

		if ($this->validate($rule)) {

			$token = base64_encode(random_bytes(32));
			$this->Token->save([
				'email' => $this->request->getVar('email'),
				'token' => $token,
				'created_at' => time()
			]);
			$this->_sendEmail($token, 'verification');
			$this->Admin->save([
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			]);


			$this->session->setFlashdata('pesan', 'Data Admin berhasil ditambahkan. Silahkan cek email anda untuk aktivasi!');
			return redirect()->route('auth/admin');
		} else {
			return redirect()->route('register')->withInput();
		}
	}

	public function forgot()
	{
		if (session()->get('email')) {
			return redirect()->to('/');
		} elseif (session()->get('resetEmail')) {
			return redirect()->to('change');
		}
		return view('auth/forgot', [
			'validation' => $this->validation
		]);
	}

	public function forgotAccess()
	{
		$rule = [
			'email'    => [
				'rules'  => 'required|valid_email',
				'errors' => [
					'valid_email' => 'Email yang anda masukan tidak valid. Mohon cek kembali',
					'required' => 'Email harus diisi',
				]
			]
		];
		if (!$this->validate($rule)) {
			return redirect()->to('forgot')->withInput();
		}
		$email = $this->request->getVar('email');
		$user = $this->Admin->where('email', $email)->first();
		if ($user) {
			$token = base64_encode(random_bytes(32));
			$this->Token->save([
				'email' => $this->request->getVar('email'),
				'token' => $token,
				'created_at' => time()
			]);
			$this->_sendEmail($token, 'resetPassword');

			$this->session->setFlashdata('pesan', 'Mohon untuk cek pesan yang terkirim ke email anda untuk me-reset password!');
			return redirect()->route('auth/admin');
		} else {
			$this->session->setFlashdata('error', 'Email yang anda masukkan belum terdaftar!');
			return redirect()->to('forgot');
		}
	}

	public function _sendEmail($token, $type)
	{
		$config = \Config\Services::email();
		$email = $this->request->getVar('email');

		if ($type == 'verification') {
			$title = 'Aktifasi Akun !';
			$config->setTo($email);
			$url = 'verification?email=' . $this->request->getVar('email') . '&token=' . urlencode($token);
			$name = $this->request->getVar('name');
			$config->setSubject('Aktifasi Akun');
			$facebook = $config->attach(base_url('assets/img/logo/facebook.png'));
			$config->setMessage(view('auth/email_activation', [
				'title' => $title,
				'email' => $email,
				'url'	=> base_url($url),
				'name' => $name,
				'facebook' => $facebook
			]));
		} elseif ($type == 'resetPassword') {
			$title = 'Reset Password !';
			$config->setTo($email);
			$url = 'reset?email=' . $this->request->getVar('email') . '&token=' . urlencode($token);
			$user = $this->Admin->where('email', $email)->first();
			$config->setSubject('Reset Password');
			$config->setMessage(view('auth/email_activation', [
				'title' => $title,
				'email' => $email,
				'url' => base_url($url),
				'name' => $user['name']
			]));
		}

		$config->send(false);
		$config->printDebugger(['headers']);
	}

	public function verification()
	{
		$token = $this->request->getGet('token');
		$email = $this->request->getGet('email');
		$user = $this->Admin->where('email', $email)->first();

		if ($user) {
			$user_token = $this->Token->where('token', $token)->first();
			if ($user_token) {
				if (time() - $user_token['created_at'] < (60 * 60 * 24)) {
					$this->Admin
						->where('email', $email)
						->set(['active' => 1])
						->update();
					$this->Token->where('email', $email)->delete();
					$this->session->setFlashdata('pesan', 'Email :' . $email . ' telah diaktifkan. Silahkan login!');
					return redirect()->route('auth/admin');
				} else {
					$this->session->setFlashdata('error', 'Aktivasi akun gagal. Token kadaluarsa!');
					return redirect()->route('auth/admin');
				}
			} else {
				$this->session->setFlashdata('error', 'Aktivasi akun gagal. Kesalahan token!');
				return redirect()->route('auth/admin');
			}
		} else {
			$this->session->setFlashdata('error', 'Aktivasi akun gagal. Kesalahan email!');
			return redirect()->route('auth/admin');
		}
	}

	public function resetPassword()
	{
		$token = $this->request->getGet('token');
		$email = $this->request->getGet('email');
		$user = $this->Admin->where('email', $email)->first();

		if ($user) {
			$user_token = $this->Token->where('token', $token)->first();
			if ($user_token) {
				if (time() - $user_token['created_at'] < (60 * 60 * 24)) {
					session()->set(['resetEmail' => $email]);
					return redirect()->to('change');
				} else {
					$this->session->setFlashdata('error', 'Aktivasi akun gagal. Token kadaluarsa!');
					return redirect()->to('forgot');
				}
			} else {
				$this->session->setFlashdata('error', 'Aktivasi akun gagal. Kesalahan token!');
				return redirect()->to('forgot');
			}
		} else {
			$this->session->setFlashdata('error', 'Aktivasi akun gagal. Kesalahan email!');
			return redirect()->to('forgot');
		}
	}

	public function changePassword()
	{
		if (!session()->get('resetEmail')) {
			return redirect()->route('auth/admin');
		}
		return view('auth/change', [
			'validation' => $this->validation
		]);
	}

	public function changePasswordAccess()
	{
		$rule = [
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
		if (!$this->validate($rule)) {
			return redirect()->to('change')->withInput();
		}

		$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
		$email = session()->get('resetEmail');

		$this->Admin
			->where('email', $email)
			->set(['password' => $password])
			->update();
		$this->Token->where('email', $email)->delete();
		session()->remove('resetEmail');
		$this->session->setFlashdata('pesan', 'Password anda telah diubah!');
		return redirect()->route('auth/admin');
	}

	public function logout()
	{
		if (session()->get('email')) {
			session()->remove(['email', 'id_akses']);
			$this->session->setFlashdata('pesan', 'Anda berhasil keluar');
			return redirect()->route('auth/admin');
		} else if (session()->get('nip')) {
			session()->remove(['nip', 'id_akses']);
			$this->session->setFlashdata('pesan', 'Anda berhasil keluar');
			return redirect()->route('auth/guru');
		} else if (session()->get('nus')) {
			session()->remove(['nus', 'id_akses']);
			$this->session->setFlashdata('pesan', 'Anda berhasil keluar');
			return redirect()->route('auth/siswa');
		}
	}

	public function loginGuru()
	{
		return view('auth/loginGuru', [
			'title' => 'Halaman Login Guru',
			'validation' => $this->validation
		]);
	}

	public function loginGuruAccess()
	{
		$rules = [
			'nip'    => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'NIP harus diisi',
				]
			],
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password harus diisi',
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('auth/siswa')->withInput();
		}

		$nip = $this->request->getVar('nip');
		$password = $this->request->getVar('password');
		$user = $this->guru->where('nip', $nip)->first();
		if ($user) {
			if ($user['active'] == 1) {
				$verify_pass = password_verify($password, $user['password']);
				if ($verify_pass) {
					$data = [
						'nip' => $user['nip'],
						'id_akses' => $user['id_akses']
					];
					$this->session->set($data);
					$this->session->setFlashdata('loginSuccess', 'Selamat anda berhasil masuk ke sistem kami!');
					// $this->_sendEmail();
					return redirect()->route('/');
				} else {
					$this->session->setFlashdata('error', 'Password yang anda masukan salah!');
					return redirect()->route('auth/guru');
				}
			} else {
				$this->session->setFlashdata('error', 'Akun belum di aktifkan! Silahkan hubungi administrator');
				return redirect()->route('auth/guru');
			}
		} else {
			$this->session->setFlashdata('error', 'NIP yang anda masukkan belum terdaftar!');
			return redirect()->route('auth/guru');
		}
	}

	public function loginSiswa()
	{
		return view('auth/loginSiswa', [
			'title' => 'Halaman Login Siswa',
			'validation' => $this->validation
		]);
	}

	public function loginSiswaAccess()
	{
		$rules = [
			'nus'    => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'No. Ujian harus diisi',
				]
			],
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password harus diisi',
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->route('auth/siswa')->withInput();
		}

		$nus = $this->request->getVar('nus');
		$password = $this->request->getVar('password');
		$user = $this->siswa->where('nus', $nus)->first();
		if ($user) {
			if ($user['is_active'] == 1) {
				$verify_pass = password_verify($password, $user['password']);
				if ($verify_pass) {
					$data = [
						'nus' => $user['nus'],
						'id_akses' => $user['id_akses']
					];
					$this->session->set($data);
					$this->session->setFlashdata('loginSuccess', 'Selamat anda berhasil masuk ke sistem kami!');
					// $this->_sendEmail();
					return redirect()->route('jadwal');
				} else {
					$this->session->setFlashdata('error', 'Password yang anda masukan salah!');
					return redirect()->route('auth/siswa');
				}
			} else {
				$this->session->setFlashdata('error', 'Akun belum di aktifkan! Silahkan hubungi administrator');
				return redirect()->route('auth/siswa');
			}
		} else {
			$this->session->setFlashdata('error', 'No. Ujian yang anda masukkan belum terdaftar!');
			return redirect()->route('auth/siswa');
		}
	}
}
