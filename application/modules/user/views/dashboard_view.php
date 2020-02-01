       <!-- Begin Page Content -->
        <div class="container-fluid" id="mainbodyh">
          <!-- alert message 
			<div class="alert alert-dismissible alert-success" id="message">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<div class="msg"></div>
			</div>
			<!-- alert message -->
          <!-- Page Heading -->
          <div class="heading_select">
            <h1>Select your business</h1>
          </div>
          <!-- Content Row -->
          <div class="content_back">
            <div class="row">
			
               <!-- Earnings (Monthly) Card Example -->
			<?php if(!empty($businessList)){ 
			        foreach ($businessList as $key => $value) { ?>
					<div class="col-xl-3 col-md-6 mb-4">
					  <div class="card border-left-primary h-100 py-2 create_bus">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"><?php echo $value['name']; ?></div>
							</div>
						  </div>
						</div>
						 <div class="bus_block">
						  <span class="info_menu_icon"><i class="fas fa-ellipsis-v"></i></span>
						  <div class="info_nav">
							<ul>
							  <li><a href="#" id="editinfo" data-busid="<?= $value['id']; ?>"  data-name="<?= $value['name']; ?>" data-email="<?= $value['email']; ?>" data-phone_no="<?= $value['phone_no']; ?>">Edit Information</a></li>
							  <li><a href="#" data-toggle="modal" data-target="#clear_businees_modal" onclick="delmod(<?php echo $value['id']; ?>)">Delete</a></li>
							</ul>
						  </div>
						  <input type="hidden" id="business_name" name="business_name" value="<?php echo $value['name']; ?>">
						   <input type="hidden" id="business_id" name="business_id" value="<?php echo $value['id']; ?>">
						   
						  <a  onclick="openSchedule('<?php echo site_url('schedule/openSchedule/'.$value['name'].'/'.$value['id']);?>')" class="open_btn">Open Schedule</a>
						  <!-- <button type="button" class="open_btn" id="openSchedule" onclick="openSchedule('<?php //echo site_url('schedule/openSchedule/'.$value['name'].'/'.$value['id']);?>')">Open Schedule</button>-->
						</div>
					  </div>
					</div>
            <?php } 
			}?>
			
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success box_sad h-100 py-2" data-toggle="modal" data-target="#addBusiness">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="font-weight-bold text-success text-uppercase mb-1">Add New Business</div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            </div>
           
          </div>
        </div>
        <!-- /.container-fluid -->
<div class="modal" id="openschedule">
		<div class="modal-dialog">
			  <div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header custom_modal">
				  <h4 class="modal-title">Select Scheduling System</h4>
				 <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				</div>

				<!-- Modal body -->
				<?php if(!empty($businessList)){ 
			        foreach ($businessList as $key => $value) { ?>
				<div class="modal-body">
					
				 <div class="software_btn">
				   <h2><?php echo $value['name']; ?></h2>
				  <button class="crate_shift_btn"> <a  onclick="openSchedule('<?php echo site_url('schedule/openSchedule/'.$value['name'].'/'.$value['id']);?>')" class="open_btn">Open Schedule</a></button>
						  
				   <!--<button class="crate_shift_btn">Open Scheduling</button>-->
				 </div>
					
				</div>
              <?php } }?>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#demo">
					<span class="icon text-white-50">
					  <i class="fas fa-arrow-right"></i>
					</span>
					<span class="text"  data-toggle="modal" data-target="#addBusiness">New Business</span>
				  </a>
				  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
				</div>
				
			</div>
		</div>
    </div>
<!-- The addBusiness Modal -->
<div class="modal" id="addBusiness">
	<div class="modal-dialog">
	  <div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header custom_modal">
		  <h4 class="modal-title">Create New Business</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<form id="registerform" class="form-horizontal form-material">
		<div class="modal-body create_frm">
		 
		  <div class="form-group">
			  <label for="name">Name</label>
			  <input type="text" class="form-control" placeholder="Business Name" id="name" name="name"  required="">
		  </div>
		  <div class="form-group">
			<label for="email">Email Address</label>
			<input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required="" >
		  </div>
		  <div class="form-group">
			<label for="number">Phone Number(Optional)</label>
			<input type="text" class="form-control" placeholder="Phone Number" id="phone_no" name="phone_no" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
		  </div>
		
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
		  <button type="submit" class="btn btn-secondary btn-icon-split" id="addbusiness" disabled="disabled">
			<span class="icon text-white-50">
			  <i class="fas fa-arrow-right"></i>
			</span>
			<span class="text">Add</span>
		  </button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</div>
	 </form>
	  </div>
	</div>
</div>


<!-- The edit Modal -->
<div class="modal" id="editBusiness">
	<div class="modal-dialog">
	  <div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header custom_modal">
		  <h4 class="modal-title">Edit info Business</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<form id="" class="form-horizontal form-material">
		<div class="modal-body create_frm">
		 
		  <div class="form-group">
			  <label for="name">Name</label>
			  <input type="hidden" id="business_ids">
			  <input type="text" class="form-control" placeholder="Business Name" id="names" name="name"  required="">
		  </div>
		  <div class="form-group">
			<label for="email">Email Address</label>
			<input type="email" class="form-control" placeholder="Enter email" id="emails" name="email" required="" >
		  </div>
		  <div class="form-group">
			<label for="number">Phone Number(Optional)</label>
			<input type="text" class="form-control" placeholder="Phone Number" id="phone_nos" name="phone_no" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
		  </div>
		
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
		  <button type="submit" class="btn btn-secondary btn-icon-split" id="updatebusiness">
			<span class="icon text-white-50">
			  <i class="fas fa-arrow-right"></i>
			</span>
			<span class="text">Update</span>
		  </button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		</div>
	 </form>
	  </div>
	</div>
