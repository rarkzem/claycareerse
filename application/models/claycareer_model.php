<?php

class claycareer_model extends CI_Model {
    
	public function __construct()
	{
		parent::__construct();
	}
	
	public function signup($data, $table){
		$this->db->insert($table, $data);
		
	}
	
	public function totalusers($table){
		$this->db->select('user_id');
		$this->db->from($table);
		$this->db->order_by('user_id', 'desc');
			
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			$data = $query->result_array();
			return $data[0]['user_id'];
		}
	}
	
	public function login($data){
		$condition = "email ="."'".$data['email']."' AND "."password ="."'".$data['password']."'";
		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		
		if ($query->num_rows()>0){
			return $query->result_array();
		}
		else{
			return 'false';
		}
	}
	
	//For fetching data for Home Section
	public function getcarousel($table){
		$this->db->select('news_id');
		$this->db->from($table);
		$this->db->order_by('carousel_id', 'asc');
			
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			$data = $query->result_array();
			return $data;
		}
	}
	
	public function getcarouselnews($table,$id){
		$condition = "news_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	public function gettrending($table){
		$this->db->select('forum_id');
		$this->db->from($table);
		$this->db->order_by('trending_id', 'asc');
			
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			$data = $query->result_array();
			return $data;
		}
	}
	
	public function gettrendingtopics($table,$id){
		$condition = "forum_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	public function getfeatured($table){
		$this->db->select('news_id');
		$this->db->from($table);
		$this->db->order_by('featured_id', 'asc');
			
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			$data = $query->result_array();
			return $data;
		}
	}
	
	public function getfeaturednews($table,$id){
		$condition = "news_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for News Section
	private function _get_users_data(){ 
        $this->db->select('*'); 
        $this->db->from('news');
		$this->db->order_by('news_id', 'desc');	
	}
    
    public function get_users($limit, $start,$type){ 
		if($type=="all")
		{
			$this->_get_users_data(); 
			$this->db->limit($limit, $start); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		else
		{
			$condition = "news_type ="."'".$type."'";
			$this->_get_users_data(); 
			$this->db->where($condition);
			$this->db->limit($limit, $start);
			$query = $this->db->get(); 
			return $query->result_array();	
		}
    }
    
    public function count_all_users($type){
		if($type=="all")
		{
			$this->_get_users_data(); 
			$query = $this->db->count_all_results(); 
			return $query; 
		}
		else
		{
			$condition = "news_type ="."'".$type."'";
			$this->_get_users_data(); 
			$this->db->where($condition);
			$query = $this->db->count_all_results(); 
			return $query;	
		}
    }
	 
	//For filtering data on News Section
	public function get_users_search($limit, $start, $value){ 
		
			$this->_get_users_data();
			$this->db->like('news_title', $value, 'both');
			$this->db->or_like('news_subheading', $value, 'both');
			$this->db->or_like('news_type', $value, 'both');
			$this->db->limit($limit, $start); 
			$query = $this->db->get(); 
			return $query->result_array();
		
    }
	
	public function count_all_users_search($value){
		$this->_get_users_data();
		$this->db->like('news_title', $value, 'both');
		$this->db->or_like('news_subheading', $value, 'both');
		$this->db->or_like('news_type', $value, 'both');
		$query = $this->db->count_all_results(); 
		return $query; 
	}
	
	//For fetching data for Forums Section
	private function _get_forums_data(){ 
        $this->db->select('*'); 
        $this->db->from('forums');
	}
	
	public function get_forums($limit, $start){ 
		$this->_get_forums_data(); 
		$this->db->limit($limit, $start); 
		$query = $this->db->get(); 
		return $query->result_array();
	 }
    
    public function count_all_forums(){
		$this->_get_forums_data(); 
		$query = $this->db->count_all_results(); 
		return $query; 
	}
	
	
	//For searching on Forums Section
	public function get_forums_search($limit, $start, $value){ 
		
			$this->_get_forums_data();
			$this->db->like('forum_title', $value, 'both');
			$this->db->or_like('forum_subtitle', $value, 'both');
			$this->db->limit($limit, $start); 
			$query = $this->db->get(); 
			return $query->result_array();
	}
	
	public function count_all_forums_search($value){
		$this->_get_forums_data();
		$this->db->like('forum_title', $value, 'both');
		$this->db->or_like('forum_subtitle', $value, 'both');
		$query = $this->db->count_all_results(); 
		return $query; 
	}
	
	//For fetching data for Topic Section
	public function gettopic($id){ 
        $condition = "forum_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('forums');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for Topic Section
	public function getcomments($id){ 
        $condition = "forum_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for Topic Section
	public function getprofile($id){ 
        $condition = "user_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	
	//For searching on Career Section
	private function _get_course_data(){ 
        $this->db->select('*'); 
        $this->db->from('course');
	}
	
	public function get_course_search($limit, $start, $value){ 
		
			$this->_get_course_data();
			$this->db->like('course_name', $value, 'both');
			$this->db->or_like('course_abbrv', $value, 'both');
			$this->db->limit($limit, $start); 
			$query = $this->db->get(); 
			return $query->result_array();
	}
	
	public function count_all_course_search($value){
		$this->_get_course_data();
		$this->db->like('course_name', $value, 'both');
		$this->db->or_like('course_abbrv', $value, 'both');
		$query = $this->db->count_all_results(); 
		return $query; 
	}
	
	//For fetching data for Article Section
	public function getarticle($id){ 
        $condition = "news_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for Course Section
	public function getcourse($id){ 
        $condition = "course_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('course');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for Course Section
	public function getrank($id){ 
        $condition = "course_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('ranking');
		$this->db->where($condition);
		$this->db->order_by('rank', 'asc');
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	//For fetching data for Course Section and Institute Section
	public function getschool($id){ 
        $condition = "school_id ="."'".$id."'";
		
		$this->db->select('*');
		$this->db->from('institute');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if($query->num_rows() < 1){
			return 0;
		}
		else{
			return $query->result_array();
		}
	}
	
	
	


	
	
	
	
	
	
	
	
}
?>