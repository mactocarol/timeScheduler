<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller 
{
    //private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('my_helper');
            $page = '';
            if($this->session->userdata('user_group_id') == 3){
                redirect('user');
            }
        }
        public function index(){
			
            if($this->session->userdata('logged_in')){
                redirect('user/dashboard');
            }
		
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                //print_r($items); die;
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $data->return_url = isset($_GET['return']) ? $_GET['return'] : '' ;
            $data->title = "Login | ".$this->site_info()['site_title'];
            $this->load->view('login_view',$data);          
        }
		
		 public function changePassword()
        {    $data=new stdClass();        
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            } 
			$user_type = $this->session->userdata('user_type'); 
			//print_r($_SESSION); die;
			if($user_type == 3){
				redirect('calendar');
			}
         
			
			//$udata=array('admin_id'=>$this->session->userdata('id')); 
            //$data['businessList']=$this->user_model->SelectRecord('business','*',$udata=array(),'id asc');
			//print_r($data['businessList']); die;
			$this->load->view('admin/includes/header');
            $this->load->view('change_password'); 
            $this->load->view('admin/includes/footer');
        }
	    public function updatePasswords()
		{
			//echo "hi"; die;
			//$data=new stdClass();
			$this->form_validation->set_rules('current_password', 'current password', 'required');
			$this->form_validation->set_rules('new_password', 'new password', 'required');
			$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[new_password]');
			if ($this->form_validation->run() == FALSE)
		   {
			  $this->changePassword();
			//	$this->load->view('vendor/changepassword');
			//	$this->load->view('vendor/footer');
			}
			else
			 {
				$postData=$this->input->post();
					 //  print_r($postData); die;
				$udata = array("id"=>$this->session->userdata('id'));                
				$res=$this->user_model->getdatapsw('admin',$udata);
				//echo md5($postData['current_password']); 
				
				//echo  $res['password']; die;
				   if(md5($postData['current_password']) == $res['password'])
				   {
					   
					   //echo 'hi'; die;
						 $new_password=  md5($postData['new_password']);
						// print_r($new_password); die;
						$data=$this->user_model->UpdateRecord('admin',array('password'=>$new_password),array("id"=>$this->session->userdata('id')));
						 
					//success           
				   $this->session->set_flashdata('message','password change successfully');
				   $this->changePassword();
					 
				   }else{

					   
					  $this->session->set_flashdata('message','current password is not matches');
					 //redirect('vendor/changepassword');
					 $this->changePassword();
				   }
		  
			  }
        }
        
        public function register(){
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->message=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }                                    
                                            
            if(!empty($_POST)){                               
                if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                     $data->error=1;
                     $data->success=0;
                     $data->message='This Email is Already Exists';
                     $this->session->set_flashdata('item',$data);
                     redirect('signup');
                } 
            
                    $key=md5 (uniqid());
                    //sending conformation mail to signup user                        
                    $to = $this->input->post('email');
                    $sub = "Confirm Your Account";                                                                  
        
                           $udata=array(                                            
                                'email'=>$this->input->post('email'),
                                'username'=>$this->input->post('username'),                                    
                                'password'=>md5($this->input->post('password')),
                                'user_type'=> '1',
                                'key'=> $key,                                    
                                'is_verified' => '1',
                            );
                                $new_id = $this->user_model->new_user($udata);
                                         
                                $message = "<a href='".base_url()."user/register_user/$key'>Click here</a>"." to confirm your account";                             
                                $this->email($to,$sub,$message);                                
                                
                                $data->error=0;
                                $data->success=1;
                                $data->message='You are successfully registered, please login to your account.';
                                $this->session->set_flashdata('item',$data);
                   
            }                                                             
           $data->title = "Register | ".$this->site_info()['site_title'];
           $this->load->view('register_view',$data);                
        }
        
        
        
        
        public function register_user($key){
            if(!empty($key)){                
                if ($this->user_model->is_key_valid($key))
                {
                    //$user = $this->user_model->UpdateRecord('users',array("status"=>'1'),array());
                    //$userdata = array("user_id"=>$user->parent_id,"child_id"=>$user->id);
                    //$this->user_model->InsertRecord('downline',$userdata);
                    $data= new stdClass();
                    $data->page_title = "Registration";
                    $data->page_text = "New User Registration!";
                    $data->page = "signup";
                    
                    $data->error=0;
                    $data->success=1;
                    $data->message='verified successfully, you can login now.';
                    $this->session->set_flashdata('item',$data);
                    //echo "<script>alert('verified successfully, you can login now.') </script>";
                    redirect('user');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid key.';
                    $this->session->set_flashdata('item',$data);
                    redirect('user/register');
                }
            }            
        }
        
        function check_username_exists()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
		
		
		function check_businessname_exists()
        {                
            if (array_key_exists('name',$_POST)) 
            {
                if ( $this->user_model->businessname_exists($this->input->post('name')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
		
		
		
		
        function check_username_exists1()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists_user($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_email_exists()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
		
		function check_businessemail_exists()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->bemail_exists($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
		
		function check_staffemail_exists()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->semail_exists($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
		
        function check_email_exists1()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->email_exists_user($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        //login
        public function login_check()
        {            
            $data=new stdClass();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');       
            if ($this->form_validation->run() == FALSE)
            {
                $data->error=1;
                $data->success=0;
                $data->message=validation_errors();
            }
            else
            {
                 $email = $this->security->xss_clean($this->input->post('email'));
                 $password = $this->security->xss_clean($this->input->post('password')); 
				 $user_type = $this->security->xss_clean($this->input->post('user_type')); 
				 
				 if($user_type == 1){
					$Selectdata = array('id','email','first_name','last_name','user_type');
					$udata = array("email"=>$email,"password"=>md5($password),"is_deleted"=>'1');                
					$result = $this->user_model->SelectSingleRecord('admin',$Selectdata,$udata,$orderby=array());
				 }
				else if($user_type == 3){
					$Selectdataa = array('id','email','first_name','last_name','user_type');
					$udata = array("email"=>$email,"password"=>md5($password),"is_deleted"=>'1');                
					$result = $this->user_model->SelectSingleRecord('user',$Selectdataa,$udata,$orderby=array());
					//echo "<pre>";
					 //print_r($result); die;
					}
					if($result)
					{
					  
                        $sess_array = array(
                        'id' => $result->id,
                        'email' => $result->email,
                        'first_name' => $result->first_name,
                        'user_type' => $result->user_type,	
                        'logged_in' => TRUE
                        //'accesss_level' => TRUE
                        );
                    
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        if($this->input->post('return_url')){ redirect(($this->input->post('return_url'))); }
						if($user_type == 1){
                        redirect('user/dashboard'); 
						}
						else if($user_type == 3){
							redirect('calendar');
						}
                     }
					else
					{
						$data->error=1;
						$data->success=0;
						$data->message='Invalid Email or Password.';
						
					}
            }
            $data->msg = 1;
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
        
        public function dashboard()
        {            
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            } 
			$user_type = $this->session->userdata('user_type'); 
			//print_r($_SESSION); die;
			if($user_type == 3){
				redirect('calendar');
			}
         
			
			$udata=array('admin_id'=>$this->session->userdata('id')); 
            $data['businessList']=$this->user_model->SelectRecord('business','*',$udata=array(),'id asc');
			//print_r($data['businessList']); die;
			$this->load->view('admin/includes/header');
            $this->load->view('dashboard_view',$data); 
            $this->load->view('admin/includes/footer');
        }
		
		
		
	
                
        public function bussinessUpdate()
        {            
            			
			 $update=array(    
					'name'=>$this->input->post('names'),			 
					'email'=>$this->input->post('emails'),
					'phone_no'=>$this->input->post('phone_nos')
				); 
			$this->user_model->UpdateRecord('business',$update,array("id"=>$this->input->post('business_ids')));
			
        }
       
        
        public function profile(){
            //print_r($this->session->userdata());die();
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            if($this->session->userdata('user_group_id') != 2){
                
            }
            $data=new stdClass();
            
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
           
            
            if($_POST){                                                
                
                $udata=array(                                            
                        'placeName'=>$this->input->post('placeName'),
                        'placeLat'=>$this->input->post('placeLat'),
                        'placeLong'=>$this->input->post('placeLong'),
                        
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('contact'),
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'shop_name'=>$this->input->post('shop_name'),
                        'dob'=>$this->input->post('dob'),                        
                        'address'=>$this->input->post('address'),
                        'country'=>$this->input->post('country'),
                        'zip_code'=>$this->input->post('zip_code')                        
                        );
                    
                    if($this->input->post('password') != ''){
                        $udata=array(                                            
                        'placeName'=>$this->input->post('placeName'),
                        'placeLat'=>$this->input->post('placeLat'),
                        'placeLong'=>$this->input->post('placeLong'),
                        
                        'email'=>$this->input->post('email'),                        
                        'phone'=>$this->input->post('contact'),                        
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'shop_name'=>$this->input->post('shop_name'),
                        'dob'=>$this->input->post('dob'),                        
                        'address'=>$this->input->post('address'),                        
                        'country'=>$this->input->post('country'),
                        'zip_code'=>$this->input->post('zip_code'),
                        'password'=>md5($this->input->post('password'))
                        );
                    }
                    //echo '<pre>';
                    //print_r($udata); die;
                if ($this->user_model->UpdateRecord('users',$udata,array("id"=>$this->session->userdata('user_id'))))
                {
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile Update Sucessfully.';
                                        
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($this->db->last_query()); die;
            $this->session->set_flashdata('item',$data);
            //redirect('user/profile');
            //print_r($this->session->flashdata('item')); die;  
            }                        
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';                
            $this->load->view('profile_view',$data);            
        }
        
        
        public function upload_image(){
            
            $data=new stdClass();
            
            //$data = $_POST['image'];
            //
            //list($type, $data) = explode(';', $data);
            //list(, $data)      = explode(',', $data);
            //
            //$data = base64_decode($data);
            //$imageName = uniqid().time().'.png';
            //file_put_contents('./upload/profile_image/thumb/'.$imageName, $data);
            //
            //$userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());
            //if($userpic->image != 'no_image.jpg'){
            //    unlink('./upload/profile_image/thumb/'.$userpic->image);    
            //}            
            //
            //$this->user_model->UpdateRecord('users',array("image"=>$imageName),array("id"=>$this->session->userdata('user_id')));
            //
            //echo 'done';
            
            if($_FILES){
                
                $config=[   'upload_path'   =>'./upload/profile_image/',
                        'allowed_types' =>'jpg|gif|png|jpeg',
                        'file_name' => strtotime(date('y-m-d h:i:s')).$_FILES["profile_pic"]['name']
                    ];
                //print_r($_FILES); die;
                $this->load->library ('upload',$config);
                
                if ($this->upload->do_upload('profile_pic'))
                {
                    $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());                                        
                    unlink('./upload/profile_image/'.$userpic->image);
                    unlink('./upload/profile_image/thumb/'.$userpic->image);
                    $udata = $this->upload->data();
                    //resize profile image
                                    $config10['image_library'] = 'gd2';
                                    $config10['source_image'] = $udata['full_path'];
                                    $config10['new_image'] = './upload/profile_image/thumb/'.$udata['file_name'];
                                    $config10['maintain_ratio'] = TRUE;
                                    $config10['width']         = 200;
                                    $config10['height']       = 200;
                                    
                                    $this->load->library('image_lib', $config10);
                                    
                                    $this->image_lib->resize();
                    //print_r($udata); die;
                    $image_path= $udata['file_name']; 
                    $this->user_model->UpdateRecord('users',array("image"=>$image_path),array("id"=>$this->session->userdata('user_id')));
                    $data->error=0;
                    $data->success=1;
                    $data->message='Uploaded Successfully'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('user/profile');   
                }
                else
                {
                    //print_r($this->upload->display_errors()); die;
                    $data->error=1;
                    $data->success=0;
                    $data->message='Only jpeg/png/gif/jpg allowed!'; 
                    $this->session->set_flashdata('item', $data);
                    //redirect('user/profile'); 
                }
            }
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';                
            $this->load->view('profile_view',$data);

        }
        
        public function cover_image(){
            
            $data=new stdClass();
            
            $data = $_POST['image'];

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            $data = base64_decode($data);
            $imageName = uniqid().time().'.png';
            file_put_contents('./upload/cover_image/'.$imageName, $data);
            
            $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());
            if($userpic->cover_image != 'bgprofile.png'){
                unlink('./upload/cover_image/'.$userpic->cover_image);    
            }
            
            
            $this->user_model->UpdateRecord('users',array("cover_image"=>$imageName),array("id"=>$this->session->userdata('user_id')));
            
            echo 'done';            

        }
        
        public function logout()
        {
            $data=new stdClass();
            if($this->session->userdata('logged_in')){
                $this->session->sess_destroy();    
            }
            
            $data->error=0;
            $data->success=1;
            $data->message='Logged Out Successfully';
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
            
        public function update_notification($id){
            if($this->session->userdata('user_group_id') != 2){
                redirect('user');
            }
            $data=new stdClass();
                $udata = array("id"=>$id);                
                $url = $this->user_model->SelectSingleRecord('notifications','*',$udata,$orderby=array());        
                if ($this->user_model->UpdateRecord('notifications',array("status"=>1),array("id"=>$id)))
                {                                                           
                }else{
                    
                }
            redirect(site_url().''.$url->url);
            
        }

        function vendor_services(){
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            $servicesArr = array();

            //echo "<pre>";
            //print_r($data);die();

            foreach ($services as $key => $value) {
                $where = array("id"=>$value);     
                $oneArr = $this->user_model->SelectSingleRecord('category','*',$where,$orderby=array());

                $where1['userId'] = $this->session->userdata('user_id');
                $where1['userServicesId'] = $value;
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where1,$orderby=array());
                if(isset($data) && !empty($data)){
                    $oneArr->price = $data->price;
                    $oneArr->weekPrice = $data->weekPrice;
                    $oneArr->monthPrice = $data->monthPrice;
                    $oneArr->yearPrice = $data->yearPrice;
                }else{
                    $oneArr->price = '';
                    $oneArr->weekPrice = '';
                    $oneArr->monthPrice = '';
                    $oneArr->yearPrice = '';
                }
                
                $servicesArr['servicesArr'][] = $oneArr;
            }
            //echo '<pre>';
            //print_r($servicesArr);die();
            $this->load->view('vendor_services',$servicesArr);  
        }

        function add_price(){
            $postData = $this->input->post();
            if($postData['price'] != 0){
                $where['userId'] = $this->session->userdata('user_id');
                $where['userServicesId'] = $postData['id'];
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
                if(empty($data)){
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->InsertRecord('vendor_services_price',$insert);
                }else{
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->UpdateRecord('vendor_services_price',$insert,$where);
                }
            }
        }

        function add_vendor_services(){
            $categories = $this->user_model->SelectRecord('category','*',array("level"=>0,"status"=>'1',"is_deleted"=>"0"),'id asc');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            foreach($categories as $key => $value){
                $subcategories = $this->user_model->SelectRecord('category','*',array("parent_id"=>$value['id'],"status"=>'1',"is_deleted"=>"0"),'id asc');
                $isAdded = 0;

                if (in_array($value['id'], $services)){ 
                    $isAdded = 1;
                }


                foreach ($subcategories as $key1 => $value) {
                    $subcategories[$key1]['isAdded'] = 0;
                    if (in_array($value['id'], $services)){ 
                        $subcategories[$key1]['isAdded'] = 1;
                        $isAdded = 1;
                    } 
                }
                $categories[$key]['isAdded'] = $isAdded;
                $categories[$key]['subcategories'] = $subcategories;
            }
            
            //echo '<pre>';
            //print_r($categories);
            $this->load->view('add_vendor_services',array('categories' => $categories,'sellerid'=>$this->session->userdata('user_id')));
        }

        function update_vendor_services(){

            $category = $this->input->post('category');
            $subcategory = $this->input->post('subcategory');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));
            
            $update = array(
               'services' =>  json_encode(array_merge($category,$subcategory)),
               'services_search' => implode(",",array_merge($category,$subcategory))
            );
            
            // [vendor_id] => 16 [services] => ["electronics","fashionservices","Beauty"] [services_search]
            
            $d = $this->db->get_where('vendor_services',array())->result_array();
            //print_r($d);die();
            foreach($d as $f){
                $this->db->where(array('vendor_id' => $f['vendor_id']));
                $this->db->update('vendor_services',array('services_search' => implode(",",json_decode($f['services'])) ));
            }
            
            //print_r($this->db->last_query());die();
            
            $this->user_model->UpdateRecord('vendor_services',$update,$where);         
            redirect('user/vendor_services');

            /*$data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            if(!empty($data)){
                $this->user_model->UpdateRecord('vendor_services',$update,$where); 
            }else{
                $this->user_model->UpdateRecord('vendor_services',$update,$where);
                $this->user_model->InsertRecord('vendor_services',$udata);
            }*/
            
        }

        function social_login(){
            $postData = $this->input->post();
            //print_r($postData); die;
            $where = array(
                'social_id !=' => Null,
                'social_id' => $postData['socialId'],
                'social_type' => $postData['socialType'],
            );

            $data = $this->user_model->SelectSingleRecord('users','*',$where,$orderby=array());

            if(empty($data)){
                $insert = array(                                            
                    'f_name' => $postData['firstName'],
                    'l_name' => $postData['lastName'],
                    'email' => $postData['email'],
                    'username' => $postData['fullName'],
                    'password' => md5(rand()),
                    'image' => $postData['image'],
                    'user_type' => '1',
                    'is_verified' => '1',
                    'social_id' => $postData['socialId'],
                    'social_type' => $postData['socialType'],
                );
                //print_r($insert); die;
                $new_id = $this->user_model->new_user($insert);

                $sess_array = array(
                    'user_id' => $new_id,
                    'email' => $postData['email'],
                    'image' => $postData['image'],
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard'); 

            }else{
                //print_r($data); die;
                $sess_array = array(
                    'user_id' => $data->id,
                    'email' => $data->email,
                    'image' => $data->image,
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard');
            }

        }

    function reviewRating(){
        $postData = $this->input->post();
        

        $review = trim($this->input->post('review_text'));
        $rating = trim($this->input->post('rating'));
        $orderId = $redirectId = trim($this->input->post('orderId'));

        if($review == '' || $review == '' || $review == ''){
            $data->error=1;
            $data->success=0;
            $data->message='Please Fill Review Rating.'; 
            $this->session->set_flashdata('item', $data);
            redirect('user/orderDetail/'.$redirectId);
        }else{
            $orderId = base64_decode($orderId);
            $data = $this->user_model->SelectSingleRecord('order_detail','*',array('order_id' => $orderId),$orderby=array());
            $inserData = array(
                'senderId' => $this->session->userdata('user_id'),
                'receiverId' => $data->vendor_id,
                'orderId' => $orderId,
                'review' => $review,
                'rating' => $rating,
            );

            $this->user_model->InsertRecord('review',$inserData);
            $this->user_model->UpdateRecord('order_detail',array('review_status' => 'sent'),array('order_id' => $orderId));

            $data->error=0;
            $data->success=1;
            $data->message='Rating Successfully Done.'; 
            $this->session->set_flashdata('item', $data);
            redirect('user/orderDetail/'.$redirectId);
        }

    }

    function updatePrice($id){
        $id = base64_decode($id);
        $where = array(
            "userId" => $this->session->userdata('user_id'),
            "userServicesId" => $id
        );
        $data=new stdClass();
        if(isset($_POST) && !empty($_POST)){
            $price = $this->input->post('price');
            $weekPrice = $this->input->post('weekPrice');
            $monthPrice = $this->input->post('monthPrice');
            $yearPrice = $this->input->post('yearPrice');
            if(!empty($price) || !empty($weekPrice) || !empty($monthPrice) || !empty($yearPrice)){
                
                $check = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
                if(isset($check) && !empty($check)){
                    $this->user_model->UpdateRecord('vendor_services_price',$_POST,$where);
                }else{
                    $this->user_model->InsertRecord('vendor_services_price',$where);
                    $this->user_model->UpdateRecord('vendor_services_price',$_POST,$where);
                }
                
                $data->error = 0;
                $data->success = 1;
                $data->message ='price add / update successfully.';
            }else{
                $data->error = 1;
                $data->success = 0;
                $data->message ='Something going wrong';
            }
        }

        $data->newId = $id;

        $data->data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
        $this->load->view('updatePrice',$data);
    }

    function forgotPassword(){
        

        $this->load->view('forgotPassword');
    }
	
	
    
    function updatePassword($key){
        $data = new stdClass();

        if(isset($_POST) && !empty($_POST)){
            $this->user_model->UpdateRecord('users',array('password'=>md5($_POST['nPassword'])),array('id'=>$_POST['id']));
            $data->error=0;
            $data->success=1;
            $data->message='Please login with your new password';
            $this->session->set_flashdata('item',$data);
            redirect('user/');
        }

        $data->userDetail = $this->user_model->SelectSingleRecord('users','*',array('key'=>$key),$orderby=array());
        if(!isset($data->userDetail) && empty($data->userDetail)){
            $data->error=1;
            $data->success=0;
            $data->message='The password reset link is no longer valid. Please request another password reset email';
            $this->session->set_flashdata('item',$data);
            redirect('user/forgotPassword');
        }

        $this->user_model->UpdateRecord('users',array('key'=>md5(rand())),array('key'=>$key));
        $this->load->view('updatePassword',$data);

    }

    function changePaymentStatus(){
        $postData = $this->input->post();
        $requestId = $postData['id'];
        
        $data = $this->user_model->SelectSingleRecord('order_detail','*',array('id'=>$requestId),$orderby=array());

        $cardAccount['cardToken'] = 'NA';
        $cardAccount['cardType'] = 'NA';
        $cardAccount['custId'] = 'NA';
        $cardAccount['custEmail'] = 'NA';
        $cardAccount['refundedId'] = 'NA';
        $cardAccount['transactionId'] = 'NA';


        $cardAccount['requestId'] = $data->order_id;
        $cardAccount['mainPrice'] = $data->amount*100;
        $cardAccount['discountPresent'] = 0;
        $cardAccount['price'] = $data->amount*100;
        $cardAccount['userId'] = $this->session->userdata('user_id');
        
        //print_r($cardAccount); die;
        $this->db->insert('payment',$cardAccount);

        $this->db->where(array('order_id' => $data->order_id));
        $this->db->update('order_detail',array('payment_status' => 'paid'));

    }
	
	
	 //break delete
		 public function deleteBussines(){
			$id= $this->input->post('business_id'); 
			$new_id = $this->user_model->delete_record('business',array("id"=>$id)); 
			
         }

}
?>