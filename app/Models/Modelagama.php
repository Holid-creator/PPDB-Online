<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelagama extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_agama')->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_agama')->insert($data);
	}

	public function ubah($data)
	{
		$this->db->table('tb_agama')->where('id_agama', $data['id_agama'])->update($data);
	}

	public function hapus($data)
	{
		$this->db->table('tb_agama')->where('id_agama', $data['id_agama'])->delete($data);
	}
}
