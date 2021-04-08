<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpenghasilan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_penghasilan')->get()->getResultArray();
	}

	public function add($data)
	{
		return $this->db->table('tb_penghasilan')->insert($data);
	}

	public function ubah($data)
	{
		return $this->db->table('tb_penghasilan')->where('id_penghasilan', $data['id_penghasilan'])->update($data);
	}

	public function hapus($data)
	{
		return $this->db->table('tb_penghasilan')->where('id_penghasilan', $data['id_penghasilan'])->delete($data);
	}
}
