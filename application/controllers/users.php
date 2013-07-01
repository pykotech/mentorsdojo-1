<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$helper_array = array('url','form');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function main()
	{
		
	}
	
	public function auth()
	{
		
		$username = $this->input->post('username');
		$pasword = $this->input->post('password');
		$this->load->model('users_model');
		$result = $this->users_model->auth($username,$pasword);
		if($result == false) {
			return false;
		} else {
			return true;
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */