<?php

namespace App\Models;

use CodeIgniter\Model;

class Modellampiran extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_lampiran')->get()->getResultArray();
	}

	public function add($data)
	{
		return $this->db->table('tb_lampiran')->insert($data);
	}

	public function ubah($data)
	{
		return $this->db->table('tb_lampiran')->where('id_lampiran', $data['id_lampiran'])->update($data);
	}

	public function hapus($data)
	{
		return $this->db->table('tb_lampiran')->where('id_lampiran', $data['id_lampiran'])->delete($data);
	}
}
