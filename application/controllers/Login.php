<?php

class Login extends CI_Controller
{
	private $data;
	public function __construct()
	{
		parent::__construct();
		// load auth service
		$this->load->library('services/auth_service');
		// load identity service
		$this->load->library('services/identity_service');
	}

	public function index()
	{
		if(count($this->input->post('User')) > 0)
		{
			//check id
			$POST = $this->input->post('User');
			$id = $POST['id'];
			$password = $POST['password'];
			$auth = $this->auth_service->validate($id, $password);
			
			if($auth['status'] === true)
			{
				$this->identity_service->set($auth['model']);
				if($this->identity_service->get_role() === 'admin')
				{
					redirect('/staff/dashboard');
				}
			}
		}

		$this->load->view('config/header');
		$this->load->view('login');
		$this->load->view('config/footer');
	}
}