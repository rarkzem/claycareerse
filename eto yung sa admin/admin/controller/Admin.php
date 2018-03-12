<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('admin_model','admindb');
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
		$this->load->view('include/admin_header');
		$this->load->view('admin/landing');
		$this->load->view('include/admin_footer');
	}
	
	public function course()
	{
		$data['course'] = $this->admindb->getcourse();
			
		$this->load->view('include/admin_header',$data);
		$this->load->view('admin/course',$data);
		$this->load->view('include/admin_footer',$data);
		
	}
	
	
}
