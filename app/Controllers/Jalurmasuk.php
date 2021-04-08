<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeljalurmasuk;

class Jalurmasuk extends BaseController
{
	public function __construct()
	{
		$this->Modeljalurmasuk = new Modeljalurmasuk();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Jalur Masuk',
			'jalurmasuk' => $this->Modeljalurmasuk->getAllData()
		];
		return view('admin/v_jalurMasuk', $data);
	}

	public function add()
	{
		$data = [
			'jalur_msk' => $this->request->getPost('jalur_msk'),
			'kuota' => $this->request->getPost('kuota'),
		];
		$this->Modeljalurmasuk->add($data);

		session()->setFlashdata('sukses', 'Jalur Masuk Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_jalur_msk)
	{
		$data = [
			'id_jalur_msk' => $id_jalur_msk,
			'jalur_msk' => $this->request->getPost('jalur_msk'),
			'kuota' => $this->request->getPost('kuota'),
		];
		$this->Modeljalurmasuk->ubah($data);

		session()->setFlashdata('sukses', 'Jalur Masuk Berhasil Diubah');
		return redirect()->to(base_url('jalurmasuk'));
	}

	public function hapus($id_jalur_msk)
	{
		$data = [
			'id_jalur_msk' => $id_jalur_msk,
		];
		$this->Modeljalurmasuk->hapus($data);

		session()->setFlashdata('sukses', 'Jalur Masuk Berhasil Dihapus');
		return redirect()->to(base_url('jalurmasuk'));
	}
}
