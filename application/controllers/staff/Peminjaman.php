<?php

class Peminjaman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title'=>'Peminjaman'
		);
		$this->load->view('config/header');
		$this->load->view('staff/main-header');
		$this->load->view('staff/main-sidebar');
		//content
		$this->load->view('staff/peminjaman/content', $data);
		
		$this->load->view('staff/main-footer');
		$this->load->view('config/footer');
	}
}