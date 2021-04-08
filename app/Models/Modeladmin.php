<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeladmin extends Model
{
	public function detailData()
	{
		return $this->db->table('tb_setting')->where('id', '1')->get()->getRowArray();
	}

	public function saveSetting($data)
	{
		return $this->db->table('tb_setting')->where('id', '1')->update($data);
	}

	public function totalJurusan()
	{
		return $this->db->table('tb_jurusan')->countAllResults();
	}

	public function totalPekerjaan()
	{
		return $this->db->table('tb_pekerjaan')->countAllResults();
	}

	public function totalpendidikan()
	{
		return $this->db->table('tb_pendidikan')->countAllResults();
	}

	public function totalAgama()
	{
		return $this->db->table('tb_agama')->countAllResults();
	}

	public function totalPenghasilan()
	{
		return $this->db->table('tb_penghasilan')->countAllResults();
	}

	public function totalUser()
	{
		return $this->db->table('tb_user')->countAllResults();
	}

	public function totalPmasuk()
	{
		return $this->db->table('tb_siswa')->where('stat_pendaftaran', '1')->where('stat_ppdb', '0')->countAllResults();
	}

	public function totalPditerima()
	{
		return $this->db->table('tb_siswa')->where('stat_ppdb', '1')->countAllResults();
	}

	public function totalPditolak()
	{
		return $this->db->table('tb_siswa')->where('stat_ppdb', '2')->countAllResults();
	}
}
