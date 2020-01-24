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
		public function setDate(){
			$chkdt = $this->input->post('firstdate'); 
			$newdate = explode('/',$chkdt);
			
			$newdt = $newdate[2].'-'.$newdate[0].'-'.$newdate[1].' 00:00:00';						
			$timestamp1 = strtotime($newdt);
            if($chkdt){
				$timestamp= $timestamp1;			
			}else{
				$timestamp =time();
			}
			//echo date('Y-m-d h:i:s',time()); die;
			$this->session->set_userdata('timestamp',$timestamp);
			
		}
         // mainSchedulePage  
        public function openSchedule(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
			
			$data['business_name'] = $this->uri->segment(3);
			$business_id = $this->uri->segment(4);
			$timestamp = $this->session->userdata('timestamp');
			
			
			$date1 = date('m/d/Y', strtotime('+0day', $timestamp));
			$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
			$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
			$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
			$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
			$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
			$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
			
			$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
			
			
			//print_r($data['alldates']);die;
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'" ';
			
			$shifts=$this->schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			
			$arr = $this->group_by($shifts,'shift_date');	
			$finalArray = [];	
			foreach($arr as $key=>$row){			
				$arrr = $this->group_by($row,'user_id');
				$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArray'] = $finalArray;


           // timeoff 
            $wheret = 'business_id = '.$business_id;			
			$wheret .= ' AND firstday_off >= "'.$date1.'" AND firstday_off <= "'.$date7.'"';
			 
			
			$timeoffs=$this->schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
			$arrt = $this->group_by($timeoffs,'firstday_off');
		  //print_r($arrt); die;					
			$finalArrayTimeoff = [];	
			foreach($arrt as $key=>$row){			
				$arrrt = $this->group_by($row,'user_id');
				$finalArrayTimeoff[$key] = $arrrt;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayTimeoff'] = $finalArrayTimeoff;
          	

              // comment 
            $wherec = 'business_id = '.$business_id;			
			$wherec .= ' AND comment_date >= "'.$date1.'" AND comment_date <= "'.$date7.'"';
			 
			
			$comments=$this->schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
			$arrc = $this->group_by($comments,'comment_date');
		     $finalArrayComment = [];	
			foreach($arrc as $key=>$row){			
				$arrrc = $this->group_by($row,'user_id');
				$finalArrayComment[$key] = $arrrc;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayComment'] = $finalArrayComment;

              // break 
            $whereb = 'business_id = '.$business_id;			
			$whereb .= ' AND addbraek_date >= "'.$date1.'" AND addbraek_date <= "'.$date7.'"';
			 
			
			$breaks=$this->schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;					
			
		   $udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
           $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			//print_r($data['staffName']);
		   $this->load->view('admin/includes/sidebar');	
           $this->load->view('schedule_view',$data); 
		   $this->load->view('admin/includes/footer');	
         
		   
        }
		
		//showcalender by ajax on previous,next week and go
		
		public function showCalendar(){            									
			$business_id =  $this->input->post('business_id'); 
			$chkdt = $this->input->post('firstdate');
			$newdate = explode('/',$chkdt);
			//print_r($newdate); die;
			$newdt = $newdate[2].'-'.$newdate[0].'-'.$newdate[1].' 00:00:00';
			
			//echo $newdt3= strtotime($chkdt); die;
			//$timestamp = $this->session->userdata('timestamp');
			//$chkdtarr=explode("GMT",$chkdt);
			//$newdt= strtotime($chkdtarr[0]); 
			//die;
			$timestamp = strtotime($newdt);
			$this->session->set_userdata('timestamp',$timestamp);
			/* if($newdt){
			     
			}
			else{ */
				//$timestamp = $this->session->userdata('timestamp');
			//}
			//$timestamp = $newdt;
			$date1 = date('m/d/Y', strtotime('+0day', $timestamp)); 
			$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
			$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
			$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
			$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
			$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
			$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
			
			$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
			//print_r($data['alldates']); die;
			//shift
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
			
			$shifts=$this->schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			//print_r($shifts); die;
			$arr = $this->group_by($shifts,'shift_date');	
			$finalArray = [];	
			foreach($arr as $key=>$row){			
				$arrr = $this->group_by($row,'user_id');
				$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArray'] = $finalArray;	
            
           // timeoff 
            $wheret = 'business_id = '.$business_id;			
			$wheret .= ' AND firstday_off >= "'.$date1.'" AND firstday_off <= "'.$date7.'"';
			 
			
			$timeoffs=$this->schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
			$arrt = $this->group_by($timeoffs,'firstday_off');
		     $finalArrayTimeoff = [];	
			foreach($arrt as $key=>$row){			
				$arrrt = $this->group_by($row,'user_id');
				$finalArrayTimeoff[$key] = $arrrt;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayTimeoff'] = $finalArrayTimeoff;	

             // comment 
            $wherec = 'business_id = '.$business_id;			
			$wherec .= ' AND comment_date >= "'.$date1.'" AND comment_date <= "'.$date7.'"';
			 
			
			$comments=$this->schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
			$arrc = $this->group_by($comments,'comment_date');
		     $finalArrayComment = [];	
			foreach($arrc as $key=>$row){			
				$arrrc = $this->group_by($row,'user_id');
				$finalArrayComment[$key] = $arrrc;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayComment'] = $finalArrayComment;	

			// break 
            $whereb = 'business_id = '.$business_id;			
			$whereb .= ' AND addbraek_date >= "'.$date1.'" AND addbraek_date <= "'.$date7.'"';
			 
			
			$breaks=$this->schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;				
			
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
		
		// add break cal
		public function addbreakcal(){
			//$admin_id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			 $insert=array(    
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'break'=>$this->input->post('addbreak'),
					'addbraek_date'=>$this->input->post('breakdate'),
					'is_deleted'=>1
				);
           
			$new_id = $this->schedule_model->InsertRecord('break',$insert);
			echo $this->showCalendar();
			 
        }
		
		// add comment cal
		public function addcommentcal(){
			//$admin_id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			 $insert=array(    
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'comment'=>$this->input->post('comment'),
					'comment_date'=>$this->input->post('commentdate'),
					'is_deleted'=>1
				);
           
			$new_id = $this->schedule_model->InsertRecord('comments',$insert);
			echo $this->showCalendar();
			 
        }
		
		
		// add shift cal
		public function addshiftcal(){
			$admin_id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
		    $time = $this->input->post('start_time');
			if (strpos($time, '-') !== false) {
				 $array = explode("-", $time); 
				 $start_times = $array[0].':00';			
				  //$start_time = date("h:i a", strtotime($start_times));
				 if($start_times >= 12){
				  $start_time = date("h:i p", strtotime($start_times));
				 }
				 else{
					$start_time = date("h:i a", strtotime($start_times));
				 }
				 $end_times = $array[1].':00';  
				 if($end_times >= 12){
				   $end_time = date("h:i p", strtotime($end_times));
				 }
				 else{
					$end_time = date("h:i a", strtotime($end_times));
				 }
				
				}else {
				 $start_time = $time;
				 $end_time = '';
			}
			 
				 $insert=array(    
					'admin_id'=>$admin_id,			 
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'shift_date'=>$this->input->post('shiftdate'),
					'start_time'=>$start_time,
					'end_time'=>$end_time,
					'is_deleted'=>1
				);
           
			$new_id = $this->schedule_model->InsertRecord('shift',$insert);
			echo $this->showCalendar();
			 
        }
		
		// add shift
		public function addshift(){
			$admin_id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			//$staff_id = $this->input->post('staff_id');
		  // $business_id = $this->input->post('business_idd')
		   // $chkdt1 = $this->input->post('ids_date');
			//$unix = strtotime($chkdt1);
			
		   $insert = [];
		    foreach ($staff_id as $staff_ids){
				 $insert[]=array(    
					'admin_id'=>$admin_id,			 
					'user_id'=>$staff_ids,		 
					'business_id'=>$this->input->post('business_id'),			 
					'shift_date'=>$this->input->post('date'),
					'start_time'=>$this->input->post('start_time'),
					'end_time'=>$this->input->post('end_time'),
					'is_deleted'=>1
				);
            } 
			
			$new_id = $this->schedule_model->InsertBatch('shift',$insert);
			echo $this->showCalendar();
			 
        }
		
		// add timeoff
		public function addtimeoff(){
		   $admin_id = $this->session->userdata('id'); 
           $staff_id = $this->input->post('staff_id');
		   $first_dayoff = $this->input->post('first_dayoff');
		   $last_dayoff = $this->input->post('last_dayoff');
		   
		   $Variable1 = strtotime($first_dayoff); 
           $Variable2 = strtotime($last_dayoff); 
           $timeoff_type =$this->input->post('timeoff_type');							  
		    if($timeoff_type == 'Vacation') 
			{
				$color_code ="#0074D9";
			}
			else if($timeoff_type == 'Public Holiday')
			{
				$color_code ="#FF4136";
			}
            else if($timeoff_type == 'LOA')
			{
				$color_code ="#2ECC40";
			}
           else if($timeoff_type == 'Maternity')
			{
				$color_code ="#FF851B";
			}
            else if($timeoff_type == 'Personal')
			{
				$color_code ="#7FDBFF";
			}
             else if($timeoff_type == 'RDO')
			{
				$color_code ="#B10DC9";
			}
            else if($timeoff_type == 'Sick Leave')
			{
				$color_code ="#FFDC00";
			}
			else if($timeoff_type == 'Training')
			{
				$color_code ="#001f3f";
			}
			else if($timeoff_type == 'Unavailable')
			{
				$color_code ="#39CCCC";
			}
			

		
		
		    //$chkdt1 = $this->input->post('ids_date');
			//$unix = strtotime($chkdt1);
		    $insert = [];
		    foreach ($staff_id as $staff_ids){
				for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
				 $Store = date('m/d/Y', $currentDate); 
					 $insert[]=array(    
						'admin_id'=>$admin_id,			 
						'user_id'=>$staff_ids,		 
						'business_id'=>$this->input->post('business_id'),			 
						'timeoff_type'=>$this->input->post('timeoff_type'),
						'color_code'=>$color_code,
						'notes'=>$this->input->post('notes'),
						'firstday_off'=>$Store,
						'start_time'=>$this->input->post('start_time'),
						'end_time'=>$this->input->post('end_time'),
						'is_deleted'=>1
					);
				}
            } 
			
			$new_id = $this->schedule_model->InsertBatch('timeoff',$insert);
			
			echo $this->showCalendar();
						 
        }
		
		
		public function shiftModal(){
			   
             $business_id = $this->input->post('business_id');			 
             $udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		   $data['business_id']= $this->input->post('business_id'); 
           echo $temp = $this->load->view('shiftmodal_view',$data);   
           			
        }
		
		
		public function timeoffModal(){
			   
             $business_id = $this->input->post('business_id');			 
             $udata1=array('admin_id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		   $data['business_id']= $this->input->post('business_id'); 
		   //only for edit on calendar staffid
		   $data['staffid']=  $this->input->post('staffid'); 
		   $data['dates']=  $this->input->post('dates'); 
			
           echo $temp = $this->load->view('timeoffmodal_view',$data);   
           			
        }
		
		public function staffModal(){
			$data['business_id']= $this->input->post('business_id'); 
           echo $temp = $this->load->view('staffmodal_view',$data);   
           			
        }
        
                		        	
}
?>