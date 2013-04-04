<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cdn_url'))
{
	function cdn_url()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('cdn_url');
	}
}
