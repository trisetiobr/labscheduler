<?php
class Ajax_db extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->input->is_ajax_request() || $this->input->server('REQUEST_METHOD') != 'POST')
		{
			show_404();
			die;
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
	public function get_by_pk()
	{
		// set default outp
		$outp = [ 'result'=>0, 'model' => [] ];
		if(count($this->input->post('pk')) === 1 && count($this->input->post('model')) === 1)
		{
			// retrieve the requested pk
			$pk = $this->input->post('pk');

			// retrieve the requestted model
			$model = $this->input->post('model');

			// load model
			$this->load->model($model);
			$Model = $this->$model->get_by_pk($pk);
				
			// assign the model
			if(count($Model) > 0)
			{
				$outp['model'] = $Model;
			}
			$outp['result'] = 1;
		}
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