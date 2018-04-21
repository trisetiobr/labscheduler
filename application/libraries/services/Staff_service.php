<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_service {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
    $this->ci->load->model('user_model');
	}
	public function get($pk)
	{
		$User = $this->ci->user_model->get_by_pk_and_role($pk, 'staff');
		$outp = [];
		if(count($User) == 1)
		{
			$outp = $User[0];
		}
		return $outp;
	}

	public function get_all()
	{
		$Users = $this->ci->user_model->get_all_by_role('staff');
		if(count($Users) > 0)
		{
			return $Users;
		}
		else
		{
			return [];
		}
	}
	
	public function update($pk, $data)
	{
		$User = $this->ci->user_model->get_by_pk_and_role($pk, 'staff');
		$outp = false;
		if(count($User) == 1)
		{
			if(array_key_exists('id', $data))
			{
				unset($data['id']);
			}
			$this->ci->db->trans_begin();
			$query = $this->ci->user_model->update($pk, $data);
			if($query === true)
			{
				$outp = true;
				$this->ci->db->trans_commit();
			}
			else
			{
				$this->ci->db->rollback();
			}
		}
		return $outp;
	}

	public function delete($pk)
	{
		$User = $this->ci->user_model->get_by_pk_and_role($pk, 'staff');
		$outp = false;
		if(count($User) == 1)
		{
			$this->ci->db->trans_begin();
			$query = $this->ci->user_model->delete_by_pk($pk);
			if($query === true)
			{
				$outp = true;
				$this->ci->db->trans_commit();
			}
			else
			{
				$this->ci->db->trans_rollback();
			}
		}
		return $outp;
	}

}