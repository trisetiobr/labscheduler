<?php

class Pengajar extends CI_Controller
{
	private $data;
	private function load_header()
	{

		$this->load->view('config/header');
		$this->load->view('staff/main-header');
		$this->load->view('staff/main-sidebar');
	}

	private function load_footer()
	{
		$this->load->view('staff/main-footer');
		$this->load->view('config/footer');
	}

	public function __construct()
	{
		parent::__construct();
		$this->data = array(
				'title'=>'Pengajar',
				'icon'=>'glyphicon glyphicon-briefcase',
				'role'=>$this->session->userdata('role'),
				'id'=>$this->session->userdata('id'),
				'alert'=>$this->session->userdata('alert'),
				'alert_text'=>$this->session->userdata('alert_text'),
				'query'=>''	
			);

		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('staff_model');
		$this->load->helper('randomchar_generator');
	}

	public function create()
	{
		$data = $this->data;
		$username = strtolower($this->input->post('username'));
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$role_id = $this->input->post('role_id');
		$email = strtolower($this->input->post('email'));
		$phone = $this->input->post('phone');
		$salt = randomchar_generator(25);
		//hash
		$password = hash('sha512', $salt . $password . $salt);
		$userData = array(
			'id'=>$username,
			'password'=>$password,
			'salt'=>$salt,
			'role_id'=>$role_id
		);
		$staffData = array(
			'id'=>$username,
			'name'=>$name,
			'email'=>$email,
			'phone'=>$phone
		);
		//create
		$query = $this->user_model->insert_user($userData);
		$query = $this->staff_model->insert_staff($staffData);
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
		redirect('staff/pengajar');
	}

	public function read()
	{
		return $this->staff_model->get_staff_all();
	}

	public function update()
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
			redirect('staff/pengajar');
		}
		else
		{
			$this->session->set_userdata('alert_text', 'Terjadi error, data '.$this->data['title'].' gagal di ubah');
			$this->session->set_userdata('alert', 'alert-danger');
			redirect('staff/pengajar');
		}
	}

	public function delete()
	{
		$urls = $this->uri->segment_array();//get urls
		$id = $urls[sizeof($urls)];//<-get last segment of url
		$query = $this->staff_model->delete_staff_by_id($id);//delete staff
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

	public function index()
	{
		$data = $this->data;
		$data['staffs'] = $this->read();
		$this->session->set_userdata('alert', '');
		$this->session->set_userdata('alert_text', '');
		//header
		$this->load_header();
		//content
		$this->load->view('staff/pengajar/pengajar-content', $data);
		//footer
		$this->load_footer();
	}

	public function detail()
	{
		$data = $this->data;
		$urls = $this->uri->segment_array();//get urls
		$id = $urls[sizeof($urls)];//<-get last segment of url
		$data['query'] = $this->staff_model->get_staff_join_role_by_id($id);
	
		//header;
		$this->load_header();
		//content
		$this->load->view('staff/pengajar/pengajar-detail', $data);
		//footer
		$this->load_footer();
	}

	public function ubah()
	{

		$data = $this->data;
		$urls = $this->uri->segment_array();
		$id = $urls[sizeof($urls)];
		$data['query'] = $this->staff_model->get_staff_join_role_by_id($id);
		$data['options'] = $this->role_model->get_role_all();
		$data['users_role_id'] = $this->user_model->get_user_role_id_by_id($id);
		//header
		$this->load_header();
		//content
		if($data['role'] == 'admin')
		{
			$this->load->view('staff/pengajar/pengajar-ubah', $data);
		}
		else
		{
			$this->load->view('error-404');
		}
		//footer
		$this->load_footer();
	}

	public function tambah()
	{
		$data = $this->data;
		//header		{
		$this->load_header();
		//content
		if($data['role'] == 'admin')
		{
			$data['roles'] = $this->role_model->get_role_all();
			$this->load->view('staff/pengajar/pengajar-tambah', $data);
		}
		else
		{
			$this->load->view('error-404');
		}
		//footer
		$this->load_footer();
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