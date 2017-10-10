<?php

class Dashboard extends CI_Controller
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
				'total_pengajar'=>0,
				'total_matakuliah'=>0,
				'total_laboratorium'=>0,
				'total_pengguna'=>0,
				'total_jadwal'=>0,
				'total_konfirmasi_peminjaman'=>0
			);
	}

	public function index()
	{
		//check if session exists
		if($this->session->userdata('id') != '')
		{
			$data = $this->data;
			//header
			$this->load_header();
			//content
			$this->load->view('staff/dashboard', $data);
			//footer
			$this->load_footer();
		}
		else
		{
			redirect('login');
		}
	}
}