<?php

class Daftar_pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title'=>'Daftar Pengguna'
		);
		$this->load->view('config/header');
		$this->load->view('staff/main-header');
		$this->load->view('staff/main-sidebar');
		//content
		$this->load->view('staff/daftar-pengguna/content', $data);
		
		$this->load->view('staff/main-footer');
		$this->load->view('config/footer');
	}
}