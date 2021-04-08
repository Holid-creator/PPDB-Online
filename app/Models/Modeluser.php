<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeluser extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_user')->get()->getResultArray();
	}

	public function add($data)
	{
		return $this->db->table('tb_user')->insert($data);
	}

	public function ubah($data)
	{
		return $this->db->table('tb_user')->where('id_user', $data['id_user'])->update($data);
	}

	public function detail($id_user)
	{
		return $this->db->table('tb_user')->where('id_user', $id_user)->get()->getRowArray();
	}

	public function hapus($data)
	{
		return $this->db->table('tb_user')->where('id_user', $data['id_user'])->delete($data);
	}
}
