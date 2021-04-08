<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeladmin;
use App\Models\Modelppdb;

class Ppdb extends BaseController
{
	public function __construct()
	{
		$this->Modelppdb = new Modelppdb();
		$this->Modeladmin = new Modeladmin();
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran Masuk',
			'ppdb' => $this->Modelppdb->getPpdbMasuk()
		];

		return view('admin/ppdb/v_pmasuk', $data);
	}

	public function listDiterima()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran Yang Diterima',
			'ppdb' => $this->Modelppdb->ppdbDiterima()
		];

		return view('admin/ppdb/v_diterima', $data);
	}

	public function listDitolak()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran Yang Ditolak',
			'ppdb' => $this->Modelppdb->ppdbDitolak()
		];

		return view('admin/ppdb/v_ditolak', $data);
	}

	public function detailData($id_siswa)
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Detail Data Siswa',
			'siswa' => $this->Modelppdb->detailData($id_siswa),
			'berkas' => $this->Modelppdb->lampiran($id_siswa)
		];

		return view('admin/ppdb/v_detailData', $data);
	}

	public function diterima($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'stat_ppdb' => '1'
		];
		$this->Modelppdb->edit($data);

		session()->setFlashdata('sukses', 'Siswa Berhasil Diterima');
		return redirect()->to(base_url('/ppdb'));
	}

	public function ditolak($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'stat_ppdb' => '2'
		];
		$this->Modelppdb->edit($data);

		session()->setFlashdata('danger', 'Siswa Telah Ditolak');
		return redirect()->to(base_url('/ppdb'));
	}

	public function laporan()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Laporan Kelulusan',
			'ta' => $this->Modelppdb->getAllDataTa()
		];

		return view('admin/ppdb/v_laporan', $data);
	}

	public function cetakLaporan($thn)
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Laporan Kelulusan',
			'siswa' => $this->Modelppdb->getDataLaporan($thn),
			'setting' => $this->Modeladmin->detailData()
		];

		return view('admin/ppdb/v_cetakLaporan', $data);
	}
}
