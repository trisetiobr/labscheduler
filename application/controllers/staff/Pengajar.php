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
				'alert'=>''	
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
		$this->user_model->insert_user($userData);
		$this->staff_model->insert_staff($staffData);
		redirect('staff/pengajar');
	}

	public function read()
	{
		return $this->staff_model->get_staff_all();
	}

	public function update()
	{

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
				redirect('staff/pengajar');//rollback if failed
			}
			else
			{
				$this->user_model->rollback();//rollback if failed
				redirect('staff/pengajar');
			}
		}
		else
		{
			$this->staff_model->rollback();//rollback if failed
			redirect('staff/pengajar');
		}
	}

	public function index()
	{
		$data = $this->data;
		$data['staffs'] = $this->read();
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