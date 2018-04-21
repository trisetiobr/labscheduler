<?php
	
class Role_model extends CI_Model
{
	public $table = 'roles';
	public $fields = array(
		'fields' => array( 'id', 'name'),
		'editable' => array( 'name' )
	);

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		return $this->db->select('*')->from($this->table)->get()->result_array();
	}
}