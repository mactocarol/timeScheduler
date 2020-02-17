<?php
class User_model extends MY_Model 
{
	function __construct() {
		parent::__construct();		
	}
        
    function new_user ($data)
    {
        $this->db->insert('users', $data); 
		return $this->db->insert_id();		
    }
    
	public function is_key_valid($key)
    {
        $this->db->where('key', $key);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){  } else { return False; }
        
        $this->db->set('is_verified', '1'); 
        $this->db->where('key',$key); 
        $this->db->update('users'); 
        return true;
    }
    
    
	function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function email_exists_user($email)
    {
        $this->db->where('email', $email);
        $this->db->where('id !=', $this->session->userdata('user_id'));
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function username_exists($email)
    {
        $this->db->where('username', $email);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
	function businessname_exists($email)
    {
        $this->db->where('name', $email);
        $query = $this->db->get('business');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
	
	function bemail_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('business');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
	
	function semail_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function username_exists_user($email)
    {
        $this->db->where('username', $email);
        $this->db->where('id !=', $this->session->userdata('user_id'));
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function check_login($email,$pass)
    {
        $this->db->where('email', $email);
        $this->db->or_where('username', $email);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
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