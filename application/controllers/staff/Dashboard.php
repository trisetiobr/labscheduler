<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//check if session exists
		if($this->session->userdata('id') != '')
		{
			$this->load->view('config/header');
			$this->load->view('staff/main-header');
			$this->load->view('staff/main-sidebar');
			$this->load->view('staff/dashboard');
			$this->load->view('staff/main-footer');
			$this->load->view('config/footer');
		}
		else
		{
			redirect('login');
		}
	}
}