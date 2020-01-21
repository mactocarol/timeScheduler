 
<script src="<?php echo base_url();?>/assets/js/custom_script.js"></script>
 <!-- add shift modal -->
    <div class="modal express_modal" id="addshiftmod">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header custom_modal">
            <h4 class="modal-title">Create Shift</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form class="my_common_form" id="shiftform" method="POST">
          <!-- Modal body -->
          <div class="modal-body adshi_modal">
          
            <div class="form-group">
              <p>Staff Member</p>
              <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check">All Staff
                  <input type="checkbox" value="all staff" name="staff_check" class="all_checked" >
                  <span class="checkmark"></span>
                </label>
				<?php if(!empty($staffName))
				    { 
			            foreach ($staffName as $key => $value) 
						{ ?>
							<label class="custom_check"><?php echo $value['first_name']." ".$value['last_name']; ?> 
							  <input type="checkbox" value="<?php echo $value['id'];?> " name="staff_id[]" class="check_inputs" id="staff_id">
							  <span class="checkmark"></span>
							</label>
				  <?php } 
				    }?>
              </div>
              <!-- check boxs -->
            </div>
            <div class="form-group">
              <label for="date">Shift Date</label>
              <input type="text" class="form-control date_picker" id="date" name="date" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="number">Start Time</label>
              <input type="text" name="start_time" class="form-control start_time time_picker" placeholder="09:00 am" id="start_time" name="start_time" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="number">End Time</label>
              <input type="text" name="end_time" class="form-control end_time time_picker" placeholder="05:00 pm" id="end_time" name="end_time" autocomplete="off">
			  <input type="hidden" id="business_id" name="business_id" value="<?php echo $business_id; ?>">
			   <input type="hidden" name="firstdate" class="firstdate">
            </div>
            <small>Total Hour 8</small>
           
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary btn-icon-split" id="addshiftbutton">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Create Shift</span>
            </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
		  </form>
        </div>
      </div>
    </div>
  <!-- add shift modal -->

  <!--  <script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>	  
  validation and add shift by ajax
  <script>
     $(document).ready(function() {        
        $('#shiftform').bootstrapValidator({            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              /*    staff_check: {
                    validators: {
                        notEmpty: {
                            message: 'Please select staff'
                        },
                    }
                }, */
				
                date: {
						validators: {
                        notEmpty: {
                            message: 'Please select date'
                        },
                    }
				},	
				
				 start_time: {
						validators: {
                        notEmpty: {
                            message: 'Please select start time'
                        },
                    }
				},
				
				end_time: {
						validators: {
                        notEmpty: {
                            message: 'Please select end time'
                        },
                    }
				},
				
                
            }
        });
    
    });  
        
  </script>  -->