<?php
	
class Role_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_role_all()
	{
		$query = $this->db->get('roles')->result_array();
		return $query;
	}
}