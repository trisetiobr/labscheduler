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
			$this->load->view('staff/dashboard');
		}
		else
		{
			redirect('login');
		}
	}
}