<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identity_service {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
	}

	public function set($User)
	{
		if(isset($User['id']) && isset($User['role']))
		{
			$this->ci->session->set_userdata('id', $User['id']);
			$this->ci->session->set_userdata('role', $User['role']);
		}
	}

	public function destroy()
	{

	}

	public function get_id()
	{
		return $this->ci->session->userdata('id');
	}

	public function get_role()
	{
		return $this->ci->session->userdata('role');
	}

	public function validate_role($type)
	{
		if($this->ci->session->userdata('role') === $type)
		{
			return true;
		}
		else
		{
			redirect('login');
		}
	}
}