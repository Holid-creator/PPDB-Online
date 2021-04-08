<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbenner;
use App\Models\Modelbennerr;

class Benner extends BaseController
{
	public function __construct()
	{
		$this->Modelbenner = new Modelbenner();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Banner',
			'benner' => $this->Modelbenner->getAllData()
		];

		return view('admin/v_benner', $data);
	}

	public function add()
	{
		$file = $this->request->getFile('benner');
		$n_file = $file->getRandomName();
		$data = [
			'ket' => $this->request->getPost('ket'),
			'benner' => $n_file
		];
		// Upload file foto
		$file->move('banner', $n_file);

		$this->Modelbenner->add($data);
		session()->setFlashdata('sukses', 'Banner Berhasil Ditambahkan');
		return redirect()->to('index');
	}

	public function ubah($id_benner)
	{
		$file = $this->request->getFile('benner');
		if ($file->getError() == 4) {
			$data = [
				'id_benner' => $id_benner,
				'ket' => $this->request->getPost('ket'),
				'benner' => $this->request->getPost('benner'),
			];
			$this->Modelbenner->ubah($data);
		} else {
			$bonar = $this->Modelbenner->detail($id_benner);
			if ($bonar['benner'] != '') {
				unlink('./banner/' . $bonar['benner']);
			}
			$n_file = $file->getRandomName();
			$data = [
				'id_benner' => $id_benner,
				'ket' => $this->request->getPost('ket'),
				'benner' => $n_file
			];
			// Upload file foto
			$file->move('banner', $n_file);

			$this->Modelbenner->ubah($data);
		}
		session()->setFlashdata('sukses', 'Banner Berhasil Diubah');
		return redirect()->to(base_url('benner'));
	}

	public function hapus($id_benner)
	{
		$bonar = $this->Modelbenner->detail($id_benner);
		if ($bonar['benner'] != '') {
			unlink('./banner/' . $bonar['benner']);
		}
		$data = [
			'id_benner' => $id_benner
		];
		$this->Modelbenner->hapus($data);

		session()->setFlashdata('sukses', 'Banner Berhasil Dihapus');
		return redirect()->to(base_url('benner'));
	}
}
