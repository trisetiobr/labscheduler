<?php
class Subject_model extends CI_Model
{
	public $table = 'subjects';
	public $fields = [
		'pk' => 'id',
		'fields' => [ 'id', 'code', 'name', 'description', 'status' ],
		'create' => [ 'code', 'name', 'description', 'status' ],
		'update' => [ 'name', 'description', 'status'],
		'rules' => [],
	];

	public function __construct()
	{
		$this->load->database();
	}

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($pk, $data)
	{
		return $this->db->where('id', $pk)
								    ->update($this->table, $data);
	}
	public function get_by_pk($pk)
	{
		return $this->db->get_where($this->table, array('id'=>$pk))
									  ->row_array();
	}

	public function get_by_code($code)
	{
		return $this->db->get_where($this->table, array('code'=>$code))
									  ->result_array();
	}
	
	public function delete_by_pk($pk)
	{
		return $this->db->where('id', $pk)->delete($this->table);
	}

	public function get_all()
	{
		return $this->db->select('*')->from($this->table)->get()->result_array();
	}
}