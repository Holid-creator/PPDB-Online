<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeljurusan;

class Jurusan extends BaseController
{
	public function __construct()
	{
		$this->Modeljurusan = new Modeljurusan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Jurusan',
			'jurusan' => $this->Modeljurusan->getAllData()
		];

		return view('admin/v_jurusan', $data);
	}

	public function add()
	{
		$data = [
			'jurusan' => $this->request->getPost()
		];
		$this->Modeljurusan->add($data);

		session()->setFlashdata('sukses', 'Data Jurusan Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_jurusan)
	{
		$data = [
			'id_jurusan' => $id_jurusan,
			'jurusan' => $this->request->getPost()
		];
		$this->Modeljurusan->ubah($data);

		session()->setFlashdata('sukses', 'Data Jurusan Berhasil Diubah');
		return redirect()->to(base_url('jurusan'));
	}

	public function hapus($id_jurusan)
	{
		$data = [
			'id_jurusan' => $id_jurusan
		];
		$this->Modeljurusan->hapus($data);

		session()->setFlashdata('sukses', 'Data Jurusan Berhasil Dihapus');
		return redirect()->to(base_url('jurusan'));
	}
}
