<?php
class Ajax_db extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->input->is_ajax_request())
		{
			exit('No direct script access allowed');
		}
	}

	//**************************************//
	// 							Others
	//**************************************//
	public function call()
	{
		$outp = [ 'result'=>0 ];
		$params = $this->input->post('params');

		$outp['params'] = $params;
		echo json_encode($outp);
	}

	//**************************************//
	// 							Create
	//**************************************//
	public function create()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);
	}

	public function create_by_conds()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);
	}

	//**************************************//
	// 							Read
	//**************************************//
	public function get_by_id()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);
	}

	public function get_by_conds()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);

	}

	//**************************************//
	// 							Update
	//**************************************//
	public function update_by_id()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);

	}

	public function update_by_conds()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);

	}

	//**************************************//
	// 							Delete
	//**************************************//
	public function delete_by_id()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);

	}

	public function delete_by_conds()
	{
		$outp = [ 'result'=>0 ];

		echo json_encode($outp);
	}
	
}