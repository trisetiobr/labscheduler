<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//check if session exists
		if($this->session->userdata('id') != '')
		{
			$data = array(
				'total_pengajar'=>0,
				'total_matakuliah'=>0,
				'total_laboratorium'=>0,
				'total_pengguna'=>0,
				'total_jadwal'=>0,
				'total_konfirmasi_peminjaman'=>0
			);
			//$data['total_pengajar'] =
			//$data['total_matakuliah'] =
			//$data['total_laboratorium'] = 
			//$data['total_pengguna'] =
			//$data['total_jadwal'] = 
			//$data['total_konfirmasi_peminjaman'] =
			$this->load->view('config/header');
			$this->load->view('staff/main-header');
			$this->load->view('staff/main-sidebar');
			$this->load->view('staff/dashboard', $data);
			$this->load->view('staff/main-footer');
			$this->load->view('config/staff-script');
			$this->load->view('config/footer');
		}
		else
		{
			redirect('login');
		}
	}
}