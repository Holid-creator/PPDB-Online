<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelta extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_ta')->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_ta')->insert($data);
	}

	public function ubah($data)
	{
		$this->db->table('tb_ta')->where('id_ta', $data['id_ta'])->update($data);
	}

	public function resetStatus()
	{
		$this->db->table('tb_ta')->update(['status' => 0]);
	}

	public function hapus($data)
	{
		$this->db->table('tb_ta')->where('id_ta', $data['id_ta'])->delete($data);
	}

	public function status()
	{
		return $this->db->table('tb_ta')->where('status', '1')->get()->getRowArray();
	}
}
