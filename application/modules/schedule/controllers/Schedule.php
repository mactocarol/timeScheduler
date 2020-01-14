<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Schedule extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('schedule_model');
            /* if( $this->session->userdata('user_group_id') != 1){
                redirect('user');
            }   */          
        }
        public function openSchedule(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
           
           /* $datas=new stdClass();
              if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $datas->error=0;
                    $datas->success=1;
                    $datas->message=$items->message;
                }else{
                    $datas->error=1;
                    $datas->success=0;
                    $datas->message=$items->message;
                }                
            }            
            
            $html = "";
            $customers = $this->customer_model->SelectRecord('customer','*',$udata=array(),'id asc');
            
            //header("Content-Type: text/html");
            //print_r($html);
            //print_r($result_set); die;
            $datas->categories = $customers;            
            $datas->result = $this->customer_model->SelectSingleRecord('users','*',$udata,$orderby=array());            
            $datas->title = 'Customer List';
            $datas->field = 'Datatable';
            $datas->page = 'list_customer';          */   
			//$this->load->view('admin/includes/header');
			
			$udata=array('admin_id'=>$this->session->userdata('id'),'id'=>$this->uri->segment(4)); 
            $data['business']=$this->schedule_model->SelectRecord1('business','*',$udata,$orderby=array());
			
			
			$udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$this->uri->segment(4)); 
            $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			
			
			$this->load->view('admin/includes/sidebar');	
           $this->load->view('schedule_view',$data);   
           $this->load->view('admin/includes/footer');			
        }
        
		
		// addBusiness
        public function addBusiness(){
           $admin_id = $this->session->userdata('id');
           
             $insert=array(    
                'admin_id'=>$admin_id,			 
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'phone_no'=>$this->input->post('phone_no'),
                'is_deleted'=>1
            );
          
         
                 $new_id = $this->schedule_model->InsertRecord('business',$insert);
                
                if($new_id)
                {
                    echo 'Business Added Successfully';
                }
                else{
                    echo 'Fail To Add Business';
                }
        }
		
		// add staff
		public function addstaff(){
           $admin_id = $this->session->userdata('id'); 
          // echo $business_id = $this->uri->segment(2); die;
            //$business_id = 1;
             $insert=array(    
                'admin_id'=>$admin_id,			 
                'business_id'=>$this->input->post('business_id'),			 
                'first_name'=>$this->input->post('fname'),
                'last_name'=>$this->input->post('lname'),
                'email'=>$this->input->post('email'),
                'phone_no'=>$this->input->post('phone_no'),
                'password'=>md5(12345),
				'status'=>1,
                'is_deleted'=>1
            );
          
         
                 $new_id =   $this->schedule_model->InsertRecord('user',$insert);
                
                if($new_id)
                {
                    echo 'User Added Successfully';
                }
                else{
                    echo 'Fail To Add User';
                }
        }
		
		
		
			// add shift
		public function addshift(){
			
			
           $admin_id = $this->session->userdata('id'); 
           $staff_id = $this->input->post('staff_id');
		   //$staff_id = explode(",",$staff_id1); 
		   //print_r($staff_id); die;
		   //$date = $this->input->post('date');
          // $datee = date('Y-m-d',strtotime($date));
		   
		   /* $start_time = $this->input->post('start_time');
           $start_timee = date('H:i:s',strtotime($start_time));
		   echo $start_timee; die;
		    $end_time = $this->input->post('end_time');
           $end_timee = date('H:i:s',strtotime($end_time));
		    */
		   // print_r($vendor_id); die;
		   $insert = [];
		    foreach ($staff_id as $staff_ids){
             $insert[]=array(    
                'admin_id'=>$admin_id,			 
                'user_id'=>$staff_ids,		 
                'business_id'=>$this->input->post('business_idd'),			 
                'shift_date'=>$this->input->post('date'),
                'start_time'=>$this->input->post('start_time'),
                'end_time'=>$this->input->post('end_time'),
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
                'is_deleted'=>1
            );
          
         	
                
			} 
			//print_r($insert); die;
           		$new_id = $this->schedule_model->InsertBatch('shift',$insert);
                 if($new_id)
                {
                    echo 'Shift Added Successfully';
                }
                else{
                    echo 'Fail To Add Shift';
                } 
        }
                		        	
}
?>