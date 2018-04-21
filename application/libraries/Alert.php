<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
	}
	public function set($type, $text)
	{
		$this->ci->session->set_userdata('alert', $type);
		$this->ci->session->set_userdata('alert_text', $text);
	}
	public function destroy()
	{
		$this->ci->session->set_userdata('alert','');
		$this->ci->session->set_userdata('alert_text','');
	}

}