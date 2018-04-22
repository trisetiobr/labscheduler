<?php

class Subject extends CI_Controller
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
		$this->page_url = 'staff/matakuliah';

		
		// load alert service
		$this->load->library('services/alert_service');

		// load user service
		$this->load->library('services/subject_service');

		// load utility service
		$this->load->library('services/util/option_service');

		// load identity service
		$this->load->library('services/identity_service');

		// validate role
		$this->identity_service->validate_role('admin');

		$this->data = array(
			'title'=>'Matakuliah',
			'icon'=>'glyphicon glyphicon-briefcase',
			'alert'=>$this->alert_service->get_type(),
			'alert_text'=>$this->alert_service->get_text(),
			'page_url'=>$this->page_url,
			'client_script' => base_url('webscript/staff/subject.js')
		);
	}

	public function index()
	{
		$Subjects = $this->subject_service->get_all();
		$this->data['Subjects'] = $Subjects;
		$this->data['content'] = $this->page_url . '/content';

		// view
		$this->load->view($this->main, $this->data);
	}

	public function create()
	{
		$this->data['content'] = $this->page_url . '/create';
		
		if(count($this->input->post('Subject')) > 0)
		{
			$Subject = $this->input->post('Subject');
			$result = $this->subject_service->create($Subject);
			if($result === 1)
			{
				// todo alert
				$this->alert_service->set('success', 'data matakuliah berhasil ditambahkan');
			}
			else
			{
				// todo alert
				$this->alert_service->set('error', 'data matakuliah gagal ditambahkan');
			}
			redirect('staff/subject');
		}
		else
		{
			// load create page
			$this->data['content'] = $this->page_url . '/create';
		}
		// view
		$this->load->view($this->main, $this->data);
	}

	public function update($pk)
	{

	}

	public function delete($pk)
	{

	}

}