<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeladmin;
use App\Models\Modelagama;
use App\Models\Modeljalurmasuk;
use App\Models\Modeljurusan;
use App\Models\Modellampiran;
use App\Models\Modelpekerjaan;
use App\Models\Modelpendidikan;
use App\Models\Modelpenghasilan;
use App\Models\Modelsiswa;

class Siswa extends BaseController
{
	public function __construct()
	{
		$this->Modelsiswa = new Modelsiswa();
		$this->Modeljalurmasuk = new Modeljalurmasuk();
		$this->Modelagama = new Modelagama();
		$this->Modelpendidikan = new Modelpendidikan();
		$this->Modelpekerjaan = new Modelpekerjaan();
		$this->Modelpenghasilan = new Modelpenghasilan();
		$this->Modellampiran = new Modellampiran();
		$this->Modeljurusan = new Modeljurusan();
		$this->Modeladmin = new Modeladmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa' => $this->Modelsiswa->getBiodata(),
			'datasiswa' => $this->Modelsiswa->getAllData(),
			'jalur' => $this->Modeljalurmasuk->getAllData(),
			'agama' => $this->Modelagama->getAllData(),
			'pendidikan' => $this->Modelpendidikan->getAllData(),
			'pekerjaan' => $this->Modelpekerjaan->getAllData(),
			'penghasilan' => $this->Modelpenghasilan->getAlldata(),
			'berkas' => $this->Modelsiswa->lampiran(),
			'lampiran' => $this->Modellampiran->getAllData(),
			'jurusan' => $this->Modeljurusan->getAllData(),
			'validation' => \Config\Services::validation()
		];

