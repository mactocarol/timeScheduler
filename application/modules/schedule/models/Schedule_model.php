<?php
class Schedule_model extends MY_Model 
{
	function __construct() {
		parent::__construct();		
	}
	
	function insertstaff($data = array())
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
      // echo $this->db->last_query(); //to check query is right or not;
		//die;
     }
        
}