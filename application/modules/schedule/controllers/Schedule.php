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

         // mainSchedulePage  
        public function openSchedule(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
			
			$data['business_name'] = $this->uri->segment(3);
			$business_id =  $this->uri->segment(4); 
			$timestamp = time();
			
			$date1 = date('m/d/Y', strtotime('+0day', $timestamp));
			$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
			$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
			$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
			$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
			$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
			$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
			
			$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
			
			
			//print_r(implode(',',$dates));die;
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
			
			$shifts=$this->schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			
			$arr = $this->group_by($shifts,'shift_date');	
			$finalArray = [];	
			foreach($arr as $key=>$row){			
				$arrr = $this->group_by($row,'user_id');
				$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArray'] = $finalArray;			
			
		   $udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$this->uri->segment(4)); 
           $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			
		   $this->load->view('admin/includes/sidebar');	
           $this->load->view('schedule_view',$data);   
           $this->load->view('admin/includes/footer');			
        }
		
		//showcalender by ajax on previous,next week and go
		
		public function showCalendar(){            									
			 $business_id =   $this->input->post('business_id'); 
			//die;
			//$timestamp = time();
			//echo  $timestamp = $this->input->post('business_id'); die;
			$chkdt = $this->input->post('firstdate');
			$chkdtarr=explode("GMT",$chkdt);
			$newdt= strtotime($chkdtarr[0]);
			
			$timestamp = $newdt; 
			
			$date1 = date('m/d/Y', strtotime('+0day', $timestamp)); 
			$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
			$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
			$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
			$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
			$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
			$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
			
			$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
			//print_r($data['alldates']); die;
			
			//print_r(implode(',',$dates));die;
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
			
			$shifts=$this->schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			
			$arr = $this->group_by($shifts,'shift_date');	
			$finalArray = [];	
			foreach($arr as $key=>$row){			
				$arrr = $this->group_by($row,'user_id');
				$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArray'] = $finalArray;			
			
			$udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$this->input->post('business_id')); 
            $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			$this->load->view('calender_view',$data);   
          		
        }
        
		//Groupby function 
		public function group_by($array,$keyvalue){
			$arr = array();
			foreach ($array as $key => $item) {
			   $arr[$item[$keyvalue]][$key] = $item;
			}
			ksort($arr, SORT_NUMERIC);
			return $arr;
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
                  
				$udata=array('admin_id'=>$this->session->userdata('id')); 
                $dataq['businessList']=$this->schedule_model->SelectRecord('business','*',$udata=array(),'id asc');
				
				  echo $dt = $this->load->view('user/dashboard_view',$dataq); 
                }
                else{
                   
					echo $dt =1;
                }
        }
		
		// add staff
		public function addstaff(){
           $admin_id = $this->session->userdata('id'); 
          
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
		   
		   $insert = [];
		    foreach ($staff_id as $staff_ids){
				 $insert[]=array(    
					'admin_id'=>$admin_id,			 
					'user_id'=>$staff_ids,		 
					'business_id'=>$this->input->post('business_idd'),			 
					'shift_date'=>$this->input->post('date'),
					'start_time'=>$this->input->post('start_time'),
					'end_time'=>$this->input->post('end_time'),
					'is_deleted'=>1
				);
            } 
			
			$new_id = $this->schedule_model->InsertBatch('shift',$insert);
			 if($new_id)
			{
				
				 $business_id = $this->input->post('business_idd');
		
					$timestamp = time();
					
					$date1 = date('m/d/Y', strtotime('+0day', $timestamp));
					$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
					$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
					$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
					$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
					$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
					$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
					
					$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
					
					
					//print_r(implode(',',$dates));die;
					$where = 'business_id = '.$business_id;			
					$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
					
					$shifts=$this->schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
					
					$arr = $this->group_by($shifts,'shift_date');	
					$finalArray = [];	
					foreach($arr as $key=>$row){			
						$arrr = $this->group_by($row,'user_id');
						$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
					}
					
					$data['finalArray'] = $finalArray;			
					
					$udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$this->input->post('business_idd')); 
					$data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
					echo $temp =  $this->load->view('calender_view',$data);   
			
	                // echo 'Shift Added Successfully';
			}
			else{
				echo $temp =1;
				//echo 'Fail To Add Shift';
			} 
        }
		
		
		public function shiftModal(){
			   
             $business_id = $this->input->post('business_id');			 
             $udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		   $data['business_id']= $this->input->post('business_id'); 
           echo $temp = $this->load->view('shiftmodal_view',$data);   
           			
        }
		
		public function staffModal(){
			$data['business_id']= $this->input->post('business_id'); 
           echo $temp = $this->load->view('staffmodal_view',$data);   
           			
        }
        
                		        	
}
?>