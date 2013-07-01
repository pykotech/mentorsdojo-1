<?php

class Registration extends CI_Controller {

	public function __construct() {
		parent::__construct();



		$this->load->database();
		
		$this->load->library('session');


		$helpers = array('url','form');

		$this->load->helper($helpers);
		
	}

	public function mentee()
	{
		//get expertise from member_expertise list.
		$query = $this->db->query("SELECT * FROM member_expertise");
		
		
		foreach($query->result() as $row):
			$id = $row->id;
			$exp = $row->expertise;
			$args[$id] = $exp;
		endforeach;
		
		//populate $data[expertises] which will be put into mentee form
		$data['expertises'] = $args;
		
		$this->load->view('template_header.php');
		
		$this->load->view('mentee_form.php',$data);
		
		$this->load->view('template_bottom.php');
	}
	
	
	public function mentor()
	{
		$query = $this->db->query("SELECT * FROM member_expertise");
		
		
		foreach($query->result() as $row):
			$id = $row->id;
			$exp = $row->expertise;
			$args[$id] = $exp;
		endforeach;
		
		//populate $data[expertises] which will be put into mentee form
		
		$data['expertises'] = $args;
		
		$this->load->view('template_header.php');
		
		$this->load->view('mentor_form.php',$data);
		
		$this->load->view('template_bottom.php');

	}
}
/*
file: Registration.php
Location: controllers/
Author:jpalala <squawknet.net>
*/