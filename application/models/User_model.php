<?php
class User_model extends CI_Model
{
	public $table = 'users';
	public $fields = [
		'pk' => 'id',
		'fields' => [ 'id', 'name', 'email', 'password', 'salt', 'role', 'phone' ],
		'create' => [ 'id', 'name', 'email', 'password', 'role', 'phone' ],
		'update' => [ 'name', 'email', 'password', 'role', 'phone'],
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

	public function get_by_pk_and_role($pk, $role)
	{
		return $this->db->get_where($this->table, array('id'=>$pk, 'role'=>$role))
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

	public function get_all_by_role($role)
	{
		return $this->db->get_where($this->table, array('role'=>$role))->result_array();
	}

	public function check_user_by_id($id)
	{
		return $this->db->get_where($this->table, array('id'=>$id))->num_rows();
	}

	public function update_user_role($data)
	{
		$this->db->trans_start();
		$this->db->where('id', $data['id'])
				 ->set('role_id', $data['role_id'])
				 ->update('users');
		$this->db->trans_complete();
		
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

	public function get_user_role_id_by_id($id)
	{
		$query = $this->db->select('role_id')
						  ->from('users')
						  ->join('staffs', 'staffs.id = users.id')
						  ->get()
						  ->row();
		return $query->role_id;
	}
}