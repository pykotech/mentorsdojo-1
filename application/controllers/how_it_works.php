<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class How_it_works extends CI_Controller {

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
		$this->load->database();
		$helpers = 'url';
		$this->load->helpers($helpers);
	}

	public function index()
	{

		$this->load->view('top');
		$this->load->view('how_it_works');	
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
			$this->load->view('top');
			$this->load->view('admin/login');
			$this->load->view('template_bottom');
		}
	}
	
	
}

/* End of file how_it_works.php */
/* Location: ./application/controllers/how_it_works.php */
