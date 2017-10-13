<?php
class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function commit()
	{
		$this->db->trans_commit();
	}

	public function rollback()
	{
		$this->db->trans_rollback();
	}

	public function check_user_by_id($id)
	{
		$query = $this->db->get_where('users',array('id'=>$id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function insert_user($data)
	{
		$query = $this->db->insert('users', $data);
	}

	public function delete_user_by_id($id)
	{
		$this->db->where('id', $id)->delete('users');
		return $this->db->trans_status();
	}

	public function get_user_salt_by_id($id)
	{
		//get salt
		$query = $this->db->get_where('users',array('id'=>$id))->row();
		return $query->salt;
	}

	public function check_user_by_id_password($data)
	{
		$query = $this->db->get_where('users',$data);
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
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