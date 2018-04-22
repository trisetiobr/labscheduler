<?php

class Ajax_subject extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->input->is_ajax_request())
		{
			exit('No direct script access allowed');
		}
	}

	public function check_by_pk()
	{
		
	}

}