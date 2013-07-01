<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messaging extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('profiles_model');
		
		if(!$this->session->userdata('username')) 
		{ 
			echo "error: user not logged in"; 
			exit;
		}
	}

	public function message()
	{
		//note this string is a hash md5(sha1);
		if($this->uri->segment(3)) { $from_user = $this->uri->segment(3); } else { show_error("You are non-existent"); }
		//this string is also a hash md5(sha1);
		if($this->uri->segment(4)) { $to_user = $this->uri->segment(4); } else { show_error("The user you are trying to talk to does not exist"); }
		$data = $this->profiles_model->profile_v2($to_user);
		$data['message_stat'] = false;
		if($_POST) {
			$message = addslashes($this->input->post('message'));
			$query = $this->db->query("INSERT INTO `messages` (`from`, `to`, `message`, `date`, `sent`) VALUES (".$this->db->escape($from_user).", ".$this->db->escape($to_user).", ".$this->db->escape($message).", now(), '');");
			if($this->db->insert_id() > 0) { $data['message_stat'] = true; }
		}

		$this->load->view('message_header');
		$this->load->view('message_form', $data);
	}

	public function _index()
	{
		echo "<a href=\"".site_url('messaging/message')."\">Messaging System</a>";
	}
}

	function mailsensei()
	{
	$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'sensei@mentorsdojo.com',
		    'smtp_pass' => 'senseisan',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		
		//note this string is a hash md5(sha1);
		if($this->uri->segment(3)) { $from_user = $this->uri->segment(3); } else { show_error("You are non-existent"); }
		//this string is also a hash md5(sha1);
		if($this->uri->segment(4)) { $to_user = $this->uri->segment(4); } else { show_error("The user you are trying to talk to does not exist"); }
		$data = $this->profiles_model->profile_v2($to_user);
		$data['message_stat'] = false;
		if($_POST) 
		{
			$message = addslashes($this->input->post('message'));
			$query = $this->db->query("INSERT INTO `messages` (`from`, `to`, `message`, `date`, `sent`) VALUES (".$this->db->escape($from_user).", ".$this->db->escape($to_user).", ".$this->db->escape($message).", now(), '');");
			if($this->db->insert_id() > 0) 
			{ 
			$data['message_stat'] = true; 
			}
		}

		
		if($this->uri->segment(3)) 
		{ 
		$id = $this->uri->segment(3); 
		} else { show_error("Message error"); 
		}
		$sql = "SELECT messages.to, messages.message, members.fullname, members.email FROM messages LEFT JOIN members ON messages.from = members.username WHERE messages.id=$id LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) 
		{
		  $row = $query->result();
		  $row = $data['message'] = $row[0];
		  $data['message_stat'] = 0;
		  if($_POST) 
		  {
			  if($this->send($id,$row->fullname,$row->email)) {
			    $data['message_stat'] = 1;
			} else {
  			  $data['message_stat'] = 2;
			}
		  }
		
		}
		
	 function send($id,$from_name,$from_email)
	{
	  //fetch recipient email
	  $sql = "SELECT members.email, messages.message FROM messages LEFT JOIN members ON messages.to = members.username WHERE messages.id=$id LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) 
		{
		  $row = $query->result();
		  $row = $row[0];
		  $this->email->from('sensei@mentorsdojo.com', 'Mentors Dojo');
		  
		//Caution: neither email should be an @mentorsdojo.com email
		  $this->email->to($row->email);
		  $this->email->reply_to($from_email, $from_name);
		  $this->email->cc('dojomentors@gmail.com');
		$this->email->bcc($from_email);
		  $this->email->subject('[Mentors Dojo] Message from '.$from_name);
		  $this->email->message($row->message);
		  $result = $this->email->send();
		  if($result) {
		    $this->db->query("UPDATE `messages` SET `sent` = '1' WHERE `id` = '$id' LIMIT 1");
		  }
		  return $result;
		} else {
		  return false;
		}
	}
}
?>