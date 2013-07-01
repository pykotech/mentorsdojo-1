<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentors_code extends CI_Controller {

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

		
		$this->load->view('top');
		$this->load->view('mentors_code_read');
		$this->load->view('template_bottom');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
