<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsiswa extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_siswa')->get()->getResultArray();
	}

	public function detail($id_siswa)
	{
		return $this->db->table('tb_siswa')->where('id_siswa', $id_siswa)->get()->getRowArray();
	}

	public function getBiodata()
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('id_siswa', session()->get('id_siswa'))->get()->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tb_siswa')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_siswa')->where('id_siswa', $data['id_siswa'])->update($data);
	}

	public function no_daftar()
	{
		$kode = $this->db->table('tb_siswa')->select('RIGHT(no_pendaftaran,4) as no_pendaftaran', false)->select('LEFT(no_pendaftaran,8) as tanggal', false)->orderBy('no_pendaftaran', 'desc')->limit(1)->get()->getRowArray();

		if (empty($kode['no_pendaftaran'])) {
			$no = 1;
		} else {
			if ($kode['tanggal'] == date('Ymd')) {
				$no = intval($kode['no_pendaftaran']) + 1;
			} else {
				$no = 1;
			}
		}

		$tgl = date('Ymd');
		$batas = str_pad($no, 4, '0', STR_PAD_LEFT);
		$noDaftar = $tgl . $batas;

		return $noDaftar;
	}

	public function lampiran()
	{
		return $this->db->table('tb_berkas')->join('tb_lampiran', 'tb_lampiran.id_lampiran = tb_berkas.id_lampiran')->where('id_siswa', session()->get('id_siswa'))->get()->getResultArray();
	}

	public function detailBerkas($id_berkas)
	{
		return $this->db->table('tb_berkas')->where('id_berkas', $id_berkas)->get()->getRowArray();
	}

	public function addBerkas($data)
	{
		$this->db->table('tb_berkas')->insert($data);
	}

	public function hapusBerkas($data)
	{
		$this->db->table('tb_berkas')->where('id_berkas', $data['id_berkas'])->delete($data);
	}
}
