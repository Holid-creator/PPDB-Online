<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeljurusan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_jurusan')->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_jurusan')->insert($data);
	}

	public function ubah($data)
	{
		$this->db->table('tb_jurusan')->where('id_jurusan', $data['id_jurusan'])->update($data);
	}

	public function hapus($data)
	{
		$this->db->table('tb_jurusan')->where('id_jurusan', $data['id_jurusan'])->delete($data);
	}
}
