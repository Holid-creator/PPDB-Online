<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelta;

class Ta extends BaseController
{
	public function __construct()
	{
		$this->Modelta = new Modelta();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Tahun Ajaran',
			'ta' => $this->Modelta->getAllData()
		];
		return view('admin/v_ta', $data);
	}

	public function add()
	{
		$data = [
			'thn' => $this->request->getPost('thn'),
			'ta' => $this->request->getPost('ta'),
		];
		$this->Modelta->add($data);

		session()->setFlashdata('sukses', 'Tahun Ajaran Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
			'thn' => $this->request->getPost('thn'),
			'ta' => $this->request->getPost('ta'),
		];
		$this->Modelta->ubah($data);

		session()->setFlashdata('sukses', 'Tahun Ajaran Berhasil Diubah');
		return redirect()->to(base_url('ta'));
	}

	public function hapus($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
		];
		$this->Modelta->hapus($data);

		session()->setFlashdata('sukses', 'Tahun Ajaran Berhasil Dihapus');
		return redirect()->to(base_url('ta'));
	}

	public function statusAktif($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
			'status' => 1
		];
		$this->Modelta->resetStatus();
		$this->Modelta->ubah($data);

		session()->setFlashdata('sukses', 'Status Tahun Ajaran Telah Diaktifkan');
		return redirect()->to(base_url('ta'));
	}

	public function statusNonAktif($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
			'status' => 0
		];
		$this->Modelta->ubah($data);

		session()->setFlashdata('gagal', 'Status Tahun Ajaran Telah Dinonaktifkan');
		return redirect()->to(base_url('ta'));
	}
}
