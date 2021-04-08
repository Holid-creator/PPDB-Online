<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbenner extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_banner')->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_banner')->insert($data);
	}

	public function detail($id_benner)
	{
		return $this->db->table('tb_banner')->where('id_benner', $id_benner)->get()->getRowArray();
	}

	public function ubah($data)
	{
		$this->db->table('tb_banner')->where('id_benner', $data['id_benner'])->update($data);
	}

	public function hapus($data)
	{
		$this->db->table('tb_banner')->where('id_benner', $data['id_benner'])->delete($data);
	}

	public function jumlahPendaftar()
	{
		return $this->db->table('tb_siswa')->where('thn', date('Y'))->where('stat_pendaftaran', '1')->countAllResults();
	}

	public function jumlahCowo()
	{
		return $this->db->table('tb_siswa')->where('stat_pendaftaran', '1')->where('jk', 'L')->countAllResults();
	}

	public function jumlahCewe()
	{
		return $this->db->table('tb_siswa')->where('stat_pendaftaran', '1')->where('jk', 'P')->countAllResults();
	}
}
