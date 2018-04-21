<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_service {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
    $this->ci->load->model('user_model');
	}

	public function create($User)
	{
		// load auth service
		$this->ci->load->library('services/auth_service');
		
		// load model service
		$result = false;
		
		// check if record exists
		$coba = $this->ci->user_model->get_by_pk($User['id']);
		if(count($coba) === 0)
		{
			$User['salt'] = $this->generate_salt();
			$User['password'] = $this->ci->auth_service->encrypt($User['password'], $User['salt']);
			$result = $this->ci->user_model->create($User);
		}
		return $result;
	}

	public function delete($id)
	{
		// check if user exists
		$User = $this->ci->user_model->get_by_pk($id);
		$outp = false;
		if(count($User) > 0)
		{
			$this->ci->db->trans_begin();
			$query = $this->ci->user_model->delete_by_pk($id);
			if($query === true)
			{
				$outp = true;
				$this->ci->db->trans_commit();
			}
			else
			{
				$this->ci->db->trans_rollback();
			}
		}
		return $outp;
	}
	public function generate_salt()
	{
		$this->ci->load->helper('randomchar_generator');
		return randomchar_generator(25);
	}
}