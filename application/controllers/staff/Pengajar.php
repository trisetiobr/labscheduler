<?php

class Pengajar extends CI_Controller
{
	private $data;
	private $main;
	private $not_found;
	private $page_url;

	public function __construct()
	{
		parent::__construct();
		$this->main = 'staff/main/main';
		$this->not_found = 'staff/main/main-not-found';
		$this->page_url = 'staff/pengajar';

		// load classes
		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('staff_model');
		
		// load identity service
		$this->load->library('services/identity_service');
		
		// load alert service
		$this->load->library('services/alert_service');

		// load user service
		$this->load->library('services/user_service');

		// load staff service
		$this->load->library('services/staff_service');

		// load alert service
		$this->load->library('services/alert_service');

		// load utility service
		$this->load->library('services/util/option_service');

		// validate role
		$this->identity_service->validate_role('admin');

		$this->data = array(
			'title'=>'Pengajar',
			'icon'=>'glyphicon glyphicon-briefcase',
			'query'=>'',
			'alert'=>$this->alert_service->get_type(),
			'alert_text'=>$this->alert_service->get_text(),
			'page_url'=>$this->page_url,
		);
	}

	// Index
	public function index()
	{
		$this->data['staffs'] = $this->staff_service->get_all();
		$this->data['content'] = $this->page_url . '/pengajar-content';

		// view
		$this->load->view($this->main, $this->data);
	}

	// Create
	public function create()
	{
		if(count($this->input->post('User')) > 0)
		{
			$User = $this->input->post('User');

			$result = $this->user_service->create($User);
			if($result === 1)
			{
				// todo alert
				$this->alert_service->set('success', 'data pengajar berhasil ditambahkan');
			}
			else
			{
				// todo
			}
			redirect('staff/pengajar');
		}
		else
		{
			// load create page
			$this->data['roles'] = $this->option_service->roles();
			$this->data['content'] = $this->page_url . '/pengajar-tambah';
		}
		$this->load->view($this->main, $this->data);
	}

	// Read
	public function detail($id)
	{
		//$urls = $this->uri->segment_array();//get urls
		$Model = $this->staff_model->get_staff_join_role_by_id($id);
		if(count($Model) > 0)
		{
			$this->data['Model'] = $Model;
			$this->data['content'] = 'staff/pengajar/pengajar-detail';
		}
		else
		{
			$this->data['content'] = $this->not_found;
		}
		$this->load->view($this->main, $this->data);
	}

	// Update
	public function update($id)
	{ 
		$Model = $this->staff_service->get($id);
		if(count($Model) > 0)
		{
			// check post
			if(count($this->input->post('User')) > 0)
			{
				$Data = $this->input->post('User');
				$result = $this->staff_service->update($id, $Data);
				redirect('staff/pengajar');
			}
			else
			{
				$this->data['options'] = $this->option_service->roles();
				$this->data['Model'] = $Model;
				$this->data['content'] = '/staff/pengajar/pengajar-ubah';
			}
		}
		else
		{
			$this->data['content'] = $this->not_found;
		}
		$this->load->view($this->main, $this->data);
	}

	// Delete
	public function delete($id)
	{
		$result = $this->staff_service->delete($id);
		if($result === true)
		{
			// to do alert
		}
		else
		{
			// to do alert
		}
		redirect('staff/pengajar');
	}

	public function ajax_check_username()
	{
		$id = $this->input->post('username');
		$result = $this->user_model->check_user_by_id($id);

		if($result){
			echo '1';
		}
		else{
			echo '0';
		}
	}
}