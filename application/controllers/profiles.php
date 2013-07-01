<?php


class Profiles extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$h = array('url','form');
		$this->load->helpers($h);
		$this->load->model('profiles_model');
	}
	
	
	public function index()
	{
		
		//print_r($data);
		

		$data = $this->profiles_model->profilepage();
		

		$this->load->view('header');

		$this->load->view('profiles_page',$data);
		
		
		$this->load->view('template_bottom');
	}
	
	public function showprofiles($id,$some_id)
	{
		
		
		$data = $this->profiles_model->profile($id);
		
		$this->load->view('lheader');
		$this->load->view('profile',$data);
		echo $some_id;
		$this->load->view('template_bottom');
	}
	
	public function show($id)
	{
		
		$data = $this->profiles_model->profile($id);
		
		$this->load->model('users_model');
		if($this->session->userdata('username')) {
			$data['uname'] = $this->users_model->getuser($this->session->userdata('username'));
		}
		$this->load->view('template_header');
		$this->load->view('profile',$data);
		$this->load->view('template_bottom');
	}
		
	public function userprofile($username)
	{
		
		$data = $this->profiles_model->profile_v2($username);
		
		$this->load->model('users_model');
		if($this->session->userdata('username')) {
			$data['uname'] = $this->users_model->getuser($this->session->userdata('username'));
		}
		$this->load->view('template_header');
		$this->load->view('profile',$data);
		$this->load->view('template_bottom');
	}
	
	public function edit($user_id)
	{
		$data = $this->profiles_model->profile($user_id);
		$this->load->view('template_header');
		$this->load->view('edit_profile',$data);
		$this->load->view('template_bottom');
	}
}
?>
