<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeladmin;
use App\Models\Modelbenner;

class Home extends BaseController
{
	public function __construct()
	{
		$this->Modelbenner = new Modelbenner();
		$this->Modeladmin = new Modeladmin();
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Home',
			'benner' => $this->Modelbenner->getAllData(),
			'beranda' => $this->Modeladmin->detailData(),
			'jumlahpendaftar' => $this->Modelbenner->jumlahPendaftar(),
			'jumlahcowo' => $this->Modelbenner->jumlahCowo(),
			'jumlahcewe' => $this->Modelbenner->jumlahCewe()
		];
		return view('v_home', $data);
	}
}
