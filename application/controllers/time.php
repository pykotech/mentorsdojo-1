<?php


class Time extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function index()
	{
		echo date('C');
	}
}
?>