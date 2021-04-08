<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelagama;

class Agama extends BaseController
{
	public function __construct()
	{
		$this->Modelagama = new Modelagama();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Agama',
			'agama' => $this->Modelagama->getAllData()
		];

		return view('admin/v_agama', $data);
	}

	public function add()
	{
		$data = [
			'agama' => $this->request->getPost()
		];
		$this->Modelagama->add($data);

		session()->setFlashdata('sukses', 'Data Agama Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_agama)
	{
		$data = [
			'id_agama' => $id_agama,
			'agama' => $this->request->getPost()
		];
		$this->Modelagama->ubah($data);

		session()->setFlashdata('sukses', 'Data Agama Berhasil Diubah');
		return redirect()->to(base_url('agama'));
	}

	public function hapus($id_agama)
	{
		$data = [
			'id_agama' => $id_agama
		];
		$this->Modelagama->hapus($data);

		session()->setFlashdata('sukses', 'Data Agama Berhasil Dihapus');
		return redirect()->to(base_url('agama'));
	}
}
