<?php

class Login extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('users_model');
		$this->load->model('profiles_model');
	}
	

	public function index() 
	{
	
		$this->load->view('login');
	}
 
	public function check()
	{

		//$membership = new Membership();
		$username = $_POST['username'];
		$password = $_POST['pwd'];		
		// If the user clicks the "Log Out" link on the index page.
		$this->load->library('session');
		$login = 	$this->users_model->auth($username,$password);
		if($login)
		{
			$this->load->helper('url');
			$this->session->set_userdata('userid', $username);
			redirect('welcome');
			
		}
		else
		{
			echo "You are not authorized";
		}		 
	}

	
}

?>
