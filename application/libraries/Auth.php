<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
	private $ci;
	public function __construct(){
		// to load ci instance
	  $this->ci =& get_instance();
	}

  public function validate($id, $password)
  {
  	$outp = ['status' => false, 'model'=>[] ];
  	$User = $this->ci->user_model->get_by_pk($id);
  	if(count($User) > 0)
  	{
  		$currentpwd = $this->encrypt($User['salt'], $password);
  		if(strtolower($id) === strtolower($User['id']) && strtolower($currentpwd) === strtolower($User['password']))
  		{
  			$outp['status'] = true;
  			$outp['model'] = $User;
  		}

  	}
  	return $outp;
  }

  public function encrypt($salt, $password)
  {
  	return hash('sha512', $salt . $password . $salt);
  }
}