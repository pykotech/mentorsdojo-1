<?php

class Nobita extends CI_Controller {
	


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	
	}

	
	public function index()
	{
		$this->_top();
		echo "Hi, Click on the top";
		echo "</body></html>";
	}
	

	//TODO
	public function profiles($type)
	{
		$col_list = "members.user_type, member_profiles.fullname, member_profiles.expertise";
		if($type=='all') {
		$q = "SELECT ".$col_list." FROM members LEFT JOIN member_profiles ON members.id = member_profiles.mem_id ";
		 }
		elseif($type=='mentees') {
		
		}
		elseif($type=='mentors') {

		}
		else {
		echo "Hello world!"; 
		exit;
		}	

		$query = $this->db->query($q);	
		echo "<table>";
		echo "<tr><td>Fullname</td><td>Type</td><td>Expertise</td></tr>";
		foreach($query->result() as $row)
		{
			if($row->user_type == 1)
			{
				$type = 'Mentee';
			}
			else
			{
				$type = 'Mentor';
			}
			echo "<tr><td>" .$row->fullname. "</td><td>".$type . "</td><td>" .$row->expertise ."</td><td><a href=\"\">Edit</a></td></tr>";
		}
		echo "</table>";
		
	}

	/*
		
	*/
	public function profile($id) {
		$this->load->model('profiles_model');	
		$pmodel = $this->profiles_model->profile($id);
		print_r($pmodel);
		
		$this->load->view('admin/profile_edit',$pmodel); 	
	}
}


?>
