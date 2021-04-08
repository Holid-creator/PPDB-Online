<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpenghasilan;

class Penghasilan extends BaseController
{
	public function __construct()
	{
		$this->Modelpenghasilan = new Modelpenghasilan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Penghasilan',
			'penghasilan' => $this->Modelpenghasilan->getAllData()
		];
		return view('admin/v_penghasilan', $data);
	}

	public function add()
	{
		$data = [
			'penghasilan' => $this->request->getPost()
		];
		$this->Modelpenghasilan->add($data);

		session()->setFlashdata('sukses', 'Data Penghasilan Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_penghasilan)
	{
		$data = [
			'id_penghasilan' => $id_penghasilan,
			'penghasilan' => $this->request->getPost()
		];
		$this->Modelpenghasilan->ubah($data);

		session()->setFlashdata('sukses', 'Data Penghasilan Berhasil Diubah');
		return redirect()->to(base_url('penghasilan'));
	}

	public function hapus($id_penghasilan)
	{
		$data = [
			'id_penghasilan' => $id_penghasilan
		];
		$this->Modelpenghasilan->hapus($data);
		session()->setFlashdata('sukses', 'Data Penghasilan Dihapus');
		return redirect()->to(base_url('penghasilan'));
	}
}
