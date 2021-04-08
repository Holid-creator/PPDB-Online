<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->Modelauth = new Modelauth();
		helper('form');
	}

	public function index()
	{
		// 
	}

	public function login()
	{
		echo view('admin/v_login');
	}

	public function cek_login()
	{
		if ($this->validate([
			'email' => [
				'label' => 'E-mail',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
					'valid_email' => 'Harus Format Email'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			]
		])) {
			// valid
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$cek_login = $this->Modelauth->login_user($email, $password);
			if ($cek_login) {
				session()->set('n_user', $cek_login['n_user']);
				session()->set('email', $cek_login['email']);
				session()->set('foto', $cek_login['foto']);
				session()->set('level', 'admin');

				session()->setFlashdata('sukses', 'Selamat ...!!! Anda Berhasil Login');
				return redirect()->to(base_url('admin'));
			} else {
				// Tidak Valid
				session()->setFlashdata('gagal', 'Email atau Password salah !!');
				return redirect()->to(base_url('auth/login'));
			}
		} else {
			// Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/login'));
		}
	}

	public function logout()
	{
		session()->remove('n_user');
		session()->remove('email');
		session()->remove('foto');
		session()->remove('level');

		session()->setFlashdata('sukses', 'Logout Sukses');
		return redirect()->to(base_url('auth/login'));
	}

	public function loginSiswa()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Login Siswa',
			'validation' =>  \Config\Services::validation()
		];
		return view('v_loginSiswa', $data);
	}

	public function cekLoginSiswa()
	{
		if ($this->validate([
			'nisn' => [
				'label' => 'NISN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib diisi !!'
				]
			]
		])) {
			// valid
			$nisn = $this->request->getPost('nisn');
			$password = md5($this->request->getPost('password'));
			$cek_login = $this->Modelauth->login_siswa($nisn, $password);
			if ($cek_login) {
				session()->set('id_siswa', $cek_login['id_siswa']);
				session()->set('nisn', $cek_login['nisn']);
				session()->set('n_lengkap', $cek_login['n_lengkap']);
				session()->set('level', 'siswa');

				session()->setFlashdata('sukses', 'Selamat ...!!! Anda Berhasil Login');
				return redirect()->to(base_url('siswa'));
			} else {
				// Tidak Valid
				session()->setFlashdata('gagal', 'NISN atau Password salah !!');
				return redirect()->to('/auth/loginSiswa');
			}
		} else {
			// Tidak Valid
			$validation = \Config\Services::validation();
			return redirect()->to('/auth/loginSiswa')->withInput()->with('validation', $validation);
		}
	}

	public function logoutSiswa()
	{
		session()->remove('nisn');
		session()->remove('n_lengkap');
		session()->remove('level');

		session()->setFlashdata('sukses', 'Logout Sukses');
		return redirect()->to('/auth/loginSiswa');
	}
}
