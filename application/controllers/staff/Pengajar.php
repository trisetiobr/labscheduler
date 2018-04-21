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
		$this->page_url = 'staff/pengajar/';

		$this->data = array(
			'title'=>'Pengajar',
			'icon'=>'glyphicon glyphicon-briefcase',
			'role'=>$this->session->userdata('role'),
			'id'=>$this->session->userdata('id'),
			'alert'=>$this->session->userdata('alert'),
			'alert_text'=>$this->session->userdata('alert_text'),
			'query'=>'',
			'page_url'=>$this->page_url,
		);

		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('staff_model');
		$this->load->helper('randomchar_generator');
	}

	// Index
	public function index()
	{
		$data = $this->data;
		$data['staffs'] = $this->user_model->get_all_by_role('staff');
		$data['content'] = 'staff/pengajar/pengajar-content';

		// set session
		$this->session->set_userdata('alert', '');
		$this->session->set_userdata('alert_text', '');

		// view
		$this->load->view($this->main, $data);
	}

	// Create
	public function create()
	{
		//content
		if($this->data['role'] == 'admin')
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				// form submitted
				$post = $this->input->post();
				$fields = $this->user_model->fields['fields'];
				$data = get_input($post, $fields);
				$data['salt'] = randomchar_generator(25);

				// encrypt password
				$data['password'] = hash('sha512', $data['salt'] . $data['password'] . $data['salt']);
				
				// create rcord
				$query = $this->user_model->create($data);
				if($query)
				{
					$this->session->set_userdata('alert_text', 'Data '.$this->data['title'].' berhasil ditambahkan');
					$this->session->set_userdata('alert', 'alert-success');
				}
				else
				{
					$this->session->set_userdata('alert_text', 'Terjadi error, data '.$this->data['title'].' gagal ditambahkan');
					$this->session->set_userdata('alert', 'alert-danger');
				}
			}
			else
			{
				// load create page
				$this->data['roles'] = $this->role_model->get_role_all();
				$this->data['content'] = $this->page_url . 'pengajar-tambah';
			}
			redirect('staff/pengajar');
		}
		else
		{
			$this->data['content'] = $this->not_found;
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
		$Model = $this->staff_model->get_staff_join_role_by_id($id);
		if(count($Model) > 0)
		{
			// check post
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				// assign value
				$post = $this->input->post();
				$fields = $this->staff_model->fields['editable'];
				$data = get_input($post, $fields);

				$result = $this->staff_model->update($id, $data);
				print_r($result); die;
			}
			else
			{
				$options = $this->role_model->get_role_all();
				$users_role_id = $this->user_model->get_user_role_id_by_id($id);

				// view
				$this->data['Model'] = $Model;
				$this->data['content'] = 'staff/pengajar/pengajar-ubah';
				$this->data['options'] = $options;
				$this->data['users_role_id'] = $users_role_id;
			}
		}
		else
		{
			$this->data['content'] = $this->not_found;
		}
		$this->load->view($this->main, $this->data);
	}

	public function update2()
	{
		$urls = $this->uri->segment_array();
		$id = $urls[sizeof($urls)];
		$role_id = $this->input->post('role_id');
		$update = array(
				'id'=>$id,
				'role_id'=>$role_id
				);
		$query = $this->user_model->update_user_role($update);
		if($query === TRUE)
		{
			$this->session->set_userdata('alert_text', 'Data '.$this->data['title'].' berhasil diubah');
			$this->session->set_userdata('alert', 'alert-success');
		}
		else
		{
			$this->session->set_userdata('alert_text', 'Terjadi error, data '.$this->data['title'].' gagal di ubah');
			$this->session->set_userdata('alert', 'alert-danger');
		}
		redirect('staff/pengajar');
	}

	// Delete
	public function delete($id)
	{
		$Model = $this->user_model->get_by_pk($id);
		if(count($Model) > 0)
		{
			// perform delete
			$query = $this->user_model->delete($Model);
		}
		else
		{

		}

		if($query === TRUE)
		{
			$query = $this->user_model->delete_user_by_id($id);//delete user
			if($query === TRUE)
			{
				$query = $this->user_model->commit();//commit
				$this->session->set_userdata('alert', 'alert-success');
				$this->session->set_userdata('alert_text', 'Data '.$this->data['title'].' berhasil di delete');
				redirect('staff/pengajar');//rollback if failed
			}
			else
			{
				$this->session->set_userdata('alert', 'alert-danger');
				$this->session->set_userdata('alert_text', 'Terjadi error, data '.$this->data['title'].' gagal di delete');
				$this->user_model->rollback();//rollback if failed
				redirect('staff/pengajar');
			}
		}
		else
		{
			$this->session->set_userdata('alert', 'alert-danger');
			$this->staff_model->rollback();//rollback if failed
			redirect('staff/pengajar');
		}
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