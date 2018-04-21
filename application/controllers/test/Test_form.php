<?php

class Test_form extends CI_Controller
{
	private $main;
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->main = 'staff/main/main';
		$this->data['client_script'] = base_url('webscript/test/test_form.js');
	}

	public function index()
	{
		$this->data['content'] = 'test/test_form';
		$this->load->view($this->main, $this->data);
	}
}