<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messaging_Model extends CI_Model 
{
		
		public function profile($id)
		{
		
			$q = "SELECT member_profiles.`mem_id`,
			members.username,
			members.`fullname`, 
			members.email,
			member_profiles.about, 
			member_profiles.expertise,
			member_profiles.industries,
			member_profiles.linkedin, 
			member_profiles.facebook, 
			member_profiles.need_help,
			member_profiles.providing ";
			
			$q .= "FROM  member_profiles LEFT JOIN members ON member_profiles.mem_id =  members.id"; 
			$q .= " WHERE mem_id = '" . $id."'";
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
				$data['profiles']['facebook'] =  $fb = $row->facebook;
				$data['profiles']['need_help'] = $row->need_help;
				$data['profiles']['providing']  = $row->providing;
				
				// = array($fullname,$abt,$expert,$indus,$linkd,$fb,$need_help,$providing);
			}
			
			return $data;
		}
}
