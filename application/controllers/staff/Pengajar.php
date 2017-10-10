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
				'alert'=>'',
				'query'=>''	
			);
	}

	public function index()
	{
		$data = $this->data;
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
		//header
		$this->load_header();
		//content
		if($data['role'] == 'admin')
		{
			$this->load->view('staff/pengajar/pengajar-tambah', $data);
		}
		else
		{
			$this->load->view('error-404');
		}
		//footer
		$this->load_footer();
	}
}