<?php

class Laboratorium extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title'=>'Laboratorium'
		);
		$this->load->view('config/header');
		$this->load->view('staff/main-header');
		$this->load->view('staff/main-sidebar');
		//content
		$this->load->view('staff/laboratorium/content', $data);
		
		$this->load->view('staff/main-footer');
		$this->load->view('config/footer');
	}
}