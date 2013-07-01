<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles_Model extends CI_Model 
{

	

		public function grava($email) {
			$this->load->library('gravatar');
			return $this->gravatar->get_gravatar($email);
		}
		
		public function profile($id)
		{
		
			$q = "SELECT member_profiles.mem_id,
			members.username,
			members.fullname, 
			members.email,
			members.user_type,
			member_profiles.about, 
			member_profiles.expertise,
			member_profiles.industries,
			member_profiles.linkedin, 
			member_profiles.facebook, 
			member_profiles.twitter, 
			
			member_profiles.need_help,
			member_profiles.providing,
			member_details.location,
			member_details.schedule ";
			
			$q .= "FROM  member_profiles INNER JOIN members ON member_profiles.mem_id =  members.id"; 
			$q .= " LEFT JOIN member_details ON member_details.mem_id = member_profiles.mem_id";
			$q .= " WHERE members.id = '" . $id."' ";
			$query = $this->db->query($q);
			
			foreach($query->result() as $row) 
			{
				$mem_id = $row->mem_id;
				$data['profiles']['mem_id'] = $row->mem_id;
				$data['profiles']['username'] = $row->username;
				$data['profiles']['fullname'] = $row->fullname;
				$data['profiles']['abt'] =  $row->about;
				$data['profiles']['email'] =  $row->email;
				$data['profiles']['gravatar'] =  $this->grava($row->email);

				/**
				$q1 = "SELECT expertise FROM member_expertise WHERE active = 1";
				$query1 = $this->db->query($q1);
				$expertise = $row->expertise;
				foreach($query1->result() as $row1)
				{
					str_replace($row->expertise, "black", "<body text='%body%'>");
				}
				**/

				$data['profiles']['expertise'] =  $row->expertise;
				$data['profiles']['industries'] = $row->industries;
				$data['profiles']['linkedin'] =  $row->linkedin;
				$data['profiles']['twitter'] =  $row->twitter;
				$data['profiles']['facebook'] =  $fb = $row->facebook;
				$data['profiles']['need_help'] = $row->need_help;
				$data['profiles']['providing']  = $row->providing;
				$data['profiles']['usertype']  = $row->user_type;
				$data['profiles']['location'] = $row->location;
				$data['profiles']['schedule'] = $row->schedule;

				// = array($fullname,$abt,$expert,$indus,$linkd,$fb,$need_help,$providing);
			}
			
			return $data;
		}

		public function profile_v2($username)
		{
		
			$q = "SELECT member_profiles.mem_id,
			members.username,
			members.fullname, 
			members.email,
			members.user_type,
			member_profiles.about, 
			member_profiles.expertise,
			member_profiles.industries,
			member_profiles.linkedin, 
			member_profiles.facebook, 
			member_profiles.twitter, 
			
			member_profiles.need_help,
			member_profiles.providing,
			member_details.location,
			member_details.schedule ";
			
			$q .= "FROM  member_profiles INNER JOIN members ON member_profiles.mem_id =  members.id"; 
			$q .= " LEFT JOIN member_details ON member_details.mem_id = member_profiles.mem_id";
			$q .= " WHERE members.username = '" . $username."'";
			$query = $this->db->query($q);
			
			foreach($query->result() as $row) 
			{
				$mem_id = $row->mem_id;
				$data['profiles']['mem_id'] = $row->mem_id;
				$data['profiles']['username'] = $row->username;
				$data['profiles']['fullname'] = $row->fullname;
				$data['profiles']['abt'] =  $row->about;
				$data['profiles']['email'] =  $row->email;
				$data['profiles']['gravatar'] =  $this->grava($row->email);

				/**
				$q1 = "SELECT expertise FROM member_expertise WHERE active = 1";
				$query1 = $this->db->query($q1);
				$expertise = $row->expertise;
				foreach($query1->result() as $row1)
				{
					str_replace($row->expertise, "black", "<body text='%body%'>");
				}
				**/

				$data['profiles']['expertise'] =  $row->expertise;
				$data['profiles']['industries'] = $row->industries;
				$data['profiles']['linkedin'] =  $row->linkedin;
				$data['profiles']['twitter'] =  $row->twitter;
				$data['profiles']['facebook'] =  $fb = $row->facebook;
				$data['profiles']['need_help'] = $row->need_help;
				$data['profiles']['providing']  = $row->providing;
				$data['profiles']['usertype']  = $row->user_type;
				$data['profiles']['location'] = $row->location;
				$data['profiles']['schedule'] = $row->schedule;
				
				// = array($fullname,$abt,$expert,$indus,$linkd,$fb,$need_help,$providing);
			}
			
			return $data;
		}
		
		public function profilepage($memtype)
		{
		
			$q = "SELECT member_profiles.`mem_id`,
			members.`fullname`, 
			members.email, 
			member_profiles.about, 
			member_profiles.expertise,
			member_profiles.industries,
			member_profiles.linkedin, 
			member_profiles.facebook,
			member_profiles.twitter, 
			member_profiles.need_help,
			member_profiles.providing ";
			
			$q .= "FROM  member_profiles LEFT JOIN members ON member_profiles.mem_id =  members.id WHERE members.user_type = ".$memtype; // WHERE mem_id = '" . $mem_id."'";
			$query = $this->db->query($q);
			
			foreach($query->result() as $row) 
			{
				$i = $row->mem_id;
				$data['profiles'][$i]['mem_id'] = $row->mem_id;
				$data['profiles'][$i]['fullname'] = $row->fullname;
				$data['profiles'][$i]['abt'] =  $row->about;
				$data['profiles'][$i]['email'] =  $row->email;
				$data['profiles'][$i]['gravatar'] =  $this->grava($row->email);
				$data['profiles'][$i]['expertise'] =  $row->expertise;
				$data['profiles'][$i]['industries'] = $row->industries;
				$data['profiles'][$i]['linkedin'] =  $row->linkedin;
				$data['profiles'][$i]['facebook'] =  $fb = $row->facebook;
				$data['profiles'][$i]['linkedintwitter'] =  $row->twitter;
				
				$data['profiles'][$i]['need_help'] = $row->need_help;
				$data['profiles'][$i]['providing']  = $row->providing;
				
				// = array($fullname,$abt,$expert,$indus,$linkd,$fb,$need_help,$providing);
			}
			
			return $data;
		}
		
		
}
