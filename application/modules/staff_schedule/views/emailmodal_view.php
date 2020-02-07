 <script src="<?php echo base_url();?>/assets/js/custom_script.js"></script>

	  
	    <!--Email Schedule modal -->
      <div class="modal express_modal" id="addemailmod">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header custom_modal">
                <h4 class="modal-title">Email Schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form class="my_common_form" id="emailform" method="POST">
              <!-- Modal body -->
              <div class="modal-body adshi_modal">
                <div class="form-group">
                  <p>Staff Member</p>
                 <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check">All Staff
                  <input type="checkbox" value="all staff" name="staff_check" class="all_checked" checked>
                  <span class="checkmark"></span>
                </label>
				<?php if(!empty($staffName))
				    { 
			            foreach ($staffName as $key => $value) 
						{ ?>
							<label class="custom_check" ><?php echo $value['first_name']." ".$value['last_name']; ?> 
							  <input type="checkbox" checked class="staffdis" value="<?php echo $value['id'];?> " <?php if($value['id'] == $staffid){echo "checked"; } ?> name="staff_id[]" class="check_inputs" id="staff_id">
							  <span class="checkmark"></span>
							</label>
				  <?php } 
				    }?>
               </div>
              <!-- check boxs -->
                </div>
                <div class="form-group">
                  <label for="number">Subject</label>
                  <input type="text" class="form-control" placeholder="Your schedule" id="subject" name="subject">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlTextarea1">Body</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body" id="body">Hello,Please find your schedule below.Thank you.
                  </textarea>
                </div>
               <!-- <div class="form-group">
                   <label class="custom_check">include the schedule
                    <input type="checkbox" value="" name="" class="schedule_check">
                    <span class="checkmark"></span>
                  </label>
                </div>-->
                <div class="form-group">
                  <label for="date">From</label>
                  <input type="text" class="form-control schedule_date" id="from" name="from"  value="<?php if($dates){ echo $dates; } else{ echo date('m/d/y'); }?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="date">To</label>
                  <input type="text" class="form-control schedule_date" id="to"  name="to"   value="<?php if($dates){ echo $dates; } else{ echo date('m/d/y'); }?>"  autocomplete="off">
				  <input type="hidden" id="business_id" name="business_id" value="<?php echo $business_id; ?>">
			     <input type="hidden" name="firstdate" class="firstdate">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Send option</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="option">
                    <option value="1">Send staff their own schedule</option>
                    <option value="2">Send staff full schedule</option>
                  </select>
                </div>
				<div class="form-group">
                  <label class="custom_check">Email me a copy
                    <input type="checkbox" value="" name="" class="email_copy_check">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-group email_copy_input">
                  <label>Email Copy</label>
                    <input type="text" class="form-control" name="email" placeholder="Your Email Address">
                </div>
              </div>
				<!-- Modal footer -->
				  <div class="modal-footer">
					<button type="button" id="previewbtn" class="preview_btn site_button disable_btn" data-toggle="modal" disabled="" data-target="#email_preview_modal">Preview</button>
					<button type="submit" name="send" class="preview_btn site_button disable_btn" id="sendbtn" disabled="">Send</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				  </div>
			   </form>
            </div>
          </div>
        </div>
    <!-- Email Schedule modal -->
 <!-- Emali Preview modal -->
    <div class="modal" id="email_preview_modal">
        <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header custom_modal">
        <h4 class="modal-title">Email Preview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <!-- Modal body -->
        <div class="modal-body" id="moddiv">
        
        </div>
        <!-- Modal body -->
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="site_button" data-toggle="modal" data-target="#emailschedule" data-dismiss="modal">Close Preview</button>
        </div>
        <!-- Modal footer -->
      </div>
        </div>
    </div>



