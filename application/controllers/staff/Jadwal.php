<?php

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title'=>'Jadwal'
		);
		$this->load->view('config/header');
		$this->load->view('staff/main-header');
		$this->load->view('staff/main-sidebar');
		//content
		$this->load->view('staff/jadwal/content', $data);
		
		$this->load->view('staff/main-footer');
		$this->load->view('config/footer');
	}
}