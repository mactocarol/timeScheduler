<?php
class Staff_schedule_model extends MY_Model 
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
	  function getdatapsw($table,$where)
    {
    	    $this->db->select('*');
    	     if(!empty($where))
    	     {
    	     	$this->db->where($where);
    	     }
             $query=$this->db->get($table)->row_array();
              // echo $this->db->last_query(); die;
             return $query;

       
    }
        
}