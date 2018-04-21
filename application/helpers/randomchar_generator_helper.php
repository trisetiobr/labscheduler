<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( ! function_exists('randomchar_generator'))
{
	function randomchar_generator($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$outp = '';

		for($i = 0; $i < $length; $i++)
		{
			$outp .= $characters[mt_rand(0, strlen($characters)-1)];
		}

		return $outp;
	}
}