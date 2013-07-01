<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {
	var $users_table = 'members';
	var $userprofiles_table = 'member_profiles';
	var  $padding = 'added20120421saltkey';

	function check_if_user_exists($username,$email){
		
			//$type = developer? designer? marketing? public relations? finance? founder?
		$sql = "SELECT * FROM " .$this->users_table . " WHERE username = '".$username."' OR email = '".$email."'";
		
		 //type = anything to describe yourself (investor or what not)
		//about - if you want to talk moase about your self

		$res =	$this->db->query($sql);
		if($res->num_rows() > 0 ) {
			return true; //true there is a user
		} 	else {
			return false; //here it means you can create
		}
	}
	public function getuser($hash)
	{
		$query = $this->db->query("SELECT username FROM ".$this->users_table." WHERE MD5(SHA1(username)) = '".$hash."'");
		
		if($query->num_rows() == 0) 
		{
			return false;
		} 	
		else
		{
			foreach($query->result() as $rows)
			{
				return $rows->username;
			}
		}
		
	}
	function logged_in()
	{
		$this->load->library('session');
		$uname = $this->session->userdata('username');
		$res = $this->db->query("SELECT * FROM " . $this->users_table ." WHERE MD5(SHA1(username)) = '".$uname."'");
		
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
		public function auth($username,$password)
		{
			$salt = 'mentorsdojo';
			$p = md5(md5($salt . $password));
			$q = "SELECT * FROM members WHERE username = '".$username."'";
			$q .= " AND password = '". $p. "'";
			$query = $this->db->query($q);

			//crete session
			if($query->num_rows() > 0) {
				
				$this->session->set_userdata(array('username' => md5(sha1($username))));
				return true;
			} else {
				return false;
			}
		}
		
		public function profile($mem_id)
		{
		
			$q = "SELECT * FROM  members_profiles WHERE mem_id = '" . $mem_id."'";
			$query = $this->db->query($q);
			
			foreach($query->result() as $row) 
			{
				$fullname = $row->fullname;
				$abt = $row->about;
				$expert = $row->expertise;
				$indus = $row->industries;
				$linkd = $row->linkedin;
				$fb = $this->facebook;
				$need_help = $row->need_help;
				$providing  = $row->providing;
			}
			
			$model_data = array(
				'fullname' => $fullname,
				'about' => $abt,
				'exp' => $expert,
				'ind' => $indus,
				'linked' => $linkd,
				'facebook' => $fb,
				'need' => $need_help,
				'prov' => $providing
			);
			return $model_data;
		}
}
