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
							  <li data-toggle="modal" data-target="#infoDetail"><a href="#">Edit Information</a></li>
							  <li><a href="#">Delete</a></li>
							</ul>
						  </div>
						
						  <a href="<?php echo site_url('schedule/openSchedule/'.$value['name'].'/'.$value['id']);?>" class="open_btn">Open Schedule</a>
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
		  <input type="text" class="form-control" placeholder="Business Name" id="name" name="name" required="">
	  </div>
	  <div class="form-group">
		<label for="email">Email Address</label>
		<input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required="">
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
		<span class="text">Create Business</span>
	  </button>
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	</div>
 </form>
  </div>
</div>
</div>
<script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
  <!-- validation and add business by ajax -->
  <script>
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