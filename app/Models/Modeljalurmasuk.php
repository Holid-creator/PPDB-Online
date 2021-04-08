<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeljalurmasuk extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_jalur_msk')->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_jalur_msk')->insert($data);
	}

	public function ubah($data)
	{
		$this->db->table('tb_jalur_msk')->where('id_jalur_msk', $data['id_jalur_msk'])->update($data);
	}

	public function hapus($data)
	{
		$this->db->table('tb_jalur_msk')->where('id_jalur_msk', $data['id_jalur_msk'])->delete($data);
	}
}