		return view('siswa/v_dashboard', $data);
	}

	public function updatePendaftaran($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'id_jalur_msk' => $this->request->getPost('id_jalur_msk'),
			'id_jurusan' => $this->request->getPost('jurusan')
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Pendaftaran berhasil Diupdate');
		return redirect()->to(base_url('siswa'));
	}

	public function updateFoto($id_siswa)
	{
		if ($this->validate([
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto, 1024]',
				'errors' => [
					'max_size' => 'Ukuran {field} Terlalu Besar'
				]
			]
		])) {
			$siswa = $this->Modelsiswa->detail($id_siswa);
			if ($siswa['foto'] != '' or $siswa['foto'] != null) {
				unlink('./foto_siswa/' . $siswa['foto']);
			}

			$file = $this->request->getFile('foto');
			$n_file = $file->getRandomName();
			$data = [
				'id_siswa' => $id_siswa,
				'foto' => $n_file
			];
			$file->move('foto_siswa/', $n_file);
			$this->Modelsiswa->edit($data);

			session()->setFlashdata('sukses', 'Foto Berhasil Diupdate');
			return redirect()->to('/siswa');
		} else {
			$validation = \Config\Services::validation();
			return redirect()->to('/siswa')->withInput()->with('validation', $validation);
		}

		$data = [
			'id_siswa' => $id_siswa,
			'id_jalur_msk' => $this->request->getPost('id_jalur_msk')
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Pendaftaran berhasil Diupdate');
		return redirect()->to(base_url('siswa'));
	}

	public function updateSiswa($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'n_lengkap' => $this->request->getPost('n_lengkap'),
			't_lhr' => $this->request->getPost('t_lhr'),
			'nik' => $this->request->getPost('nik'),
			'id_agama' => $this->request->getPost('id_agama'),
			'n_panggilan' => $this->request->getPost('n_panggilan'),
			'tgl_lhr' => $this->request->getPost('tgl_lhr'),
			'jk' => $this->request->getPost('jk'),
			'telp' => $this->request->getPost('telp'),
			'tinggi_bdn' => $this->request->getPost('tinggi_bdn'),
			'brt_bdn' => $this->request->getPost('brt_bdn'),
			'jml_saudara' => $this->request->getPost('jml_saudara'),
			'anak_ke' => $this->request->getPost('anak_ke')
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukse', 'Identitas Siswa Berhasil Diupdate ..!!!');
		return redirect()->to('/siswa');
	}

	public function updateAyah($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'nik_ayah' => $this->request->getPost('nik_ayah'),
			'n_ayah' => $this->request->getPost('n_ayah'),
			'p_ayah' => $this->request->getPost('p_ayah'),
			'pend_ayah' => $this->request->getPost('pend_ayah'),
			'peng_ayah' => $this->request->getPost('peng_ayah'),
			'telp_ayah' => $this->request->getPost('telp_ayah'),
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Data Ayah kandung Berhasil Diupdate ...!!!');
		return redirect()->to('/siswa');
	}

	public function updateibu($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'nik_ibu' => $this->request->getPost('nik_ibu'),
			'n_ibu' => $this->request->getPost('n_ibu'),
			'p_ibu' => $this->request->getPost('p_ibu'),
			'pend_ibu' => $this->request->getPost('pend_ibu'),
			'peng_ibu' => $this->request->getPost('peng_ibu'),
			'telp_ibu' => $this->request->getPost('telp_ibu'),
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Data ibu kandung Berhasil Diupdate ...!!!');
		return redirect()->to('/siswa');
	}

	public function updateWilayah($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'prov' => $this->request->getPost('prov'),
			'kab' => $this->request->getPost('kab'),
			'kec' => $this->request->getPost('kec'),
			'desa' => $this->request->getPost('desa'),
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Data ibu kandung Berhasil Diupdate ...!!!');
		return redirect()->to('/siswa');
	}

	public function updateSekolah($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'n_sek' => $this->request->getPost('n_sek'),
			'thn_lulus' => $this->request->getPost('thn_lulus'),
			'ijazah' => $this->request->getPost('ijazah'),
			'skhun' => $this->request->getPost('skhun'),
		];
		$this->Modelsiswa->edit($data);

		session()->setFlashdata('sukses', 'Data ibu kandung Berhasil Diupdate ...!!!');
		return redirect()->to('/siswa');
	}

	public function addBerkas($id_siswa)
	{
		if ($this->validate([
			'id_lampiran' => [
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih'
				]
			],
			'berkas' => [
				'label' => 'Berkas',
				'rules' => 'max_size[berkas, 1024]|ext_in[berkas,pdf]',
				'errors' => [
					'max_size' => 'Ukuran {field} Terlalu Besar',
					'ext_in' => '{field} Harus pdf'
				]
			]
		])) {

			$berkas = $this->request->getFile('berkas');
			$n_file = $berkas->getRandomName();
			$data = [
				'id_siswa' => $id_siswa,
				'id_lampiran' => $this->request->getPost('id_lampiran'),
				'ket' => $this->request->getPost('ket'),
				'berkas' => $n_file
			];

			$berkas->move('berkas/', $n_file);
			$this->Modelsiswa->addBerkas($data);

			session()->setFlashdata('sukses', 'Berkas Berhasil Ditambahkan');
			return redirect()->to('/siswa');
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/siswa'));
		}
	}

	public function hapusBerkas($id_berkas)
	{
		$berkas = $this->Modelsiswa->detailBerkas($id_berkas);
		if ($berkas['berkas'] != '' or $berkas['berkas'] != null) {
			unlink('./berkas/' . $berkas['berkas']);
		}
		$data = [
			'id_berkas' => $id_berkas
		];
		$this->Modelsiswa->hapusBerkas($data);
		session()->setFlashdata('sukses', 'Berkas Berhasil Dihapus');
		return redirect()->to('/siswa');
	}

	public function apply($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'stat_pendaftaran' => '1'
		];
		$this->Modelsiswa->edit($data);
		session()->setFlashdata('sukses', 'Pendaftaran Berhasil Dikirim');
		return redirect()->to('/siswa');
	}

	public function buktiLulus()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa' => $this->Modelsiswa->getBiodata(),
			'setting' => $this->Modeladmin->detailData()
		];

		return view('siswa/v_buktiLulus', $data);
	}
}
