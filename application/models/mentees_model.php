<?php 
/********************************************
jpalala - added remove last ", " from expertises
*********************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mentees_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function check($username)
	{
		$sql = "SELECT username FROM members  WHERE username = '".trim($username)."'";
		//take note: double md5 (md5 with salt)
	
		$res = $this->db->query($sql);
		
		if($res->num_rows() > 0 ) {
			return true; //should not be true (be false) to pass.
		} else {
			return false;
		}
		
	}
	
	public function register( $values)
	{	
		
		//put the values into $stuff. 
		$menteename = addslashes($this->input->post('mentee_name'));
		
		$email = addslashes($this->input->post('email')); 
		
		$aboutme = $about = addslashes($this->input->post('aboutme'));
		
		$linkedin =addslashes( $this->input->post('linkedin'));
		
		$facebook = addslashes( $this->input->post('facebook'));
		
		//$expertise = addslashes($this->input->post('expertise'));
		$expertise1 = '';
		$expertise = $this->input->post('expertise');
		foreach ($expertise as $expfield) {
			$expertise1 .= addslashes($expfield.', ');
			
		}

		//removes ending comma space from above
		if(substr($expertise1, -2) == ', ') {
			$expertise1 = substr($expertise1,0,-2);	
		}
		
		$industries = addslashes($this->input->post('industries'));

		$startup_idea = addslashes($this->input->post('startup_idea'));
		
		$startup_description = addslashes($this->input->post('startup_description')); 

		$needhelp = addslashes($this->input->post('help'));
	
		
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
		
		$type="1"; //mentee = type 1
		
		//username/password details SQL insert
		$sql = "INSERT INTO members(id,fullname,username,password,email,user_type) VALUES (";
		
		//take note: double md5 (md5 with salt)
		$sql .= "NULL, '".$menteename."', '".$username."','".md5($password)."','".$email."','" . $type. "')"; 
		
		//SQL debug
		//echo '<pre>' .$sql . '</pre>';
		
		$res = $this->db->query($sql);
		$mem_id = $this->db->insert_id();
		if(!$mem_id) {
			
			$msg = 'Failed to get last insert id';
			return $msg;
			
		} else {	
			$mem_id = $this->db->insert_id();
			$sql = "INSERT INTO  member_profiles(mem_id,fullname,
			about,
			expertise,
			industries,
			linkedin,
			facebook,	
			need_help,
			providing)	VALUES ('".$mem_id ."','";
			$sql .= $menteename."','".$about."','".$expertise1."','".$industries."','".$linkedin."','".$facebook."','".$needhelp."','')";
			
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
					} else
						{
							$msg = 'Failed to create member settings data';
							return $msg;
						}
				
			}
			else
			{
				$msg = 'Failed to create member profile data';
				return $msg;
			}
		}
		
	
	}
}/*
end model:)
*/
