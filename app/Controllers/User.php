<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeluser;

class User extends BaseController
{
	public function __construct()
	{
		$this->Modeluser = new Modeluser();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'User',
			'user' => $this->Modeluser->getAllData()
		];
		return view('admin/v_user', $data);
	}

	public function add()
	{
		$file = $this->request->getFile('foto');
		$n_file = $file->getRandomName();
		$data = [
			'n_user' => $this->request->getPost('n_user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'foto' => $n_file
		];
		// Upload file foto
		$file->move('foto', $n_file);

		$this->Modeluser->add($data);
		session()->setFlashdata('sukses', 'Data User Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_user)
	{
		$file = $this->request->getFile('foto');
		if ($file->getError() == 4) {
			$data = [
				'id_user' => $id_user,
				'n_user' => $this->request->getPost('n_user'),
				'email' => $this->request->getPost('email'),
			];
			$this->Modeluser->ubah($data);
		} else {
			$user = $this->Modeluser->detail($id_user);
			if ($user['foto'] != '') {
				unlink('./foto/' . $user['foto']);
			}
			$n_file = $file->getRandomName();
			$data = [
				'id_user' => $id_user,
				'n_user' => $this->request->getPost('n_user'),
				'email' => $this->request->getPost('email'),
				'foto' => $n_file
			];
			// Upload file foto
			$file->move('foto', $n_file);

			$this->Modeluser->ubah($data);
		}
		session()->setFlashdata('sukses', 'Data User Berhasil Ditambahkan');
		return redirect()->to(base_url('user'));
	}

	public function hapus($id_user)
	{
		$user = $this->Modeluser->detail($id_user);
		if ($user['foto'] != '') {
			unlink('./foto/' . $user['foto']);
		}
		$data = [
			'id_user' => $id_user
		];
		$this->Modeluser->hapus($data);

		session()->setFlashdata('sukses', 'Data User Berhasil Dihapus');
		return redirect()->to(base_url('user'));
	}
}
