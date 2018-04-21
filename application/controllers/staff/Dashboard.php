<?php

class Dashboard extends CI_Controller
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
		$this->page_url = 'staff/dashboard';

		// load auth service
		$this->load->library('services/auth_service');

		// load identity service
		$this->load->library('services/identity_service');

		// validate role
		$this->identity_service->validate_role('admin');
		
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
		$this->data['content'] = $this->page_url;
		$this->load->view($this->main, $this->data);
	}
}