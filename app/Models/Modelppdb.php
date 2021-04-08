<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelppdb extends Model
{
	public function getPpdbMasuk()
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('stat_ppdb', '0')
			->where('stat_pendaftaran', '1')
			->get()
			->getResultArray();
	}

	public function ppdbDiterima()
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('stat_ppdb', '1')
			->orderBy('id_siswa', 'DESC')
			->get()
			->getResultArray();
	}

	public function ppdbDitolak()
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('stat_ppdb', '2')
			->get()
			->getResultArray();
	}

	public function detailData($id_siswa)
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('id_siswa', $id_siswa)
			->get()
			->getRowArray();
	}

	public function lampiran($id_siswa)
	{
		return $this->db->table('tb_berkas')
			->join('tb_lampiran', 'tb_lampiran.id_lampiran = tb_berkas.id_lampiran', 'left')
			->where('tb_berkas.id_siswa', $id_siswa)
			->get()
			->getResultArray();
	}

	public function edit($data)
	{
		$this->db->table('tb_siswa')->where('id_siswa', $data['id_siswa'])->update($data);
	}

	public function getAllDataTa()
	{
		return $this->db->table('tb_ta')->get()->getResultArray();
	}

	public function getDataLaporan($thn)
	{
		return $this->db->table('tb_siswa')
			->join('tb_jalur_msk', 'tb_jalur_msk.id_jalur_msk = tb_siswa.id_jalur_msk', 'left')
			->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left')
			->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_siswa.p_ayah', 'left')
			->join('tb_penghasilan', 'tb_penghasilan.id_penghasilan = tb_siswa.peng_ayah', 'left')
			->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'left')
			->where('stat_ppdb', '1')
			->where('thn', $thn)
			->get()
			->getResultArray();
	}
}
