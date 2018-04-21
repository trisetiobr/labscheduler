<?php

class Test_ajax_db extends CI_Controller
{
	private $main;
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->main = 'staff/main/main';
		$this->data['client_script'] = base_url('webscript/test/test_ajax_db.js');
	}

	public function index()
	{
		$this->data['content'] = 'test/test_ajax_db';
		$this->load->view($this->main, $this->data);
	}
}