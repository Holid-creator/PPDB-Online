<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpendidikan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_pendidikan')->get()->getResultArray();
	}

	public function add($data)
	{
		return $this->db->table('tb_pendidikan')->insert($data);
	}

	public function ubah($data)
	{
		return $this->db->table('tb_pendidikan')->where('id_pendidikan', $data['id_pendidikan'])->update($data);
	}

	public function hapus($data)
	{
		return $this->db->table('tb_pendidikan')->where('id_pendidikan', $data['id_pendidikan'])->delete($data);
	}
}
