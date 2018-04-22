<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( ! function_exists('data_fmt_validate'))
{
	/*
	@tsbr
	
	schema (string)		: create, read, update, delete
	data (array)			: input
	mode_name (string): name of model
	outp (array)			: result => 'data is correct', data => field with data array
	*/
	function data_fmt_validate($model_name, $data, $schema)
	{
		$ci = get_instance();
		$ci->load->model($model_name);
		// get all fieldname
		$fields = $ci->$model_name->fields;
		// get pk fieldname
		$pk = $fields['pk'];

		// declare output
		$outp = ['result'=>false, 'data'=>[]];

		if(array_key_exists($schema, $fields))
		{
			$rules = $fields['rules'];
			$fields = $fields[$schema];
			if($fields === '*')
			{
				$fields = $fields['fields'];
			}

			foreach($fields as $key)
			{
				if(array_key_exists($key, $data))
				{
					$outp['data'][$key] = $data[$key];
				}
			}
			if(array_key_exists($pk, $outp['data']))
			{
				unset($outp['data'][$pk]);
			}
			$outp['result'] = true;

		}
		return $outp;
	}
}