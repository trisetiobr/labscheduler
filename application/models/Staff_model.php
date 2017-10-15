<?php
class Staff_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function rollback()
	{
		$this->db->trans_rollback();
	}

	public function commit()
	{
		$this->db->trans_commit();
	}

	public function insert_staff($data)
	{
		$query = $this->db->insert('staffs', $data);
	}

	

	public function delete_staff_by_id($id)
	{
		$this->db->trans_begin();
		$this->db->where('id', $id)
		         ->delete('staffs');
		return $this->db->trans_status();
	}

	public function get_staff_join_role_by_id($id)
	{
		$query = $this->db->select('staffs.id, staffs.name, staffs.email, staffs.phone,
									roles.role')
						  ->from('staffs')
						  ->join('users', 'users.id = staffs.id')
						  ->join('roles', 'roles.id = users.role_id')
						  ->where('staffs.id', $id)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function get_staff_all()
	{
		$query = $this->db->select('staffs.id, staffs.name, staffs.email, 
									staffs.phone, roles.role ')
						  ->from('staffs')
						  ->join('users', 'users.id = staffs.id')
						  ->join('roles', 'roles.id = users.role_id')
						  ->get()
						  ->result_array();
		return $query;
	}

	public function get_user_roles_by_id($id)
	{
		$query = $this->db->select('roles.role')
						  ->from('users')
						  ->join('roles', 'users.role_id = roles.id')
						  ->where('users.id', $id)
						  ->get()
						  ->row();
		return $query->role;
	}
}