<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( ! function_exists('get_input'))
{
	function get_input($post, $fields)
	{
		$outp = array();
		foreach($fields as $field)
		{
			if(array_key_exists($field, $post))
			{
				$outp[$field] = $post[$field];
			}
		}
		return $outp;
	}
}