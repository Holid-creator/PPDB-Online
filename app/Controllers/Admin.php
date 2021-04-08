<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeladmin;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->Modeladmin = new Modeladmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Admin',
			'totaljurusan' => $this->Modeladmin->totalJurusan(),
			'totalpekerjaan' => $this->Modeladmin->totalPekerjaan(),
			'totalpendidikan' => $this->Modeladmin->totalpendidikan(),
			'totalagama' => $this->Modeladmin->totalAgama(),
			'totalpenghasilan' => $this->Modeladmin->totalPenghasilan(),
			'totaluser' => $this->Modeladmin->totalUser(),
			'totalpmasuk' => $this->Modeladmin->totalPmasuk(),
			'totalpditerima' => $this->Modeladmin->totalPditerima(),
			'totalpditolak' => $this->Modeladmin->totalPditolak()
		];

		return view('admin/v_dashboard', $data);
	}

	public function setting()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Setting',
			'setting' => $this->Modeladmin->detailData()
		];
		return view('admin/v_setting', $data);
	}

	public function saveSetting()
	{
		$file = $this->request->getFile('logo');
		if ($file->getError() == 4) {
			$data = [
				'n_sekolah' => $this->request->getPost('n_sekolah'),
				'alamat' => $this->request->getPost('alamat'),
				'desa' => $this->request->getPost('desa'),
				'kecamatan' => $this->request->getPost('kecamatan'),
				'kabupaten' => $this->request->getPost('kabupaten'),
				'provinsi' => $this->request->getPost('provinsi'),
				'telp' => $this->request->getPost('telp'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'deskripsi' => $this->request->getPost('deskripsi'),
			];
			$this->Modeladmin->saveSetting($data);
		} else {
			$setting = $this->Modeladmin->detailData();
			if ($setting['logo'] != "") {
				unlink('./logo/' . $setting['logo']);
			}
			$n_file = $file->getRandomName();
			$data = [
				'n_sekolah' => $this->request->getPost('n_sekolah'),
				'alamat' => $this->request->getPost('alamat'),
				'desa' => $this->request->getPost('desa'),
				'kecamatan' => $this->request->getPost('kecamatan'),
				'kabupaten' => $this->request->getPost('kabupaten'),
				'provinsi' => $this->request->getPost('provinsi'),
				'telp' => $this->request->getPost('telp'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'logo' => $n_file,
			];
			$file->move('logo/', $n_file);
			$this->Modeladmin->saveSetting($data);
		}

		session()->setFlashdata('sukses', 'Settingan Berhasil Diganti !!');
		return redirect()->to('/admin/setting');
	}

	public function beranda()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Beranda',
			'beranda' => $this->Modeladmin->detailData()
		];

		return view('admin/v_beranda', $data);
	}

	public function saveBeranda()
	{
		$data = [
			'beranda' => $this->request->getPost('beranda')
		];
		$this->Modeladmin->saveSetting($data);

		session()->setFlashdata('sukses', 'Beranda Berhasil Diupdate');
		return redirect()->to('/admin/beranda');
	}
}