</div>
 <!-- clear busineess modal -->
    <div class="modal" id="clear_businees_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Delete Business</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body clear_schedule_form">
             <form class="my_common_form">
                <p>Are you sure you want to delete this business?</p>
                <div class="button_groups">
				<input type="hidden" id="businessids">
                  <button type="button" class="site_button" id="delbus">Delete</button>
                  <button type="button" class="site_button" data-dismiss="modal">cancel</button>
                </div>
             </form>
            </div>
          </div>
        </div>
      </div>
    <!-- clear busineess modal -->
<script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
  <!-- validation and add business by ajax -->
  <script>
  $(document).on('click','#delbus', function(){
		var business_id = $('#businessids').val();
		//alert(business_id);
		 $.ajax({
			 url: "<?php echo site_url();?>user/deleteBussines",
			type:'post',
			data:{business_id: business_id},
			success: function(response){
				$("#clear_businees_modal").hide();
				window.location.href = '<?php echo site_url('user/dashboard'); ?>';
			}
		}); 
    });
  
	
	function delmod(id){
		$('#businessids').val(id);
		
	}
	
	// edit timeoff modal 
	$(document).on('click','#editinfo', function(e){
		//alert('hiii');
		e.preventDefault();
		
		var business_id = $(this).data('busid');
		var name = $(this).data('name');
		var email = $(this).data('email');
		var phone_no = $(this).data('phone_no');
		$('#business_ids').val(business_id);
		$('#names').val(name);
		$('#emails').val(email);
		$('#phone_nos').val(phone_no);
		//alert(business_id);
		//alert(name);
		//alert(email);
		//alert(phone_no);
		$('#editBusiness').modal('show');
		
    });
	
	$(document).on('click','#updatebusiness', function(e){
		e.preventDefault();
		var business_ids = $('#business_ids').val();
		var names = $('#names').val();
		var emails = $('#emails').val();
		var phone_nos = $('#phone_nos').val();
		
		$.ajax({
			 url: "<?php echo site_url();?>user/bussinessUpdate",
			type:'post',
			data:{business_ids: business_ids,names: names,emails: emails,phone_nos: phone_nos},
			success: function(response){
				$("#editBusiness").hide();
				window.location.href = '<?php echo site_url('user/dashboard'); ?>';
				
			}
		});
    });
	/* function editmod(id){
		
		var business_id = id;
		//alert(business_id);
		 $.ajax({
			 url: "<?php echo site_url();?>user/dashboard",
			type:'post',
			data:{business_id: business_id},
			success: function(response){
			alert(response);
			
			}
		});
	} */
	
	
	function openSchedule(mainUrl){
		
		var business_name = $('#business_name').val();
		var business_id = $('#business_id').val();
		if(localStorage.getItem("startDate"))
		{
			var datee = localStorage.getItem("startDate");
			var date = new Date(datee);
			//console.log(datee);
			var firstdate = (date.getMonth()+1)+'/'+(date.getDate())+'/'+(date.getFullYear());	
		}
		else{
			var firstdate = '';
		}
		 $.ajax({
			 url: "<?php echo site_url();?>schedule/setDate",
			type:'post',
			data:{business_name: business_name,business_id: business_id,firstdate: firstdate},
			success: function(response){
				$("#mainbodyh").html(response);
				window.location.href = mainUrl;
				
			}
		});
	}
    //});
	
	
	
    $(document).ready(function() { 
     $('#message').hide();	
        $('#registerform').bootstrapValidator({            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message : 'The Business name Field is required'
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_businessname_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 name: validator.getFieldElements('name').val()
                                 };
                            },
                         message: 'This Business name is already in use.'     
                         },
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The Business name length min 3 and max 15 character Long'
                        }
                    },
                },                
              
                email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required'
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_businessemail_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },    
                
                
            }
        });
    
    });
        
    function isUsernameValid(value)
    {
      var fieldNum = /^[a-z0-9]+$/i;
    
      if ((value.match(fieldNum))) {
          return true
      }
      else
      {
          return false
      }
    
    }
	
	
	
	$(document).on('click','#addbusiness', function(e){
		//alert('hi');
		e.preventDefault();
		
				
		var name = $('#name').val();
		var email = $('#email').val();
		var phone_no = $('#phone_no').val();
		
		if(name == ""){
			$('#addbusiness').prop('disabled', true);
			return false;
			
		}
		if(email == ""){
			$('#addbusiness').prop('disabled', true);
			return false;
		} 
	
		$.ajax({
			 url: "<?php echo site_url();?>schedule/addBusiness",
			type:'post',
			data:{name: name,email: email, phone_no: phone_no},
			success: function(response){
				//alert(response);
				$('#addBusiness').modal('hide');
				
				if(response==1){
					$("#mainbodyh").text("");					
				}
				else
				{
					$("#mainbodyh").html(response);
					location.reload();
					//$('#message').show();
				     //$('#message .msg').html("Business Added Successfully");
				} 
			}
		});
    });
    </script>
  <!-- calender start -->