<?php


class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	
	public function mentee()
	{
		//echo '<pre>' . print_r($this->input->post(NULL, TRUE)) . '</pre>';
		//register the mentee using the model
		$this->load->model('mentees_model');
		$values = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter 
		
		//check if mentee's username  has registered before
		$check = $this->mentees_model->check($this->input->post('username'));
		if($check  == true || $check == 1) 
		{
		   
			echo "Cannot use this username!";
			echo $check;
			exit;
			
		}
		
		$result = $this->mentees_model->register($values);
		
		//load the view
	
		
		$this->load->view('reg/template_header');
		
		if($result != false) {
			
			
			$data_html = '<div id="container">' .
					'Thank You! You have been registered <br /> 
					Check out the <a href="'.site_url('profiles').'">mentors list</a></div>';
			
			$data['htmlmsg'] = $data_html;
			 
			$this->load->view('reg/menteesuccess',$data)
			//redirect('welcome');
			} 	else 
			{
			echo $result; //echo "Nope not registered, problems with database";
			}
	
		//</body></html>";
	}
	
	public function mentor()
	{
		
		
		//register the mentor using the model
		$this->load->model('mentors_model');
		$values = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter 
	
		$check = $this->mentors_model->check($this->input->post('username'));
		if($check  == true || $check == 1) 
		{
			//uses "Checked!" meaning it does have one row
			
			echo "Cannot use this username!";
			exit;
		}
		
		$result = $this->mentors_model->register($values);
		
		//load the view
	
			$this->load->view('reg/template_header');
		
		if($result != false) {
			
			
			$data_html = '<div id="container">' .
					'Thank You! You have been registered <br /> 
					Check out the <a href="'.site_url('profiles').'">mentors list</a></div>';
			
			$data['htmlmsg'] = $data_html;
			 
			$this->load->view('reg/mentorsuccess',$data)
		
			} 	else {
				echo "We are sorry, there has been an error";
				echo $result; 
				//show any messages/ false statements 
				//or database errors
			}	
	}
}
?>
