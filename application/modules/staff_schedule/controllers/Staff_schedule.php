<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staff_schedule extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
			$this->load->model('staff_schedule_model');
			$this->load->helper('my_helper');
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
		 
         // calendar  
        public function openSchedule(){
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
			
			$udata=array('id'=>$this->session->userdata('id')); 
            $data=$this->staff_schedule_model->SelectRecord('user','*',$udata=array(),'id asc');
			
			$sdata=array('id'=>$data[0]['business_id']); 
            $datas=$this->staff_schedule_model->SelectRecord('business','*',$sdata=array(),'id asc');
			
		    $data['business_name'] = $datas[0]['name'];
			$data['business_id'] = $data[0]['business_id'];
			
			$business_id = $data[0]['business_id'];
			$timestamp = $this->session->userdata('timestamp');
			
			
			$date1 = date('m/d/Y', strtotime('+0day', $timestamp));
			$date2 = date('m/d/Y', strtotime('+1day', $timestamp));
			$date3 = date('m/d/Y', strtotime('+2day', $timestamp));
			$date4 = date('m/d/Y', strtotime('+3day', $timestamp));
			$date5 = date('m/d/Y', strtotime('+4day', $timestamp));
			$date6 = date('m/d/Y', strtotime('+5day', $timestamp));
			$date7 = date('m/d/Y', strtotime('+6day', $timestamp));
			$data['currdates'] = $date1;
			$data['alldates'] = [$date1,$date2,$date3,$date4,$date5,$date6,$date7];
			
			
			//print_r($data['alldates']);die;
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'" ';
			
			$shifts=$this->staff_schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			
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
			 
			
			$timeoffs=$this->staff_schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
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
			 
			
			$comments=$this->staff_schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
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
			 
			
			$breaks=$this->staff_schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;					
			//for staff list
		   $udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
           $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		   
		   
		   //for timeoff
		  $data['timeOff'] =$this->staff_schedule_model->joindataResult('t.user_id','u.id',array('t.id'=>$this->session->userdata('id'),'t.business_id'=>$business_id),'t.*,u.first_name,u.last_name,u.email','timeoff as t','user as u',$orderby=array());
          
		   $this->load->view('user/includes/sidebar',$data);	
           $this->load->view('schedule_view',$data); 
		   $this->load->view('user/includes/footer');	
         
		   
        }
		
		
		// dayCalendar  
        public function dayCalendar(){
           
			$udata=array('id'=>$this->session->userdata('id')); 
            $data=$this->staff_schedule_model->SelectRecord('user','*',$udata=array(),'id asc');
			
			$sdata=array('id'=>$data[0]['business_id']); 
            $datas=$this->staff_schedule_model->SelectRecord('business','*',$sdata=array(),'id asc');
			
		    $data['business_name'] = $datas[0]['name'];
			
			$business_id = $this->input->post('business_id');
			$chkdt = $this->input->post('firstdate'); 
			$newdate = explode('/',$chkdt);
			
			$newdt = $newdate[2].'-'.$newdate[0].'-'.$newdate[1].' 00:00:00';						
			$timestamp = strtotime($newdt);
			//$timestamp = $this->session->userdata('timestamp');
			
			
			 $date1 = date('m/d/Y', strtotime('+0day', $timestamp));
			
			$data['currdates'] = $date1;
			//print_r($data['currdates']); die;
			$data['alldates'] = [$date1];
			
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date1.'" ';
			
			$shifts=$this->staff_schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
			
			$arr = $this->group_by($shifts,'shift_date');	
			$finalArray = [];	
			foreach($arr as $key=>$row){			
				$arrr = $this->group_by($row,'user_id');
				$finalArray[$key] = $arrr;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArray'] = $finalArray;
			
			
			// timeoff 
            $wheret = 'business_id = '.$business_id;			
			$wheret .= ' AND firstday_off >= "'.$date1.'" AND firstday_off <= "'.$date1.'"';
			 
			
			$timeoffs=$this->staff_schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
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
			$wherec .= ' AND comment_date >= "'.$date1.'" AND comment_date <= "'.$date1.'"';
			 
			
			$comments=$this->staff_schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
			$arrc = $this->group_by($comments,'comment_date');
		     $finalArrayComment = [];	
			foreach($arrc as $key=>$row){			
				$arrrc = $this->group_by($row,'user_id');
				$finalArrayComment[$key] = $arrrc;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayComment'] = $finalArrayComment;

              // break 
            $whereb = 'business_id = '.$business_id;			
			$whereb .= ' AND addbraek_date >= "'.$date1.'" AND addbraek_date <= "'.$date1.'"';
			 
			
			$breaks=$this->staff_schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;	
			//print_r($data['finalArray']);die;
			$udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			
            echo $this->load->view('day_view',$data); 	
		   
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
			
			$shifts=$this->staff_schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
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
			 
			
			$timeoffs=$this->staff_schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
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
			 
			
			$comments=$this->staff_schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
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
			 
			
			$breaks=$this->staff_schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;				
			
			$udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$this->input->post('business_id')); 
            $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
			
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
		
		
		
		// add break cal
		public function addbreakcal(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			$dayvalue = $this->input->post('dayvalue');
			 $insert=array(    
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'break'=>$this->input->post('addbreak'),
					'addbraek_date'=>$this->input->post('breakdate'),
					'is_deleted'=>1
				);
           
			$new_id = $this->staff_schedule_model->InsertRecord('break',$insert);
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
			 
        }
		
		// add comment cal
		public function addcommentcal(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			$dayvalue = $this->input->post('dayvalue');
			 $insert=array(    
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'comment'=>$this->input->post('comment'),
					'comment_date'=>$this->input->post('commentdate'),
					'is_deleted'=>1
				);
           
			$new_id = $this->staff_schedule_model->InsertRecord('comments',$insert);
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
			 
        }
		public function addcommentcals(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			$dayvalue = $this->input->post('dayvalue');
			 $insert=array(    
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'comment'=>$this->input->post('comment'),
					'comment_date'=>$this->input->post('commentdate'),
					'is_deleted'=>1
				);
           
			$new_id = $this->staff_schedule_model->InsertRecord('comments',$insert);
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
			 
        }
		
		
		// add shift cal
		public function addshiftcal(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
		    $time = $this->input->post('start_time');
			$dayvalue = $this->input->post('dayvalue');
			if (strpos($time, '-') !== false) {
				 $array = explode("-", $time); 
				 $start_times = $array[0].':00';
				 $end_times = $array[1].':00';		
				  //$start_time = date("h:i a", strtotime($start_times));
				 /*  if($start_times >= 12){
				  $start_time = date("h:i a.", strtotime($start_times));
				 }
				 else{
					$start_time = date("h:i a", strtotime($start_times));
				 } 
				  
				 if($end_times >= 12){
				   $end_time = date("h:i a.", strtotime($end_times));
				 }
				 else{
					$end_time = date("h:i a", strtotime($end_times));
				 } */
				//$start_time = date("h:i a", strtotime($start_times));
				//$end_time = date("h:i a", strtotime($end_times));
				$start_time  = date("h:i a", strtotime($start_times));	
                 if($start_times > $end_times) { 
                 //if($start_times >= 12) { 				 
                     $end_time1  = date("h:i", strtotime($end_times));
                     $end_time  = $end_time1.'pm';				
				 }
				
				else{
					$end_time  = date("h:i a", strtotime($end_times));
				} 
				}else {
				 $start_time = $time;
				 $end_time = '';
			    }
			 
				 $insert=array(    
					//'id'=>$id,			 
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'shift_date'=>$this->input->post('shiftdate'),
					'start_time'=>$start_time,
					'end_time'=>$end_time,
					'is_deleted'=>1
				);
           
			$new_id = $this->staff_schedule_model->InsertRecord('shift',$insert);
			
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
        }
		
		
		// add shift cal
		public function addshiftcals(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
		    $dayvalue = $this->input->post('dayvalue');
			
			 
				 $insert=array(    
					//'id'=>$id,			 
					'user_id'=>$this->input->post('staff_id'),		 
					'business_id'=>$this->input->post('business_id'),			 
					'shift_date'=>$this->input->post('shiftdate'),
					'start_time'=>$this->input->post('start_time'),
					'end_time'=>$this->input->post('end_time'),
					'is_deleted'=>1
				);
           
			$new_id = $this->staff_schedule_model->InsertRecord('shift',$insert);
			
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
        }
		// add shift
		public function addshift(){
			//$id = $this->session->userdata('id'); 
            $staff_id = $this->input->post('staff_id');
			//$staff_id = $this->input->post('staff_id');
		  // $business_id = $this->input->post('business_idd')
		   // $chkdt1 = $this->input->post('ids_date');
			//$unix = strtotime($chkdt1);
			
		   $insert = [];
		    foreach ($staff_id as $staff_ids){
				 $insert[]=array(    
					//'id'=>$id,			 
					'user_id'=>$staff_ids,		 
					'business_id'=>$this->input->post('business_id'),			 
					'shift_date'=>$this->input->post('date'),
					'start_time'=>$this->input->post('start_time'),
					'end_time'=>$this->input->post('end_time'),
					'is_deleted'=>1
				);
            } 
			
			$new_id = $this->staff_schedule_model->InsertBatch('shift',$insert);
			echo $this->showCalendar();
			 
        }
		
		// add timeoff
		public function addtimeoff(){
		   //$id = $this->session->userdata('id'); 
           $staff_id = $this->input->post('staff_id');
		   $first_dayoff = $this->input->post('first_dayoff');
		   $last_dayoff = $this->input->post('last_dayoff');
		   $dayvalue = $this->input->post('dayvaluew');
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
						//'id'=>$id,			 
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
			
			$new_id = $this->staff_schedule_model->InsertBatch('timeoff',$insert);
			
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
						 
        }
		
		// add emailschedule and mail 
		public function addemail(){
			$firstdate = $this->input->post('from');
			$lastdate = $this->input->post('to');
			$business_id = $this->input->post('business_id');
			$staff_id = $this->input->post('staff_id');
			$type = $this->input->post('option');
			
			for ($currentDate = strtotime($firstdate); $currentDate <= strtotime($lastdate); $currentDate += (86400)) { 
				$data['alldates'][] = date('m/d/Y', $currentDate);
			}
			//print_r($data['alldates']); die;	
			$date1 = $data['alldates'][0];
			$date7 = $data['alldates'][count($data['alldates'])-1];			
			//shift
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
			
			$shifts=$this->staff_schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
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
			 
			
			$timeoffs=$this->staff_schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
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
			 
			
			$comments=$this->staff_schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
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
			 
			
			$breaks=$this->staff_schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;				
			
			$html = '<div class="table-responsive"><table border="1" style="border-collapse: collapse;"><tr><th>Names</th>';
			
			foreach($data['alldates'] as $key=>$val){
				$html .= '<th>'.$val.'</th>';
			}
			
			$html .= '</tr>';
			
			$html2 = ''; $staffArray = [];
			
			foreach($staff_id as $row){
				$udata1=array('id'=>$row); 
                $data1=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
				$html2 = '<tr><td>'.$data1[0]['first_name'].' '.$data1[0]['last_name'].'</td>';
				
				foreach($data['alldates'] as $key=>$val){
					$shifts = isset($finalArray[$val]) ? $finalArray[$val] : [];
					$timeoffs = isset($finalArrayTimeoff[$val]) ? $finalArrayTimeoff[$val] : []; 
					$comments = isset($finalArrayComment[$val]) ? $finalArrayComment[$val] : []; 
					$breaks = isset($finalArrayBreak[$val]) ? $finalArrayBreak[$val] : []; 
					$html2 .= '<td>';
                    if($shifts){
						foreach($shifts as $key1=>$valu){
							if($key1 == $row){
								foreach($valu as $v){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v['start_time'].'-'.$v['end_time'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					if($timeoffs){
						foreach($timeoffs as $key2=>$valu2){
							if($key2 == $row){
								foreach($valu2 as $v2){
									$html2 .= '<div style="word-break:break-word;border:1px solid #808080; padding:4px; text-align: center;">';
									$html2 .= ''.$v2['timeoff_type'].'';
								    $html2 .= '</br>';
									if($v2['start_time'] && $v2['end_time']){
									   $html2 .= ''.$v2['start_time'].'-'.$v2['end_time'].'';
									}
									else{
									$html2 .= 'Full day';
									}
									$html2 .= '</div>';
								}
							}
						
						}
					}
					if($comments){
						foreach($comments as $key3=>$valu3){
							if($key3 == $row){
								foreach($valu3 as $v3){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v3['comment'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					if($breaks){
						foreach($breaks as $key4=>$valu4){
							if($key4 == $row){
								foreach($valu4 as $v4){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v4['break'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					
					
					$html2 .= '</td>';
				}
				$html2 .='</tr>';
				
				$staffArray[] = $html2;
				// if single option would be send
				if($type == 1){
					
					  $insert[]=array(    
						//'id'=>$id,			 
						'user_id'=>$row,		 
						'business_id'=>$this->input->post('business_id'),			 
						'subject'=>$this->input->post('subject'),
						'body'=>$this->input->post('body'),
						'from'=>$this->input->post('from'),
						'to'=>$this->input->post('to'),
						'send_option'=>$this->input->post('option'),
						'email'=>$this->input->post('email'),
						'attachment'=>$html.$html2.'</table></div>',
						'is_deleted'=>1
					);
					$udata11=array('id'=>$row); 
                    $data11=$this->staff_schedule_model->SelectRecord('user','*',$udata11,$orderby=array());
					$to = $data11[0]['email'];
					$sub = "Staff own schedule";
					//phpmailer($to,$sub,$html.$html2.'</table></div>');
				}
				
                	  			
			}
			
			foreach($staffArray as $staff){
				$html .= $staff;
			}			
			
			$html .= '</table></div>';
			// if option is  all
			
			if($type == 2){
				foreach ($staff_id as $staff_ids){				
				 $insert[]=array(    
					//'id'=>$id,			 
					'user_id'=>$staff_ids,		 
					'business_id'=>$this->input->post('business_id'),			 
					'subject'=>$this->input->post('subject'),
					'body'=>$this->input->post('body'),
					'from'=>$this->input->post('from'),
					'to'=>$this->input->post('to'),
					'send_option'=>$this->input->post('option'),
					'email'=>$this->input->post('email'),
					'attachment'=>$html,
					'is_deleted'=>1
				); 
				$udata12=array('id'=>$staff_ids); 
				$data12=$this->staff_schedule_model->SelectRecord('user','*',$udata12,$orderby=array());
				$to = $data12[0]['email'];
				$to = $this->input->post('email');
				$sub = "Staff full schedule";
				//phpmailer($to,$sub,$html);
					
				}
			}	 
			//print_r($insert); die;
			$new_id = $this->staff_schedule_model->InsertBatch('email_schedule',$insert);

			echo $this->showCalendar();
		 
		}
		
		public function shiftModal(){
			   
            $business_id = $this->input->post('business_id');			 
            $udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		    $data['business_id']= $this->input->post('business_id'); 
            echo $temp = $this->load->view('shiftmodal_view',$data);   
           			
        }
		
		
		public function timeoffModal(){
			   
            $business_id = $this->input->post('business_id');			 
            $udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		   $data['business_id']= $this->input->post('business_id'); 
		   //only for edit on calendar staffid
		   $data['staffid']=  $this->input->post('staffid'); 
		   $data['dates']=  $this->input->post('dates'); 
			
           echo $temp = $this->load->view('timeoffmodal_view',$data);   
           			
        }
		
		public function emailModal(){
			
			$business_id = $this->input->post('business_id');			 
            $udata1=array('id'=>$this->session->userdata('id'),'business_id'=>$business_id); 
            $data['staffName']=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
		 
		   $data['business_id']= $this->input->post('business_id'); 
		   //only for edit on calendar staffid
		  $data['staffid']=  $this->input->post('staffid'); 
		  $data['dates']=  $this->input->post('dates'); 
			
           echo $temp = $this->load->view('emailmodal_view',$data);   
           			
        }
		
		public function staffModal(){
			$data['business_id']= $this->input->post('business_id'); 
           echo $temp = $this->load->view('staffmodal_view',$data);   
           			
        }
		
		
		
		// add email preview 
		public function emailPreview(){
			$firstdate = $this->input->post('from');
			$lastdate = $this->input->post('to');
			$business_id = $this->input->post('business_id');
			$staff_id = $this->input->post('staff_id');
			$type = $this->input->post('option');
			
			for ($currentDate = strtotime($firstdate); $currentDate <= strtotime($lastdate); $currentDate += (86400)) { 
				$data['alldates'][] = date('m/d/Y', $currentDate);
			}
			//print_r($data['alldates']); die;	
			$date1 = $data['alldates'][0];
			$date7 = $data['alldates'][count($data['alldates'])-1];			
			//shift
			$where = 'business_id = '.$business_id;			
			$where .= ' AND shift_date >= "'.$date1.'" AND shift_date <= "'.$date7.'"  ';
			
			$shifts=$this->staff_schedule_model->SelectRecord('shift','*',$where,$orderby=array());			
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
			 
			
			$timeoffs=$this->staff_schedule_model->SelectRecord('timeoff','*',$wheret,$orderby=array());			
			
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
			 
			
			$comments=$this->staff_schedule_model->SelectRecord('comments','*',$wherec,$orderby=array());			
			
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
			 
			
			$breaks=$this->staff_schedule_model->SelectRecord('break','*',$whereb,$orderby=array());			
			
			$arrb = $this->group_by($breaks,'addbraek_date');
		     $finalArrayBreak = [];	
			foreach($arrb as $key=>$row){			
				$arrrb = $this->group_by($row,'user_id');
				$finalArrayBreak[$key] = $arrrb;//['date'=>$key,'userdata'=>$arrr];				
			}
			
			$data['finalArrayBreak'] = $finalArrayBreak;				
			
			$html = '<div class="table-responsive"><table border="1" style="border-collapse: collapse;"><tr><th>Names</th>';
			
			foreach($data['alldates'] as $key=>$val){
				$html .= '<th>'.$val.'</th>';
			}
			
			$html .= '</tr>';
			
			$html2 = ''; $staffArray = [];
			
			foreach($staff_id as $row){
				$udata1=array('id'=>$row); 
                $data1=$this->staff_schedule_model->SelectRecord('user','*',$udata1,$orderby=array());
				$html2 = '<tr><td>'.$data1[0]['first_name'].' '.$data1[0]['last_name'].'</td>';
				
				foreach($data['alldates'] as $key=>$val){
					$shifts = isset($finalArray[$val]) ? $finalArray[$val] : [];
					$timeoffs = isset($finalArrayTimeoff[$val]) ? $finalArrayTimeoff[$val] : []; 
					$comments = isset($finalArrayComment[$val]) ? $finalArrayComment[$val] : []; 
					$breaks = isset($finalArrayBreak[$val]) ? $finalArrayBreak[$val] : []; 
					$html2 .= '<td>';
                    if($shifts){
						foreach($shifts as $key1=>$valu){
							if($key1 == $row){
								foreach($valu as $v){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v['start_time'].'-'.$v['end_time'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					if($timeoffs){
						foreach($timeoffs as $key2=>$valu2){
							if($key2 == $row){
								foreach($valu2 as $v2){
									$html2 .= '<div style="word-break:break-word;border:1px solid #808080; padding:4px; text-align: center;">';
									$html2 .= ''.$v2['timeoff_type'].'';
								    $html2 .= '</br>';
									if($v2['start_time'] && $v2['end_time']){
									   $html2 .= ''.$v2['start_time'].'-'.$v2['end_time'].'';
									}
									else{
									$html2 .= 'Full day';
									}
									$html2 .= '</div>';
								}
							}
						
						}
					}
					if($comments){
						foreach($comments as $key3=>$valu3){
							if($key3 == $row){
								foreach($valu3 as $v3){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v3['comment'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					if($breaks){
						foreach($breaks as $key4=>$valu4){
							if($key4 == $row){
								foreach($valu4 as $v4){
								$html2 .='<div style="border: 1px solid #444444;padding: 5px;text-align: center;margin: 2px 0;">';
								$html2 .= ''.$v4['break'].'';
								$html2 .='</div>';
								}
							}
						
						}
					}
					
					
					$html2 .= '</td>';
				}
				$html2 .='</tr>';
				
				$staffArray[] = $html2;
				// if single option would be send
				if($type == 1){
					$data['body']=$this->input->post('body'); 
					$data['html']=$html.$html2.'</table></div>';
					$udata19=array('id'=>$row); 
                    $data['staffsel']=$this->staff_schedule_model->SelectRecord('user','*',$udata19,$orderby=array());
					
					echo $this->load->view('previewmodal_view',$data);
                }
			}
			
			foreach($staffArray as $staff){
				$html .= $staff;
			}			
			
			$html .= '</table></div>';
			// if option is  all
			if($type == 2){
				foreach ($staff_id as $staff_ids){
					$data['body']=$this->input->post('body'); 
					$data['html']=$html;
					$udata19=array('id'=>$staff_ids); 
                    $data['staffsel']=$this->staff_schedule_model->SelectRecord('user','*',$udata19,$orderby=array());
					echo $this->load->view('previewmodal_view',$data); 					
				}
			}	 
		//echo $this->showCalendar();
		 
		}
		
		
		
		public function addMultistaff(){
			//print_r($_POST); die;
			$id = $this->session->userdata('id');
			$business_id = $this->input->post('business_id');
			$data = array('first_name'=>$this->input->post('fnames'),
				'last_name'=>$this->input->post('lnames'),
				'email'=>$this->input->post('emails'),
				'phone_no'=>$this->input->post('phonenos'));
				
			 	
            foreach($data['first_name'] as $key => $da){
				 $insert=array(    
					'id'=>$id,			 
					'business_id'=>$business_id,			 
					'first_name'=>$da,
					'last_name'=>$data['last_name'][$key],
					'email'=>$data['email'][$key],
					'phone_no'=>$data['phone_no'][$key],
					'password'=>md5(12345),
					'status'=>1,
					'is_deleted'=>1
				);
				$new_id = $this->staff_schedule_model->insertstaff($insert); 
              				
            }
			if($new_id)
                {
                    echo 'User Added Successfully';
                }
                else{
                    echo 'Fail To Add User';
                }
			//$new_id = $this->staff_schedule_model->InsertBatch('user',$insert);
			  
			 
        }
		//shift delete
		public function shiftDelete(){
			$id= $this->input->post('shift_id'); 
			$dayvalue= $this->input->post('dayvalue'); 
			$new_id = $this->staff_schedule_model->delete_record('shift',array("id"=>$id)); 
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
         }
		 //time off delete
		 public function timeoffDelete(){
			$id= $this->input->post('timeoff_id'); 
			$dayvalue= $this->input->post('dayvalue'); 
			$new_id = $this->staff_schedule_model->delete_record('timeoff',array("id"=>$id)); 
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
         }
		 //comment delete
		 public function commentDelete(){
			 $dayvalue= $this->input->post('dayvalue'); 
			$id= $this->input->post('comment_id'); 
			$new_id = $this->staff_schedule_model->delete_record('comments',array("id"=>$id)); 
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
         }
		 //break delete
		 public function breakDelete(){
			 $dayvalue= $this->input->post('dayvalue'); 
			$id= $this->input->post('break_id'); 
			$new_id = $this->staff_schedule_model->delete_record('break',array("id"=>$id)); 
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			}
         }
		 //break delete
		 public function weekDelete(){
			$dayvalue= $this->input->post('dayvalue'); 
			$firstdate= $this->input->post('firstdate'); 
			$lastdate= date('m/d/Y', strtotime('+6 day', strtotime($firstdate)));
			$business_id= $this->input->post('business_id'); 
			
			$wheres = 'business_id = '.$business_id;			
			$wheres .= ' AND shift_date >= "'.$firstdate.'" AND shift_date <= "'.$lastdate.'"';
			
			$wherec = 'business_id = '.$business_id;			
			$wherec .= ' AND comment_date >= "'.$firstdate.'" AND comment_date <= "'.$lastdate.'"';
			
			$whereb = 'business_id = '.$business_id;			
			$whereb .= ' AND addbraek_date >= "'.$firstdate.'" AND addbraek_date <= "'.$lastdate.'"';
			
			$this->staff_schedule_model->delete_record('shift',$wheres); 
			$this->staff_schedule_model->delete_record('comments',$wherec); 
			$this->staff_schedule_model->delete_record('break',$whereb); 
			if($dayvalue == 2){
				echo $this->dayCalendar();
			  
			} 
			else
			{
				echo $this->showCalendar();
			} 
         }
		
        
                		        	
}
?>