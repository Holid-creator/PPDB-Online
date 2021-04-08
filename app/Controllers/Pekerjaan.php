<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpekerjaan;

class Pekerjaan extends BaseController
{
	public function __construct()
	{
		$this->Modelpekerjaan = new Modelpekerjaan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pekerjaan',
			'pekerjaan' => $this->Modelpekerjaan->getAllData()
		];
		return view('admin/v_pekerjaan', $data);
	}

	public function insert()
	{
		$data = [
			'pekerjaan' => $this->request->getPost()
		];
		$this->Modelpekerjaan->insertData($data);

		session()->setFlashdata('sukses', 'Data Pekerjaan Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function edit($id_pekerjaan)
	{
		$data = [
			'id_pekerjaan' => $id_pekerjaan,
			'pekerjaan' => $this->request->getPost()
		];
		$this->Modelpekerjaan->editData($data);

		session()->setFlashdata('sukses', 'Data Pekerjaan Berhasil Diubah');
		return redirect()->to(base_url('pekerjaan'));
	}

	public function hapus($id_pekerjaan)
	{
		$data = [
			'id_pekerjaan' => $id_pekerjaan
		];
		$this->Modelpekerjaan->hapusData($data);

		session()->setFlashdata('sukses', 'Data Pekerjaan Berhasil Dihapus');
		return redirect()->to(base_url('pekerjaan'));
	}
}
