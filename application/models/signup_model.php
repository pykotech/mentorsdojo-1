<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {
	var $users_table = 'users';
	var $userprofiles_table = 'user_profiles';
	var  $padding = 'added20120421saltkey';

	function check_if_user_exists($username,$email){
		
			//$type = developer? designer? marketing? public relations? finance? founder?
		$sql = "SELECT * FROM " .$this->user_table . " WHERE username = '".$username."' OR email = '".$email."'";
		
		 //type = anything to describe yourself (investor or what not)
		//about - if you want to talk moase about your self

		$res =	$this->db->query($sql);
		if($res->num_rows() > 0 ) {
			return true; //true there is a user
		} 	else {
			return false; //here it means you can create
		}
	}
	
	function logged_in()
	{
		$this->load->library('session');
		$uname = $this->session->userdata('username');
		$res = $this->db->query("SELECT * FROM $users_table WHERE MD5(SHA1(username)) == '".$uname."'");
		
		if(!isset($uname))
		{
			return false; //no session
		}
		elseif($res->num_rows() == 0) {
			return false; //username does not exist.
			
		}
		else
		{
			return true;
		}
	}
	//login and authenticate
		public function login($username,$password)
		{
			$query = $this->db->query("SELECT * FROM users WHERE username = '".$username."' AND password = '". md5($password). "'");

			//crete session
			if($query->num_rows() > 0) {
				
				$this->session->set_userdata(array('username' => md5(sha1(username))));
				return true;
			} else {
				return false;
			}
		}
		
		
	function createUser($fullname,$username,$password,$email,$type){
		$check = $this->check_if_user_exists($username,$email);
			
		$sql = "INSERT INTO " .$this->user_table . " VALUES (";
		$sql .= "NULL, '".$fullname."', '".$username."','".$password."','".$email."','".$type."','".$about."')";
		 //type = anything to describe yourself (investor or what not)
		//about - if you want to talk moase about your self

		return $res = $this->db->query($sql);
	}
	
	public function register($salt, $pwd,$email, $uname, $fname)
	{	
		$salt = md5($this->padding . $salt);
		$password = md5($salt . $pwd);
		
		$sql = "INSERT INTO " .$this->user_table . " VALUES (";
		$sql .= "NULL, '".."', '".$username."','".."','".$email."','".$type."','".$about."')";
		$fullname
		
		if($res != false && $res2 != false ) {
				return true;
		] else {
			return false;
		}
		return $res = $this->db->query($sql);
	}

}
