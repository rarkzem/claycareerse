<?php

class admin_model extends CI_Model {
    
	public function __construct()
	{
		parent::__construct();
	}
	
	//For fetching data for Courses Section
	public function getcourse(){ 
        $this->db->select('*');
		$this->db->from('course');
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