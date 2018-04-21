<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_service {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
    $this->ci->load->model('role_model');
	}

	public function roles()
	{
		$Roles = $this->ci->role_model->get_all();
		$outp = [];
		if(count($Roles) > 0)
		{
			foreach($Roles as $Role)
			{
				$outp[$Role['id']] = $Role['name'];
			}
		}
		return $outp;
	}

}