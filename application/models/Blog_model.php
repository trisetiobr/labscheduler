<?php

class Blog_model extends CI_Model {
	/*
	public function __construct()
	{
		$this->load->database();
	}

	public function get_todo_by_id($id)
	{
		//row_array()->single result, result_array()->multiple
		$query = $this->db->get_where('todo',array('id'=>$id ))
					  ->row_array(); 
		return $query;
	}

	public function get_todo_all()
	{
		$query = $this->db->get('todo')
					  ->result_array();
		return $query;
	}

	public function is_exists_todo_by_id($id)
	{
		$query = $this->db->get_where('todo',array('id'=>$id));
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function insert_todo($data)
	{
		$query = $this->db->insert('todo', $data);
		return $query;
	}
	
	public function get_last_ten_entries() {
		$query = $this->db->get('entries', 10);
		return $query->result();
	}

	public function insert_entry() {
		$this->title = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date = time();

		$this->db->insert('entries', $this);
	}

	public function update_entry() {
		$this->title = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
	*/
}