<?php

class Logout extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		}
	
	function index()
	{
		if($this->session->userdata('username')) 
		{
			$this->session->unset_userdata('username');
		}

		redirect('/');
	}
}

?>
