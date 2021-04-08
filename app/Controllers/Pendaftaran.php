<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeljalurmasuk;
use App\Models\Modeljurusan;
use App\Models\Modelsiswa;
use App\Models\Modelta;

class Pendaftaran extends BaseController
{
	public function __construct()
	{
		$this->Modelsiswa = new Modelsiswa();
		$this->Modelta = new Modelta();
		$this->Modeljalurmasuk = new Modeljalurmasuk();
		$this->Modeljurusan = new Modeljurusan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran',
			'ta' => $this->Modelta->status(),
			'jalur' => $this->Modeljalurmasuk->getAllData(),
			'jurusan' => $this->Modeljurusan->getAllData(),
			'validation' =>  \Config\Services::validation()
		];
		return view('v_pendaftaran', $data);
	}

	public function simpan()
	{
		if ($this->validate(
			[
				'nisn' => [
					'label' => 'NISN',
					'rules' => 'required|min_length[5]|max_length[10]|is_unique[tb_siswa.nisn]',
					'errors' => [
						'required' => '{field} Wajib Diisi',
						'min_length' => '{field} Wajib Diisi 5 Karakter',
						'max_length' => '{field} Wajib Diisi 10 Karakter',
						'is_unique' => '{field} ini sudah terdaftar'
					]
				],

				'jalur' => [
					'label' => 'Jalur Masuk',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Belum Dipilih'
					]
				],

				'n_lengkap' => [
					'label' => 'Nama Lengkap',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'n_panggilan' => [
					'label' => 'Nama Panggilan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				't_lhr' => [
					'label' => 'Tempat Lahir',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'tgl' => [
					'label' => 'Tanggal',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'jk' => [
					'label' => 'Jenis Kelamain',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'bln' => [
					'label' => 'Bulan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'thn' => [
					'label' => 'Tahun',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Wajib Diisi'
					]
				],

				'jurusan' => [
					'label' => 'Jurusan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Belum Dipilih'
					]
				],
			]
		)) {
			// Jika tidak ada validasi Maka simpan data
			$tgl = $this->request->getPost('tgl');
			$bln = $this->request->getPost('bln');
			$thn = $this->request->getPost('thn');
			$noDaftar = $this->Modelsiswa->no_daftar();
			$data = [
				'no_pendaftaran' => $noDaftar,
				'thn' => date('Y'),
				'tgl_pendaftaran' => date('Y-m-d'),
				'nisn' => $this->request->getPost('nisn'),
				'id_jalur_msk' => $this->request->getPost('jalur'),
				'n_lengkap' => $this->request->getPost('n_lengkap'),
				'n_panggilan' => $this->request->getPost('n_panggilan'),
				't_lhr' => $this->request->getPost('t_lhr'),
				'tgl_lhr' => $thn . '-' . $bln . '-' . $tgl,
				'jk' => $this->request->getPost('jk'),
				'id_jurusan' => $this->request->getPost('jurusan'),
				'password' => md5($this->request->getPost('nisn'))
			];
			$this->Modelsiswa->add($data);

			session()->setFlashdata('sukses', 'Pendaftaran Berhasil Disimpan Silahkan Login');
			return redirect()->to('/pendaftaran');
		} else {
			// Jika ada validasi
			$validation =  \Config\Services::validation();
			return redirect()->to('/pendaftaran')->withInput()->with('validation', $validation);
		}
	}
}
