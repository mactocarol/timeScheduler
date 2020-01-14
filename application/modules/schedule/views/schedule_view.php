
        <div class="container-fluid">
			<!-- alert message -->
			<div class="alert alert-dismissible alert-success" id="message">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<div class="msg"></div>
			</div>
			<!-- alert message -->
          <div class="inner_page_header">
             <div class="tab_menu">
               <ul class="tab_menu">
                 <li class="active tab_link" data-tab="tab_1">Schedule</li>
                 <li class="tab_link" data-tab="tab_2">Time off</li>
               </ul>
             </div>
             <div class="tab_content active" id="tab_1">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2><?php echo $business['name']; ?></h2>
                   <label class="saving_schedule" title="All changes are automatically saved.">All Changes saved</label>
                   <span><a href="#">Refresh</a></span>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="add_time_btn" data-toggle="modal" data-target="#addtime">Add Time Off</button>
                   <button class="crate_shift_btn" data-toggle="modal" data-target="#addshift">Create Shift</button>
               </div>

               </div>
               </div>
               <div class="user_content">
                <!-- week tab content -->
                <div class="s_tab_content active" id="week_tab">
                  <!-- controler bar start-->
                  <div class="controler_bar">
                    <!-- left side -->
                    <div class="controler_left">
                      <div class="ctrl_date ctrl_item">
                        <span>Date</span>
                        <input type="text" name="s_date" class="date_picker" id="datepicker"><button class="btn btn-sm" onclick="setNewDate();">Go</button></p>
                      </div>
                      <div class="week_links ctrl_item">
                        <span class="text_link prev_link previous">Previous Week</span>
                        <span class="text_link next_link next">Next Week</span>
                      </div>
                    </div>
                    <!-- left side -->
                    <!-- Right side -->
                    <div class="controler_right">
                      <div class="email_text ctrl_item">
                        <a href="#" class="text_link" data-toggle="modal" data-target="#emailschedule">Email</a>
                      </div>
                      <div class="download_text ctrl_item">
                        <a href="#" class="text_link">Download Schedule</a>
                      </div>
                      <div class="print_text ctrl_item">
                        <span class="print_button text_link">Print</span>
                      </div>
                      <div class="email_text ctrl_item">
                        <span class="text_link">clear week</span>
                      </div>
                      <ul class="schedules_tabs">
                        <li class="tab_link active_lnk" data-tab="week_tab">week</li>
                        <li class="tab_link" data-tab="day_tab">day</li>
                      </ul>
                    </div>
                    <!-- Right side -->
                  </div>
                  <!-- controler bar end-->
                  <!-- table start -->
                  <div class="schedule_tables week_schedule_tbl">
                    <div class="table-responsive">
                       <table class="table table-bordered dataTable">
                         <thead>
                           <tr>
                             <th>Employee Name</th>
                            <th class="d1" style="width:100px"></th>
							  <th class="d2" style="width:100px"></th>
							  <th class="d3" style="width:100px"></th>
							  <th class="d4" style="width:100px"></th>
							  <th class="d5" style="width:100px"></th>
							  <th class="d6" style="width:100px"></th>
							  <th class="d7" style="width:100px"></th>
                           </tr>
                         </thead>
                         <tbody>
						 <?php if(!empty($staffName)){ 
			                     foreach ($staffName as $key => $value) { ?>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3><?php echo $value['first_name']." ".$value['last_name']; ?> </h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
                              </div>
                              <!-- Append data -->
                               <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <div class="Vacation addtime_off_bx">
                                 <p>Vacation<span>9:00am - 4:00pm</span></p>
                               </div>
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                           </tr>
						 <?php } } ?>
							 <tr class="schdule_hour_row">
							<td>
							  <div class="s_hour">Scheduled hours</div>
							  <div class="emp">Employees</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							<td>
							  <div class="s_hour">0 Hrs</div>
							  <div class="emp">0 People</div>
							</td>
							 </tr>
						   <tr class="schdule_hour_row">
							  <td>
							   <a class="staff_lnk" href="#" data-toggle="modal" data-target="#addstaff">
							   add staff</a>
							  </td>
							  <td colspan="7">
							   
							  </td>
						   </tr>
                         </tbody>
                       </table>
                     </div>
                  </div>
                  <!-- table end -->
                 </div>
                 <!-- week tab content -->
                 <!-- Day tab content -->
                <div class="s_tab_content" id="day_tab">
                  <!-- controler bar start-->
                  <div class="controler_bar">
                    <!-- left side -->
                    <div class="controler_left">
                      <div class="ctrl_date ctrl_item">
                        <span>Date</span>
                        <input type="text" name="s_date" class="date_picker">
                      </div>
                      <div class="week_links ctrl_item">
                        <span class="text_link prev_link">Previous Day</span>
                        <span class="text_link next_link">Next Day</span>
                      </div>
                    </div>
                    <!-- left side -->
                    <!-- Right side -->
                    <div class="controler_right">
                      <div class="email_text ctrl_item">
                        <a href="#" class="text_link" data-toggle="modal" data-target="#emailschedule">Email</a>
                      </div>
                      <div class="download_text ctrl_item">
                        <a href="#" class="text_link">Download Schedule</a>
                      </div>
                      <div class="print_text ctrl_item">
                        <span class="print_button text_link">Print</span>
                      </div>
                      <div class="email_text ctrl_item">
                        <span class="text_link">clear Day</span>
                      </div>
                      <ul class="schedules_tabs">
                        <li class="tab_link" data-tab="week_tab">week</li>
                        <li class="tab_link active_lnk" data-tab="day_tab">day</li>
                      </ul>
                    </div>
                    <!-- Right side -->
                  </div>
                  <!-- controler bar end-->
                  <!-- table start -->
                  <div class="schedule_tables day_schedule_tbl">
                     <div class="table-responsive">
                       <table class="table table-bordered dataTable">
                         <thead>
                           <tr>
                             <th>Employee Name</th>
                             <th>Wednesday, 1 Jan</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3>Neha Sharma</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                           </tr>
                           <tr>
                             <td class="pad backcolor">
                               <div class="name">
                                 <h3>Anush Gour</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                           </tr>
							   <tr class="schdule_hour_row">
								 <td>
								  <div class="s_hour">Scheduled hours</div>
								  <div class="emp">Employees</div>
								</td>
								<td>
								  <div class="s_hour">0 Hrs</div>
								  <div class="emp">0 People</div>
								</td>
							   </tr>
							   <tr class="schdule_hour_row">
								<td>
								 <a class="staff_lnk" href="#" data-toggle="modal" data-target="#addstaff">
								 add staff</a>
								</td>
								<td>
								 
								</td>
							   </tr>
                         </tbody>
                       </table>
                     </div>
                  </div>
                  <!-- table end -->
                </div>
                <!-- Day tab content -->
          </div>





             </div>
             <div class="tab_content" id="tab_2">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2>Time Off</h2>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="crate_shift_btn" data-toggle="modal" data-target="#addtime">Add Time Off</button>
                 </div>
               </div>
               </div>
               <div class="row">
                 <div class="col-xl-12 col-md-12">
                   <div class="time_off_tbl">
                   <div class="table-responsive">
                     <table class="table table-bordered dataTable">
                       <thead>
                         <tr>
                           <th>Created</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>First day off</th>
                           <th>Last day off</th>
                           <th>Time Form</th>
                           <th>Time To</th>
                           <th>Time Off</th>
                           <th>Type</th>
                           <th>Actions</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>5-01-2020</td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">Neha</a></td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">Sharma</a></td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">nehasharma@gmail.com</a></td>
                           <td>5-01-2020</td>
                           <td>6-01-2020</td>
                           <td>9:00 AM</td>
                           <td>5:00 PM</td>
                           <td>8 Hours</td>
                           <td>Maternity</td>
                           <td class="action_td">
                             <a href="#" class="icons">
                               <i class="fas fa-edit"></i>
                             </a>
                             <a href="#" class="icons">
                               <i class="fas fa-trash-alt"></i>
                             </a>
                           </td>
                         </tr>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
