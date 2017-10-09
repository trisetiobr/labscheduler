<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		/*$data['todo_list'] = array(
			'Clean House',
			'Call Mom',
			'Run Errands'
		);*/
		$data['title'] = 'My Real Title';
		$data['heading'] = 'My Real Heading';
		$data['todo'] = $this->blog_model->get_todo_all();

		$this->load->view('header');
		$this->load->view('blogview', $data);
		$this->load->view('footer');
		//$string = $this->load->view('myfile', '', TRUE);
	}

	public function create()
	{
		//password_hash("admin", PASSWORD_BCRYPT); -> hash
		//password_verify('admin', $hash)

		$data['title'] = 'Create a new todo list';

		$this->form_validation->set_rules('id', 'Id', 'required');
		$this->form_validation->set_rules('todo', 'Todo', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('create', $data);
		}
		else
		{
			$id = $this->input->post('id');
			$todo = $this->input->post('todo');
			$description = $this->input->post('description');
			
			$data = array(
				'id' => $id,
				'todo' => $todo,
				'description' => $description
			);
			
			$is_exists = $this->blog_model->is_exists_todo_by_id($id);
			
			if($is_exists == false)
			{
				$this->blog_model->insert_todo($data);
				$this->load->view('success');
			}
			else
			{
				$this->load->view('id already exists');
			}
		}
	}
}