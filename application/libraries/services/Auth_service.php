<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_service {
	private $ci;
	public function __construct(){
		// to load ci instance
	  $this->ci =& get_instance();
    $this->ci->load->model('user_model');
	}

  public function validate($id, $password)
  {
  	$outp = ['status' => false, 'model'=>[] ];
  	$User = $this->ci->user_model->get_by_pk($id);
  	if(count($User) > 0)
  	{
  		$currentpwd = $this->encrypt($password, $User['salt']);
  		if(strtolower($id) === strtolower($User['id']) && strtolower($currentpwd) === strtolower($User['password']))
  		{
  			$outp['status'] = true;
  			$outp['model'] = $User;
  		}

  	}
  	return $outp;
  }

  public function encrypt($password, $salt)
  {
  	return hash('sha512', $salt . $password . $salt);
  }
}