<!-- add satff modal -->
<div class="modal express_modal" id="addstaff">
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
		<input type="hidden" id="business_id" value="<?php echo $this->uri->segment(4);?>">
	  </div>
	 
	</div>

	<!-- Modal footer -->
	<div class="modal-footer">
	  <button type="submit" class="btn btn-secondary btn-icon-split" id="addstaff" disabled="disabled">
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
<script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
  <!-- validation and add staff by ajax -->
  <script>
    $(document).ready(function() { 
$('#message').hide();	
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
	
	
	
	$(document).on('click','#addstaff', function(){
		//alert('hi');
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var phone_no = $('#phone_no').val();
		var business_id = $('#business_id').val();
		
		if(fname == ""){
			$('#addstaff').prop('disabled', true);
			return false;
			
		}
		if(lname == ""){
			$('#addstaff').prop('disabled', true);
			return false;
			
		}
		
		if(email == ""){
			$('#addstaff').prop('disabled', true);
			return false;
		}
	
		$.ajax({
			 url: "<?php echo site_url();?>schedule/addstaff",
			type:'post',
			data:{fname: fname,lname: lname,email: email, phone_no: phone_no,business_id: business_id},
			success: function(response){
				//alert(response);
				
				
			}
		});
    });
    </script>
  
  
  
  
  
  
  
  <!-- validation and add shift by ajax -->
  <script>
    /* $(document).ready(function() {        
        $('#shiftform').bootstrapValidator({            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 staff_check: {
                    validators: {
                        notEmpty: {
                            message: 'Please select staff'
                        },
                    }
                },
				
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
    
    });  */
        
    
	
	
	
	$(document).on('submit','#shiftform', function(e){
		e.preventDefault();
		//alert('hi');
		/* var staffId = [];
        $.each($("input[name='staff_id']:checked"), function(){            
            staffId.push($(this).val());
        });
        var staff_id = staffId.join(","); */
		//alert(staff_id); 
		
	
		$.ajax({
			 url: "<?php echo site_url();?>schedule/addshift",
			type:'post',
			data:$('#shiftform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				$('#addshift').modal('hide');
				$('#message').show();
				$('#message .msg').text(response);
				
				
			}
		});
    });
    </script>