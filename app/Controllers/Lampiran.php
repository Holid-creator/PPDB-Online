<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modellampiran;

class Lampiran extends BaseController
{
	public function __construct()
	{
		$this->Modellampiran = new Modellampiran();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Agama',
			'lampiran' => $this->Modellampiran->getAllData()
		];

		return view('admin/v_lampiran', $data);
	}

	public function add()
	{
		$data = [
			'lampiran' => $this->request->getPost('lampiran')
		];
		$this->Modellampiran->add($data);

		session()->setFlashdata('sukses', 'Data Lampiran Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_lampiran)
	{
		$data = [
			'id_lampiran' => $id_lampiran,
			'lampiran' => $this->request->getPost('lampiran')
		];
		$this->Modellampiran->ubah($data);

		session()->setFlashdata('sukses', 'Data Lampiran Berhasil Diubah');
		return redirect()->to(base_url('lampiran'));
	}

	public function hapus($id_lampiran)
	{
		$data = [
			'id_lampiran' => $id_lampiran,
		];
		$this->Modellampiran->hapus($data);

		session()->setFlashdata('sukses', 'Data Lampiran Berhasil Dihapus');
		return redirect()->to(base_url('lampiran'));
	}
}
