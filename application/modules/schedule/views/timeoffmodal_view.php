<script src="<?php echo base_url();?>/assets/js/custom_script.js"></script>
<script>//============== all checkbox checked on click ===============//
	$('.all_checkeds').change(function(){
		if ($(this).is(":checked")) {
			$(this).parents(".check_boxs").addClass("checked");
			$(".check_boxs.checked .custom_check input").prop('checked', true);
			$("#exampleFormControlSelect1").val('Public Holiday'); 	 
            //$(".staffdis").attr("disabled", true);  				
			}
		else{
			$(this).parents(".check_boxs").removeClass("checked");
			$(".custom_check input").prop('checked', false);
			$("#exampleFormControlSelect1").val('Vacation'); 
			//$(".staffdis").attr("disabled", false);  
		}
	});
	
	//============== append add shift field on click ===============//
</script>
 <!-- add time Modal -->
      <div class="modal express_modal" id="addtimemod">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Time Off</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
           <form class="my_common_form" method="POST" id="timeoffform">
            <!-- Modal body -->
            <div class="modal-body adshi_modal">
            
              <div class="form-group">
                <p>Staff Member</p>
                 <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check"> Everyone (Public Holiday)
                  <input type="checkbox" value="all staff" name="staff_check" class="all_checkeds" >
                  <span class="checkmark"></span>
                </label>
				<?php if(!empty($staffName))
				    { 
			            foreach ($staffName as $key => $value) 
						{ ?>
							<label class="custom_check" ><?php echo $value['first_name']." ".$value['last_name']; ?> 
							  <input type="checkbox" class="staffdis" value="<?php echo $value['id'];?> " name="staff_id[]" class="check_inputs" id="staff_id">
							  <span class="checkmark"></span>
							</label>
				  <?php } 
				    }?>
              </div>
              <!-- check boxs -->
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Type of Time off</label>
                <select class="form-control fff" id="exampleFormControlSelect1" name="timeoff_type">
				<option value="Vacation">Vacation</option>
				 <option value="Public Holiday">Public Holiday</option>
                  <option value="LOA">LOA</option>
                  <option value="Maternity">Maternity</option>
                  <option value="Personal">Personal</option>
                  <option value="RDO">RDO</option>
                  <option value="Sick Leave">Sick Leave</option>
                  <option value="Training">Training</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
			  
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Notes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notes" id="notes"></textarea>
              </div>
              <div class="form-group">
                <label for="date">First day off</label>
                <input type="text" class="form-control" id="first_dayoff" name="first_dayoff" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="date">Last day off</label>
                <input type="text" class="form-control" id="last_dayoff" name="last_dayoff" autocomplete="off">
              </div>
            <div class="form-group">
                <label class="custom_check">Time Range
                  <input type="checkbox" value="time_range" name="timerange" class="time_range_check">
                  <span class="checkmark"></span>
                </label>
            </div>
          <div class="form-group">
          <label for="number">Start Time</label>
          <input type="text" name="start_time" class="form-control start_time time_picker time_range_inpt"  autocomplete="off" placeholder="09:00 am" disabled="">
			</div>
			<div class="form-group">
			  <label for="number">End Time</label>
			  <input type="text" name="end_time" class="form-control end_time time_picker time_range_inpt"  autocomplete="off" placeholder="05:00 pm" disabled="">
			 <input type="hidden" id="business_id" name="business_id" value="<?php echo $business_id; ?>">
			 <input type="hidden" name="firstdate" class="firstdate">
			<!-- localStorage.getItem("startDate") -->
			</div>
             
            
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary btn-icon-split" id="addtimeoffbutton">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Add Time off</span>
             </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
			 </form>
          </div>
        </div>
      </div>
      <!-- add time Modal
 <script src="<?php //echo base_url('front/js');?>/bootstrapValidator.min.js"></script>	  
  validation and add shift by ajax
  <script>
   /*   $(document).ready(function() {        
        $('#timeoffform').bootstrapValidator({            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            /* fields: {
                 staff_check: {
                    validators: {
                        notEmpty: {
                            message: 'Please select atleast one staff'
                        },
                    }
                }, */
				
               	
				
				 first_dayoff: {
						validators: {
                        notEmpty: {
                            message: 'Please select start date'
                        },
                    }
				},
				
				last_dayoff: {
						validators: {
                        notEmpty: {
                            message: 'Please select end date'
                        },
                    }
				},
				
                
            }
        });
    
    });  */
        
  </script>  -->