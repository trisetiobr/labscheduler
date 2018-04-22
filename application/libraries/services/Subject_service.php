<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_service {
	private $ci;
	public function __construct()
	{
		// to load ci instance
	  $this->ci =& get_instance();
    $this->ci->load->model('subject_model');
	}
	public function get($pk)
	{

	}

	public function get_all()
	{
		$Subjects = $this->ci->subject_model->get_all();
		if(count($Subjects) > 0)
		{
			return $Subjects;
		}
		else
		{
			return [];
		}
	}
	
	public function create($Subject)
	{
		$result = false;
		// data validation
		$validation = data_fmt_validate('subject_model', $Subject, 'create');

		if($validation['result'] === true)
		{
			$Subject = $validation['data'];
			// check if record exists
			$check = $this->ci->subject_model->get_by_code($Subject['code']);
			if(count($check) === 0)
			{
				$result = $this->ci->subject_model->create($Subject);
			}
		}
		return $result;
	}

	public function update($pk, $data)
	{

	}

	public function delete($pk)
	{

	}

}