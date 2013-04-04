<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	private $logged_in_user_id;
	private $logged_in_user_name;
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/welcome/about/homepage');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['file_root'] = $this->tank_auth->get_file_root();
			$this->load->view('investor/news_and_events', $data);
		}
	}
	
	function about($page='careers')
	{
		$data['file_root'] = $this->tank_auth->get_file_root();
		$this->load->view('outerpages/'.$page, $data);
	}
	
	function investor($page='specific_project_fridgedoor')
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['file_root'] = $this->tank_auth->get_file_root();
			$this->load->view('investor/'.$page, $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */