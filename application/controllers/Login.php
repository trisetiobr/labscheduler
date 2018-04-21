<?php

class Login extends CI_Controller
{
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// load auth service
		$this->load->library('auth');
		// load identity service
		$this->load->library('identity');
	}

	public function index()
	{
		if(count($this->input->post('User')) > 0)
		{
			//check id
			$POST = $this->input->post('User');
			$id = $POST['id'];
			$password = $POST['password'];
			$auth = $this->auth->validate($id, $password);
			
			if($auth['status'] === true)
			{
				$this->identity->set($auth['model']);
				redirect('/staff/dashboard');
			}
		}

		$this->load->view('config/header');
		$this->load->view('login');
		$this->load->view('config/footer');
	}
}