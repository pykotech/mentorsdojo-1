<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentors_Model extends CI_Model {
	var $users_table = 'users';
	var $userprofiles_table = 'user_profiles';
	var  $salt = 'mentorsdojo';

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

	
	
	
	public function check($username)
	{
				$sql = "SELECT username FROM members  WHERE username = '".trim($username)."'";
		//take note: double md5 (md5 with salt)
	
		$res = $this->db->query($sql);
		
		if($res->num_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
		
	}
	
	
	public function register($values)
	{
		
		//put the values into $stuff. 
		$mentorname = addslashes($this->input->post('mentee_name'));
		
		$email = addslashes($this->input->post('email')); 
		
		$aboutme = $about = addslashes($this->input->post('aboutme'));
		
		$linkedin =addslashes( $this->input->post('linkedin'));
		
		$facebook = addslashes( $this->input->post('facebook'));
		
		$expertise = addslashes($this->input->post('expertise'));
		
		$industries = addslashes($this->input->post('industries'));

		$startup_idea = addslashes($this->input->post('startup_idea'));
		
		$startup_description = addslashes($this->input->post('startup_description')); 

		$providing = addslashes($this->input->post('providing'));
	
		
		$username = addslashes($this->input->post('username'));
		
		$password = trim(addslashes($this->input->post('password')));  
		
		$password_check = trim(addslashes($this->input->post('password_retype'))); 
		
		//check if password is same as password check 
		if($password !== $password_check) 
		{ 
			
			$msg =  "Password is not the same as the password check";
			return $msg;
		}
		
		
		$salt = 'mentorsdojo';
		$pwd = $password;
		$password = md5($salt . $pwd);
		
		$type="2"; //mentee = type 1
		
		//username/password details SQL
		$sql = "INSERT INTO members(id,fullname,username,password,email,user_type) VALUES (";
		//take note: double md5 (md5 with salt)
		$sql .= "NULL, '".$mentorname."', '".$username."','".md5($password)."','".$email."','".$type."')"; 
	
		$res = $this->db->query($sql);
		$mem_id = $this->db->insert_id();
		if(!$mem_id) {
			
			$msg = 'Failed to get last insert id';
			return $msg;
			
		} else {	
				
				
				$sql = "INSERT INTO  member_profiles(mem_id,fullname,
				about,
				industries,
				linkedin,
				facebook,	
				need_help,
				providing)	VALUES ('".$mem_id ."','".$mentorname."','".$about."','".$industries."','".$linkedin."','".$facebook."','','".$providing."')";
				
				 $res = $this->db->query($sql);
			 
			 
				if($res)
				{
					
						//member settings
						$show_email = $this->input->post('show_email');
						if(!$show_email) { 
							$show = 0; 
						} else {
							$show = 1;
						}
						
						
						$q = "INSERT INTO member_settings( mem_id,show_email,notify,premium) VALUES('$mem_id','$show','1','0')";
					 
						$query = $this->db->query($q);
						
						if($query) { 
							return true;
						} else {
							return false;
						}
					}
					else
					{
						return false;
					}
					 
			}
		
	
	
	
	}
	
	
	
}
