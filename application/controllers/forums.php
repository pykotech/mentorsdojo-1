<?php

class Forums extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url','form');
	}

	public function index() {
		//order_by('created','desc')->limit
		
		
		$this->db->join('members', 'members.id = mesa_posts.member_id');
		//->join('mesa_replies', 'mesa_replies.post_id = mesa_posts.id');
		$this->db->limit(15,0);
		$this->db->select('mesa_posts.post, mesa_posts.member_id, mesa_posts.id, mesa_posts.replies,mesa_posts.created,members.username');
		$q1 = $this->db->get("mesa_posts");

		if($q1->num_rows > 0) {
			foreach ($q1->result() as $row)
			{

			    $result['row'][] = array('author' => $row->username,
			    	'id' => $row->id,
			    	 'post' => $row->post,
			    	  'posted' =>$row->created,
			    	  'num_replies'=> $row->replies);
			    
			}

		} else {
			$result['row'][] =array('id' =>0,
				'post' => 'This is a dummy test. No posts found' , 
				'num_replies' => '0',
				'posted' =>  '0000-00-00 00:00:00',
				'author'=>'author test');	
			//		var_dump($data->result());
		}

		$this->load->library('pagination');
	
		$url = base_url();

		$config['base_url'] = $url . 'index.php/forums/page/';


		$config['total_rows'] = $this->db->count_all_results('mesa_posts');

		//$this->db->count_all_results()
		//echo "ump: " . var_dump($config['total_rows']);
		
		$config['per_page'] = 10; 	

		$this->pagination->initialize($config); 
		
		$result['page'] = $this->pagination->create_links();

		//display
		$data['forum_page'] = ' Welcome ';
		$this->load->view('forums/header',$data);
		$this->load->view('forums/front',$result);
		
	}



	public function page($page_limit = 0) {
		$config['per_page'] = $perpage = 10;

		if($page_limit <= $perpage) {
			
			$offset = $page_limit;
			$num_limit = (int) ($page_limit + $perpage);
		} else {
			$num_limit = (int) ($page_limit + $perpage);
			$offset = $config['per_page'];
		}
		
		//$roffset = $page_limit * 20;
		//echo 'this->db->get("mesa_posts",'.$offset. ', '. $num_limit. ')';
		$this->db->select('mesa_posts.post, mesa_posts.id,mesa_posts.replies,members.username,mesa_posts.created');
		$this->db->join('members', 'members.id = mesa_posts.member_id');
		//->join('mesa_replies', 'mesa_replies.post_id = mesa_posts.id');
		$query = $this->db->get("mesa_posts",$num_limit,$offset);


		//FInd rows
		//echo 'Result Rows' . $query->num_rows() ;

		if(($query->num_rows())) {
			foreach ($query->result() as $row)
			{

			    $result['row'][] = array('author' => $row->username,
			    	'id' => $row->id,
			    	 'post' => $row->post,
			    	  'posted' =>$row->created,
			    	  'num_replies'=> $row->replies);
			    
			}

			
		
		} else {
			$result['row'][] =array('id' =>0,'posted' =>  '0000-00-00 00:00:00','author'=>'author test'); //,  "error error error <pre>". 	var_dump($query);
		}
		
	
		$url = base_url() . 'index.php/';
		$config['base_url'] = $url . 'forums/page/';
		
		$config['total_rows'] = $this->db->count_all_results('mesa_posts');
		
		
		 

		$this->pagination->initialize($config); 

		echo "<hr>";
		

		$result['page'] = $this->pagination->create_links();
		if($page_limit <= 20) {
			$data['forum_page'] = 'Page 1'; } 
		else {
			$data['forum_page'] = 'Page ' . floor( $page_limit % $config['per_page']); 
		}
			
		$this->load->view('forums/header',$data );
		
		$this->load->view('forums/front',$result);
	}




	public function replies($post_id) {
		
		$dbCriteria = $this->db->select('mesa_replies.post_id, mesa_replies.reply, mesa_replies.id, members.username, mesa_posts.post , mesa_posts.created')
			->join('members', 'members.id = mesa_replies.member_id')
			->join('mesa_posts', 'mesa_posts.id = mesa_replies.post_id')
			->get("mesa_replies");

		if(($dbCriteria->num_rows())) {
			foreach ($dbCriteria->result() as $row)
			{

			    $result['row'][] = array('author' => $row->username,
			    	'id' => $row->id,
			    	 'reply' => $row->reply,
			    	  'posted' =>$row->created);
			    
			}
		
		} else {
			$result['row'][] =array('id' =>0,'post'=>'no replies','posted' =>  '0000-00-00 00:00:00','author'=>'author test'); //,  "error error error <pre>". 	var_dump($query);
		}
		
		$this->load->view('forums/replies',$result);
	}

}