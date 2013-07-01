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
		$this->load->database();
		$this->load->library('session');
		
		
		$h = array('url','form');
		$this->load->helpers($h);
		
		$this->load->model('profiles_model');
	}
	public function index()
	{

		
		$this->load->view('template_header');
		$data = $this->profiles_model->profilepage(2);//mentors = 2, mentees = 1
		if($c = $this->session->userdata('username')) 
		{
			//var_dump($c); 
			$data['logged_in'] = true;
		}
		else
		{
			$data['logged_in']  = false;
		}
		$this->load->view('welcome_message',$data);
		
		
		$this->load->view('template_bottom');
	}
	
	public function main()
	{
		$this->load->view('admin/profile_view');	
	}
	
	
	public function admin($function)
	{
		if($function == 'hello')
		{
			$this->load->view('template_header');
			$this->load->view('admin/login');
			$this->load->view('template_bottom');
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
