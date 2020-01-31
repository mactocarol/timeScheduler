 <script src="<?php echo base_url();?>/assets/js/custom_script.js"></script> 
<!-- add satff modal -->
<div class="modal express_modal" id="addstaffmod">
<div class="modal-dialog">
  <div class="modal-content">
	<!-- Modal Header -->
	<div class="modal-header custom_modal">
	  <h4 class="modal-title">Add Staff Member</h4>
      <span><a href="#" data-toggle="modal" data-target="#multiple_staff_modal">Add Multiple Staff</a></span>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
    <form class="my_common_form" id="staffform">
	<!-- Modal body -->
	<div class="modal-body create_frm">
	 
	  <div class="form-group">
		  <label for="name">First Name</label>
		  <input type="text" class="form-control" placeholder="John" id="fname" name="fname" required="">
	  </div>
	  <div class="form-group">
		  <label for="name">Last Name</label>
		  <input type="text" class="form-control" placeholder="Smith" id="lname" name="lname" required="">
	  </div>
	  <div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" placeholder="example123@gmail.com" id="email" name="email" required="">
	  </div>
	  <div class="form-group">
		<label for="number">Phone Number</label>
		<input type="text" class="form-control" placeholder="+91-98765-43210" id="phone_no" name="phone_no" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
		<input type="hidden" id="business_id" value="<?php echo $business_id; ?>">
	  </div>
	 
	</div>

	<!-- Modal footer -->
	<div class="modal-footer">
	  <button type="submit" class="btn btn-secondary btn-icon-split" id="addstaffbutton" disabled="disabled">
		<span class="icon text-white-50">
		  <i class="fas fa-arrow-right"></i>
		</span>
		<span class="text">Add Staff</span>
	  </button>
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	</div>
	</form>
  </div>
</div>
</div>
<!-- modal add satff -->


 <!-- Multiple staff modal -->
      <div class="modal express_modal" id="multiple_staff_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Multiple Staff Member</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body create_frm">
             <form class="my_common_form" id="multistaffform">
			 <input type="hidden" id="business_id"  name="business_id" value="<?php echo $business_id; ?>">
				<div class="append_staff_row">
				  <div class="staffs_row">
					<div class="form-group">
					  <label for="name">First Name</label>
					  <input type="text" class="form-control" placeholder="John" id="fname" name="fnames[]" required="">
					</div>
					<div class="form-group">
					  <label for="name">Last Name</label>
					  <input type="text" class="form-control" placeholder="Smith" id="lname" name="lnames[]" required="">
					</div>
					<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" placeholder="example123@gmail.com" id="email" name="emails[]" required="">
					</div>
					<div class="form-group">
					<label for="number">Phone Number</label>
					<input type="text" class="form-control" placeholder="+91-98765-43210" id="phone_no" name="phonenos[]" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
					
					</div>
				  </div>
				</div>
				<div class="form_footer">
					<button type="button" class="btn btn-secondary add_mlt_staff">Add More</button>
					<button type="submit" class="btn btn-secondary save_staff"  id="addmultistaff" >Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				  </div>
             </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Multiple staff modal -->
 <script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>	  
<script>
$(document).ready(function() { 
      
        $('#staffform').bootstrapValidator({ 
	   
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                               
                fname: {
						validators: {
							notEmpty: {
								message: 'The First name Field is required'
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
                            message: 'The First name length min 3 and max 15 character Long'
                        }
					},
				},	
				
				
				
				lname: {
						validators: {
							notEmpty: {
								message: 'The Last name Field is required'
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
                            message: 'The Last name length min 3 and max 15 character Long'
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
                         url: "<?php echo site_url();?>user/check_staffemail_exists",
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


</script>	