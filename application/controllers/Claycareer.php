<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claycareer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct(){
		
		parent::__construct();
		
		//model name & nickname
		$this->load->model('claycareer_model','claycareerdb');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('pagination');  
		$this->load->helper('download');
		//per page limit
        $this->perPage = 4;
	}
	
	public function index()
	{
		//SET SESSION
		$newdata = array(
			'username'  => "default",
			'logged_in' => FALSE,
			'news_filter' => "all"
		);
		$this->session->set_userdata($newdata);
		$this->load->view('include/header');
		$this->load->view('client/landing');
		$this->load->view('include/footer');
	}
	
	public function signup()
	{
		$this->load->view('include/header_forms');
		$this->load->view('client/signup');
		$this->load->view('include/footer');
	}
	
	public function login()
	{
		$this->load->view('include/header_forms');
		$this->load->view('client/login');
		$this->load->view('include/footer');
	}
	
	public function logout()
	{
		//SET SESSION
		$newdata = array(
			'username'  => "default",
			'logged_in' => FALSE,
			'news_filter' => "all"
		);
		$this->session->set_userdata($newdata);
		$this->load->view('include/header_forms');
		$this->load->view('client/landing');
		$this->load->view('include/footer');
	}
	
	public function validatelogin()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//RULES
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		//MESSAGES
		$this->form_validation->set_message('required', 'The %s field is required.');
		
		
		if($this->form_validation->run() == FALSE){
			
			//FORM NOT VALID
			$this->load->view('include/header_forms');
			$this->load->view('claycareer/login');
			$this->load->view('include/footer');
		}
		else{
			//GET INPUT
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			
			//CHECK DATABASE
			$result = $this->claycareerdb->login($data);
		
			
			if($result != 'false'){
				//CORRECT CREDENTIALS
				
				//SET SESSION
				$newdata = array(
				   'username'  => $result[0]['username'],//$this->input->post('email'),
				   'logged_in' => TRUE,
					'news_filter' => "all"
				);
				$this->session->set_userdata($newdata);
				
				$this->home();
			}
			else{
				//MATCH NOT FOUND
				$data['wronginput'] = 1;
			
				$this->load->view('include/header_forms', $data);
				$this->load->view('claycareer/login', $data);
				$this->load->view('include/footer', $data);
			}
		}
	}
	
	public function validatesignup()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//RULES
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'password', 'required|matches[confirmpassword]');
		$this->form_validation->set_rules('confirmpassword', 'password confirmation', 'required');
		
		
		//MESSAGES
		$this->form_validation->set_message('is_unique', 'This %s is already taken.');
		$this->form_validation->set_message('required', 'The %s field is required.');
		$this->form_validation->set_message('matches', 'Your %s does not match.');
		
		if ($this->form_validation->run() == FALSE)
		{
			//FORM NOT VALID
			$data['title']="Sign Up";
			
			$this->load->view('include/header_forms', $data);
			$this->load->view('include/footer', $data);
			$this->load->view('claycareer/signup', $data);
		}
		else
		{	
			//MAKE USER ID
			$table = "user";
			$id = $this->claycareerdb->totalusers($table);
			$id = $id+1;
			
			//INSERT DATA TO TABLE
			$data = array(
				'user_id' => $id,
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			
			$table = "user";
			
			$this->claycareerdb->signup($data, $table);
			
			//SET SESSION
			$newdata = array(
			   'username'  => $this->input->post('username'),
               'logged_in' => TRUE,
				'news_filter' => "all"
			);
			$this->session->set_userdata($newdata);
			
			$this->home();
		}
	}
	
	public function home()
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			//Get the data for Carousel Picture Display
			$result = $this->claycareerdb->getcarousel("carousel");
			
			foreach($result as $r){
				
				$car = $this->claycareerdb->getcarouselnews("news",$r['news_id']);
				$info = array('news_id' => $car[0]['news_id'],
						      'news_pic' => $car[0]['news_pic']);
				$car_details[] = $info;
			}
			$data['carousel'] = $car_details;
			
			
			//Get the data for Trending Topics
			$result = $this->claycareerdb->gettrending("trending");
			
			foreach($result as $r){
				$tre = $this->claycareerdb->gettrendingtopics("forums",$r['forum_id']);
				$info = array('forum_id' => $tre[0]['forum_id'],
							  'forum_title' => $tre[0]['forum_title'],
							  'forum_description' => $tre[0]['forum_description']
							 );
				$forum_details[] = $info;
			}
			$data['trending'] = $forum_details;
			
			//Get the data for Featured News
			$result = $this->claycareerdb->getfeatured("featured");
			
			foreach($result as $r){
				$fea = $this->claycareerdb->getfeaturednews("news",$r['news_id']);
				$info = array('news_id' => $fea[0]['news_id'],
							  'news_title' => $fea[0]['news_title'],
							  'news_description' => $fea[0]['news_subheading'],
							  'news_pic' => $fea[0]['news_pic']
							 );
				$news_details[] = $info;
			}
			$data['featured'] = $news_details;
			
			//Load the proper view.
			$this->load->view('include/header',$data);
			$this->load->view('client/home',$data);
			$this->load->view('include/footer',$data);
		}
	}
	
	public function news()
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			if(isset($_POST['search']))
			{
				$config['base_url'] = base_url().'claycareer/news';        
				$config['total_rows'] = $this->claycareerdb->count_all_users_search($_POST['search']);        
				$config['per_page'] = 3;        
				$config['uri_segment'] = 3;        
				$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
				$config['full_tag_close'] = '</ul>';        
				$config['first_link'] = 'First';        
				$config['last_link'] = 'Last';        
				$config['first_tag_open'] = '<li class="page-item">';        
				$config['first_tag_close'] = '</li>';        
				$config['prev_link'] = '&laquo';        
				$config['prev_tag_open'] = '<li class="page-item">';        
				$config['prev_tag_close'] = '</li>';        
				$config['next_link'] = '&raquo';        
				$config['next_tag_open'] = '<li class="page-item">';        
				$config['next_tag_close'] = '</li>';        
				$config['last_tag_open'] = '<li class="page-item">';        
				$config['last_tag_close'] = '</li>';        
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
				$config['cur_tag_close'] = '</a></li>';        
				$config['num_tag_open'] = '<li class="page-item">';        
				$config['num_tag_close'] = '</li>';

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$this->pagination->initialize($config);        
				$data['links'] = $this->pagination->create_links();        
				$data['users'] = $this->claycareerdb->get_users_search($config["per_page"], $page, $_POST['search']);

				//Load the proper view.
				$this->load->view('include/header',$data);
				$this->load->view('client/news',$data);
				$this->load->view('include/footer',$data);	
			}
			else
			{
				$config['base_url'] = base_url().'claycareer/news';        
				$config['total_rows'] = $this->claycareerdb->count_all_users($this->session->userdata('news_filter'));        
				$config['per_page'] = 3;        
				$config['uri_segment'] = 3;        
				$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
				$config['full_tag_close'] = '</ul>';        
				$config['first_link'] = 'First';        
				$config['last_link'] = 'Last';        
				$config['first_tag_open'] = '<li class="page-item">';        
				$config['first_tag_close'] = '</li>';        
				$config['prev_link'] = '&laquo';        
				$config['prev_tag_open'] = '<li class="page-item">';        
				$config['prev_tag_close'] = '</li>';        
				$config['next_link'] = '&raquo';        
				$config['next_tag_open'] = '<li class="page-item">';        
				$config['next_tag_close'] = '</li>';        
				$config['last_tag_open'] = '<li class="page-item">';        
				$config['last_tag_close'] = '</li>';        
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
				$config['cur_tag_close'] = '</a></li>';        
				$config['num_tag_open'] = '<li class="page-item">';        
				$config['num_tag_close'] = '</li>';

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$this->pagination->initialize($config);        
				$data['links'] = $this->pagination->create_links();        
				$data['users'] = $this->claycareerdb->get_users($config["per_page"], $page, $this->session->userdata('news_filter'));

				//Load the proper view.
				$this->load->view('include/header',$data);
				$this->load->view('client/news',$data);
				$this->load->view('include/footer',$data);
			}
		}
	}
	
	public function filternews($type)
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			//SET SESSION
			$newdata = array(
			   'username'  => $this->session->userdata('username'),
               'logged_in' => $this->session->userdata('logged_in'),
			   'news_filter' => $type
			);
			$this->session->set_userdata($newdata);
			
			$this->news();
		}
	}
	
	public function article($id)
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			$data['article'] = $this->claycareerdb->getarticle($id);
			
			$this->load->view('include/header',$data);
			$this->load->view('client/article',$data);
			$this->load->view('include/footer',$data);
			
		}
	}
	
	public function forums()
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			if(isset($_POST['search']))
			{
				$config['base_url'] = base_url().'claycareer/forums';        
				$config['total_rows'] = $this->claycareerdb->count_all_forums_search($_POST['search']);        
				$config['per_page'] = 6;        
				$config['uri_segment'] = 3;        
				$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
				$config['full_tag_close'] = '</ul>';        
				$config['first_link'] = 'First';        
				$config['last_link'] = 'Last';        
				$config['first_tag_open'] = '<li class="page-item">';        
				$config['first_tag_close'] = '</li>';        
				$config['prev_link'] = '&laquo';        
				$config['prev_tag_open'] = '<li class="page-item">';        
				$config['prev_tag_close'] = '</li>';        
				$config['next_link'] = '&raquo';        
				$config['next_tag_open'] = '<li class="page-item">';        
				$config['next_tag_close'] = '</li>';        
				$config['last_tag_open'] = '<li class="page-item">';        
				$config['last_tag_close'] = '</li>';        
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
				$config['cur_tag_close'] = '</a></li>';        
				$config['num_tag_open'] = '<li class="page-item">';        
				$config['num_tag_close'] = '</li>';

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$this->pagination->initialize($config);        
				$data['links'] = $this->pagination->create_links();        
				$data['users'] = $this->claycareerdb->get_forums_search($config["per_page"], $page, $_POST['search']);
				$data['nosearch']=FALSE;

				//Load the proper view.
				$this->load->view('include/header',$data);
				$this->load->view('client/forums',$data);
				$this->load->view('include/footer',$data);	
			}
			else
			{
				$config['base_url'] = base_url().'claycareer/forums';        
				$config['total_rows'] = $this->claycareerdb->count_all_forums();        
				$config['per_page'] = 6;        
				$config['uri_segment'] = 3;        
				$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
				$config['full_tag_close'] = '</ul>';        
				$config['first_link'] = 'First';        
				$config['last_link'] = 'Last';        
				$config['first_tag_open'] = '<li class="page-item">';        
				$config['first_tag_close'] = '</li>';        
				$config['prev_link'] = '&laquo';        
				$config['prev_tag_open'] = '<li class="page-item">';        
				$config['prev_tag_close'] = '</li>';        
				$config['next_link'] = '&raquo';        
				$config['next_tag_open'] = '<li class="page-item">';        
				$config['next_tag_close'] = '</li>';        
				$config['last_tag_open'] = '<li class="page-item">';        
				$config['last_tag_close'] = '</li>';        
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
				$config['cur_tag_close'] = '</a></li>';        
				$config['num_tag_open'] = '<li class="page-item">';        
				$config['num_tag_close'] = '</li>';

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$this->pagination->initialize($config);        
				$data['links'] = $this->pagination->create_links();        
				$data['users'] = $this->claycareerdb->get_forums($config["per_page"], $page);
				
				//Load the proper view.
				$this->load->view('include/header',$data);
				$this->load->view('client/forums',$data);
				$this->load->view('include/footer',$data);
			}
		}
	}
	
	public function topic($id)
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			$data['topic'] = $this->claycareerdb->gettopic($id);
			//Get the data for Featured News
			$result = $this->claycareerdb->getcomments($id);
			
			foreach($result as $r){
				$pro = $this->claycareerdb->getprofile($r['user_id']);
				$info = array('username' => $pro[0]['username'],
							  'user_pic' => $pro[0]['user_pic'],
							  'comment' => $r['comment'],
							  'comment_date' => $r['comment_date']
							 );
				$com_details[] = $info;
			}
			$data['comments'] = $com_details;
			
			$this->load->view('include/header',$data);
			$this->load->view('client/topic',$data);
			$this->load->view('include/footer',$data);
		}
	}
	
	public function career()
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			if(isset($_POST['search']))
			{
				$config['base_url'] = base_url().'claycareer/career';        
				$config['total_rows'] = $this->claycareerdb->count_all_course_search($_POST['search']);        
				$config['per_page'] = 3;        
				$config['uri_segment'] = 3;        
				$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
				$config['full_tag_close'] = '</ul>';        
				$config['first_link'] = 'First';        
				$config['last_link'] = 'Last';        
				$config['first_tag_open'] = '<li class="page-item">';        
				$config['first_tag_close'] = '</li>';        
				$config['prev_link'] = '&laquo';        
				$config['prev_tag_open'] = '<li class="page-item">';        
				$config['prev_tag_close'] = '</li>';        
				$config['next_link'] = '&raquo';        
				$config['next_tag_open'] = '<li class="page-item">';        
				$config['next_tag_close'] = '</li>';        
				$config['last_tag_open'] = '<li class="page-item">';        
				$config['last_tag_close'] = '</li>';        
				$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
				$config['cur_tag_close'] = '</a></li>';        
				$config['num_tag_open'] = '<li class="page-item">';        
				$config['num_tag_close'] = '</li>';

				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$this->pagination->initialize($config);        
				$data['links'] = $this->pagination->create_links();        
				$data['users'] = $this->claycareerdb->get_course_search($config["per_page"], $page, $_POST['search']);
				$data['nosearch']=FALSE;
				
				//SET SESSION
				$newdata = array(
				   'username'  => $this->session->userdata('username'),
				   'logged_in' => $this->session->userdata('logged_in'),
				   'news_filter' => $this->session->userdata('news_filter'),
				   'search'  => $_POST['search']
				);
				$this->session->set_userdata($newdata);
				
				//Load the proper view.
				$this->load->view('include/header',$data);
				$this->load->view('client/find',$data);
				$this->load->view('include/footer',$data);	
			}
			else
			{
				if(null!==$this->session->userdata('search'))
				{
					$config['base_url'] = base_url().'claycareer/career';        
					$config['total_rows'] = $this->claycareerdb->count_all_course_search($this->session->userdata('search'));        
					$config['per_page'] = 3;        
					$config['uri_segment'] = 3;        
					$config['full_tag_open'] = '<ul class="pagination justify-content-center mb-4">';        
					$config['full_tag_close'] = '</ul>';        
					$config['first_link'] = 'First';        
					$config['last_link'] = 'Last';        
					$config['first_tag_open'] = '<li class="page-item">';        
					$config['first_tag_close'] = '</li>';        
					$config['prev_link'] = '&laquo';        
					$config['prev_tag_open'] = '<li class="page-item">';        
					$config['prev_tag_close'] = '</li>';        
					$config['next_link'] = '&raquo';        
					$config['next_tag_open'] = '<li class="page-item">';        
					$config['next_tag_close'] = '</li>';        
					$config['last_tag_open'] = '<li class="page-item">';        
					$config['last_tag_close'] = '</li>';        
					$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
					$config['cur_tag_close'] = '</a></li>';        
					$config['num_tag_open'] = '<li class="page-item">';        
					$config['num_tag_close'] = '</li>';

					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$this->pagination->initialize($config);        
					$data['links'] = $this->pagination->create_links();        
					$data['users'] = $this->claycareerdb->get_course_search($config["per_page"], $page, $this->session->userdata('search'));
					$data['nosearch']=FALSE;

					//Load the proper view.
					$this->load->view('include/header',$data);
					$this->load->view('client/find',$data);
					$this->load->view('include/footer',$data);	
				}
				else
				{
					$data['nosearch']=TRUE;

					//Load the proper view.
					$this->load->view('include/header',$data);
					$this->load->view('client/find',$data);
					$this->load->view('include/footer',$data);
				}
			}
		}
	}
	
	public function course($id)
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			$data['course'] = $this->claycareerdb->getcourse($id);
			
			//Get the data for Trending Topics
			$result = $this->claycareerdb->getrank($id);
			
			foreach($result as $r){
				$ran = $this->claycareerdb->getschool($r['school_id']);
				$info = array('school_id' => $ran[0]['school_id'],
							  'school_name' => $ran[0]['school_name'],
							  'school_rank' => $r['rank']
							 );
				$sch_details[] = $info;
			}
			$data['rank'] = $sch_details;
						
			$this->load->view('include/header',$data);
			$this->load->view('client/course',$data);
			$this->load->view('include/footer',$data);
			
		}
	}
	
	public function institute($id)
	{
		if(!$this->session->userdata('logged_in')==1)
		{
			echo $this->session->userdata('logged_in');
		}
		else
		{
			$data['school'] = $this->claycareerdb->getschool($id);
			
			$this->load->view('include/header',$data);
			$this->load->view('client/school',$data);
			$this->load->view('include/footer',$data);
			
		}
	}
	
	public function about()
	{
		$this->load->view('include/header');
		$this->load->view('client/about');
		$this->load->view('include/footer');
	}
	
	public function contact()
	{
		$this->load->view('include/header');
		$this->load->view('client/contact');
		$this->load->view('include/footer');
	}
	
	public function faqs()
	{
		$this->load->view('include/header');
		$this->load->view('client/faqs');
		$this->load->view('include/footer');
	}
}
