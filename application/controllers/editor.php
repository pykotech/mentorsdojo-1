<?php

class Editor extends CI_Controller {
	

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	//use ajax to updatethe fields 

public function is_admin() 
{
		$admins = array("glennsantos","imjohnlouie");
		$loggeduser = $this->session->userdata('userid');
		if(!in_array($loggeduser,$admins)) 
		{ 
			header('HTTP/1.0 404 Not Found');
			exit;
		}
}

public function update_profile() 
{
	//$data to contain array of fields to update 
	//	stuff
	if(!$this->input->post('username')) {

		echo "no username?";
		exit;

	}
	
	
	$id = $this->input->post('mid');
 	$username = $this->input->post('username');
	$fullname = $this->input->post('fullname');
	$about = $this->input->post('aboutme');
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$password_retype = $this->input->post('password_retype');
	$expertise = $this->input->post('expertise');//comma delimited ( eh de show then use which ones were ticked
	if(!$expertise) {
		$expertise = '';
	}
	else {
		$expertise = implode(',',$expertise);
	}


	$industries =  $this->input->post('industries'); //this can be multiple
	//view should have known if mentor or mentee, then appropriate need help in and providing help in shows , while other as hidde
	//figure out checkbox array
	$linkedin = $this->input->post('linkedin');
	//kung hindi, wala, otherwise meron.. ganun lang

	$facebook = $this->input->post('facebook');
	$needhelp = $this->input->post('need_help');
	$providing = $this->input->post('providing');
	$twitter  = $this->input->post('twitter');
	$about = addslashes($about);
	$needhelp = addslashes($needhelp);
	$providing = addslashes($providing);

	$query = "UPDATE member_profiles SET
			fullname = '".$fullname."',
			about = '".$about."',
			expertise = '".$expertise."',
			industries = '".$industries."',
			linkedin = '".$linkedin."',
			facebook = '".$facebook."',
			twitter = '".$twitter."',
			need_help = '".$needhelp."',
			providing = '".$providing."' WHERE mem_id = ".$id."";
	//echo $query;
	$result =  $this->db->query($query);
	
	
	//open na open for improvements!!!
	if(isset($username) && !empty($username)) {
	  $query = "UPDATE members SET username = '".$username."' WHERE id = ".$id;
	  $result =  $this->db->query($query);
	}
	if(isset($password) && !empty($password)) {
	  $query = "UPDATE members SET password = '".md5(md5("mentorsdojo".$password))."' WHERE id = ".$id;
	  $result =  $this->db->query($query);
	}
	
	//$this->db->where('mem_id', $id);
	//$this->db->update('member_profiles',$data);

	echo "Profile is sucessfully updated.<br/><br/>";	
	$setEditAgain = site_url("editor/profile/$id");
	echo '<a href="'. $setEditAgain .'">Edit again</a>';
	}

	public function _top()
	{
		echo "<!doctype html>";
		echo "<html>";
		echo "<link rel=\"stylesheet\" href=\"".base_url()."css/style.css\">";
		echo "<style>";
		echo "#nav ul li { list-style:none; }  ";
		echo "</style>";
		echo "<body>";
		
		echo "<div id=\"nav\">";
		echo "<ul class=\"admintop\">";
		echo "</ul></div>";
	}

	
	public function index()
	{
	}


public function profile($id) 
{
		//check if this user is the owner of this profile
		
		$this->load->model('profiles_model');	
		$pdata = $this->profiles_model->profile($id);
		
		if(!($pdata['profiles']['username'] == $this->session->userdata('userid')))
		{
			//baka naman admin
			$this->is_admin();
		}
		
		//print_r($pdata);
		$q = "SELECT expertise FROM member_expertise WHERE active = 1";
		$result = $this->db->query($q);
		foreach($result->result_array() as $row)
		{
			$expertiseList[] =  $row['expertise'];
		}

		//print_r($pdata);
		//Array ( [profiles] => Array ( [mem_id] => 21 [username] => artilano [fullname] => Art Ilano [abt] => [email] => artilano@gmail.com 
		//[gravatar] => http://www.gravatar.com/avatar/58744f85b0c4bca0b622a71072cd734e [expertise] => [industries] => Consumer goods, services, research, technology [linkedin] => [facebook] => [need_help] => [providing] => test [usertype] => 2 [location] => [schedule] => ) )
		$pdata['data']['expertiseList'] = $expertiseList;
		$this->load->view('admin/profile_edit',$pdata); 	
	}
}

/*
Created by MentorsDojo Team 
Developers: Ben Sarmiento <benadriansarmiento@gmail.com>, Jose Palala <deterium73@gmail.com>
Designer: Louie Binas
Founder: Glenn Santos
Last modified: 05-13-2012
*/
