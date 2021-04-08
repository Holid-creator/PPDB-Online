<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpendidikan;

class Pendidikan extends BaseController
{
	public function __construct()
	{
		$this->Modelpendidikan = new Modelpendidikan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'pendidikan',
			'pendidikan' => $this->Modelpendidikan->getAllData()
		];
		return view('admin/v_pendidikan', $data);
	}

	public function add()
	{
		$data = [
			'pendidikan' => $this->request->getPost()
		];
		$this->Modelpendidikan->add($data);

		session()->setFlashdata('sukses', 'Data Pendidikan Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_pendidikan)
	{
		$data = [
			'id_pendidikan' => $id_pendidikan,
			'pendidikan' => $this->request->getPost()
		];
		$this->Modelpendidikan->ubah($data);

		session()->setFlashdata('sukses', 'Data Pendidikan Berhasil Diubah');
		return redirect()->to(base_url('pendidikan'));
	}

	public function hapus($id_pendidikan)
	{
		$data = [
			'id_pendidikan' => $id_pendidikan
		];
		$this->Modelpendidikan->hapus($data);

		session()->setFlashdata('sukses', 'Data Pendidikan Berjasil Dihapus');
		return redirect()->to(base_url('pendidikan'));
	}
}
