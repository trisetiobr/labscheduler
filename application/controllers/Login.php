<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('password','password','required');
		$viewData = array('loginStatus'=>'');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('config/header');
			$this->load->view('login', $viewData);
			$this->load->view('config/footer');
		}
		else
		{
			//check id
			$id = $this->input->post('id');
			$password = $this->input->post('password');
			$valid = $this->user_model->check_user_by_id($id);

			if($valid)
			{
				$salt = $this->user_model->get_user_salt_by_id($id);
				$password = hash('sha512', $salt.$password.$salt);
				
				$data = array('id'=>$id, 'password'=>$password);

				$valid = $this->user_model->check_user_by_id_password($data);
				if($valid)
				{
					// correct login
					$this->load->view('config/header');
					$this->load->view('home');
					$this->load->view('config/footer');
				}
				else
				{
					$viewData['loginStatus'] = 'failed';
					$this->load->view('config/header');
					$this->load->view('login', $viewData);
					$this->load->view('config/footer');
				}
			}
			else
			{
				$viewData['loginStatus'] = 'none';
				$this->load->view('config/header');
				$this->load->view('login', $viewData);
				$this->load->view('config/footer');
			}
		}
	}
}