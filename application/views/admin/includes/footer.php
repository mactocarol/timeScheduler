
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
     <!-- modal openschedule -->

    <div class="modal" id="openschedule">
		<div class="modal-dialog">
			  <div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header custom_modal">
				  <h4 class="modal-title">Select Scheduling System</h4>
				 <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
				</div>

				<!-- Modal body -->
				<div class="modal-body">
				 <div class="software_btn">
				   <h2>Business</h2>
				   <button class="crate_shift_btn">Open Scheduling</button>
				 </div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
				  <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#demo">
					<span class="icon text-white-50">
					  <i class="fas fa-arrow-right"></i>
					</span>
					<span class="text">New Business</span>
				  </a>
				  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
				</div>
				<!-- modal -->
				<div class="modal" id="demo">
					<div class="modal-dialog">
					  <div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header custom_modal">
						  <h4 class="modal-title">Create New Business</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body create_frm">
						 <form>
						  <div class="form-group">
							  <label for="name">Name</label>
							  <input type="text" class="form-control" placeholder="Business Name" id="">
						  </div>
						  <div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" placeholder="Enter email" id="email">
						  </div>
						  <div class="form-group">
							<label for="number">Phone Number</label>
							<input type="text" class="form-control" placeholder="Phone Number" id="email">
						  </div>
						 </form>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
						  <a href="#" class="btn btn-secondary btn-icon-split">
							<span class="icon text-white-50">
							  <i class="fas fa-arrow-right"></i>
							</span>
							<span class="text">Create Business</span>
						  </a>
						  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</div>

					  </div>
					</div>
				</div>
			</div>
		</div>
    </div>
		  
	 <!-- The Modal -->
	  <div class="modal" id="infoDetail">
		<div class="modal-dialog">
		  <div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header custom_modal">
			  <h4 class="modal-title">Edit Business Info</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			 <form>
			  <div class="form-group">
				  <label for="name">Name</label>
				  <input type="text" class="form-control" placeholder="New Business" id="">
			  </div>
			  <div class="form-group">
				<label for="email">Email Address</label>
				<input type="email" class="form-control" placeholder="example@gmail.com" id="email">
			  </div>
			  <div class="form-group">
				<label for="number">Phone Number</label>
				<input type="text" class="form-control" placeholder="123456789" id="email">
			  </div>
			 </form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
			  <a href="#" class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
				  <i class="fas fa-check"></i>
				</span>
				<span class="text">Save</span>
			  </a>
			  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>

		  </div>
		</div>
	  </div>	  
	  <!-- Logout Modal-->
	  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			  <a class="btn btn-primary" href="<?php echo site_url('logout');?>">Logout</a>
			</div>
		  </div>
		</div>
	  </div>
 
	  
	  <!-- Edit satff modal Start -->
      <div class="modal staff_edit_modal" id="staff_edit_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Edit Staff Member</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body create_frm">
             <form class="my_common_form">
              <div class="form-group">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" placeholder="John" id="">
              </div>
              <div class="form-group">
                  <label for="name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Smith" id="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="example123@gmail.com" id="">
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" class="form-control" placeholder="+91-98765-43210" id="">
              </div>
             </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="#" class="site_button delete_staff">Delete Staff</a>
              <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Save Profile</span>
              </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
     <!-- Edit satff modal End -->
	 
	  
	  
	   <!-- add time Modal -->
      <div class="modal express_modal" id="addtime">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Time Off</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body adshi_modal">
             <form class="my_common_form">
              <div class="form-group">
                <p>Staff Member</p>
                <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check">Everyone (Public Holiday)
                  <input type="checkbox" value="" name="" class="all_checked">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Neha Sharma
                  <input type="checkbox" value="Neha Sharma" name="staff_check" class="check_inputs" checked="">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Anusha Gour
                  <input type="checkbox" value="Anusha Gour" name="staff_check" class="check_inputs">
                  <span class="checkmark"></span>
                </label>
              </div>
              <!-- check boxs -->
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Type of Time off</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Vacation</option>
                  <option>Public Holiday</option>
                  <option>LOA</option>
                  <option>Maternity</option>
                  <option>Personal</option>
                  <option>RDO</option>
                  <option>Sick Leave</option>
                  <option>Training</option>
                  <option>Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Notes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="date">First day off</label>
                <input type="text" class="form-control date_picker" id="">
              </div>
              <div class="form-group">
                <label for="date">Last day off</label>
                <input type="text" class="form-control date_picker" id="">
              </div>
            <div class="form-group">
                <label class="custom_check">Time Range
                  <input type="checkbox" value="time_range" name="timerange" class="time_range_check">
                  <span class="checkmark"></span>
                </label>
            </div>
          <div class="form-group">
          <label for="number">Start Time</label>
          <input type="text" name="start_time" class="form-control start_time time_picker time_range_inpt" placeholder="09:00 am" disabled="">
        </div>
        <div class="form-group">
          <label for="number">End Time</label>
          <input type="text" name="end_time" class="form-control end_time time_picker time_range_inpt" placeholder="05:00 pm" disabled="">
        </div>
              <small>Total Hour 8</small>
             </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Add Time off</span>
              </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- add time Modal -->
	    <!--Email Schedule modal -->
      <div class="modal express_modal" id="emailschedule">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header custom_modal">
                <h4 class="modal-title">Email Schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body adshi_modal">
               <form class="my_common_form">
                <div class="form-group">
                  <p>Staff Member</p>
                  <!-- check boxs -->
                  <div class="check_boxs">
                   <label class="custom_check">Everyone (Public Holiday)
                    <input type="checkbox" value="" name="" checked="checked" class="all_checked">
                    <span class="checkmark"></span>
                  </label>
                  <label class="custom_check">Neha Sharma
                    <input type="checkbox" value="Neha Sharma" name="staff_check" class="check_inputs" checked="">
                    <span class="checkmark"></span>
                  </label>
                  <label class="custom_check">Anusha Gour
                    <input type="checkbox" value="Anusha Gour" name="staff_check" class="check_inputs">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <!-- check boxs -->
                </div>
                <div class="form-group">
                  <label for="number">Subject</label>
                  <input type="text" class="form-control" placeholder="your schedule" id="">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlTextarea1">Body</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Hello,Please find your schedule below.Thank you.
                  </textarea>
                </div>
                <div class="form-group">
                   <label class="custom_check">include the schedule
                    <input type="checkbox" value="" name="" class="schedule_check">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-group">
                  <label for="date">From</label>
                  <input type="text" class="form-control date_picker schedule_date" id="" disabled="">
                </div>
                <div class="form-group">
                  <label for="date">To</label>
                  <input type="text" class="form-control date_picker schedule_date" id="" disabled="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Send option</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Send staff their own schedule</option>
                    <option>Send staff full schedule</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="custom_check">Email me a copy
                    <input type="checkbox" value="" name="">
                    <span class="checkmark"></span>
                  </label>
                </div>
               </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <a href="#" class="preview_btn">Preview</a>
                <a href="#" class="preview_btn">Send</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
    <!-- Email Schedule modal -->
	
<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>/assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>/assets/vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>/assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>/assets/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url();?>/assets/js/demo/chart-bar-demo.js"></script>
  <script src="<?php echo base_url();?>/assets/js/jquery_ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url();?>/assets/js/jquery_ui/jquery-ui-timepicker-addon.js"></script>
  <script src="<?php echo base_url();?>/assets/js/custom_script.js"></script>
<!-- Bootstrap core JavaScript-->

<script>
  $( function() {

    if(localStorage.getItem("startDate")){
        var today = localStorage.getItem("startDate");
    }else{
        var today = new Date();  
    }
    
    $( "#datepicker" ).datepicker({
      //dateFormat: 'd M, yy',
      changeMonth: true,
      changeYear: true,
      minDate: 0
    });
    
    
    today = new Date(today); 
    var calendarDate = (today.getMonth()+1)+'/'+(today.getDate())+'/'+(today.getFullYear());
    $("#datepicker").datepicker( "setDate" , calendarDate );

    setCalendarDate(today);

    // get previous 7 days
    $('.previous').click(function(){
        var firstdate = (localStorage.getItem("firstDate"));        
        firstdate = new Date(firstdate);
        firstdate.setDate(firstdate.getDate()-7); 
        /* if(firstdate < new Date()){
          alert('Previous Dates are disabled');
          return false;
        } */
		var business_id = $('#business_id').val();
		
   
	
		$.ajax({
			 url: "<?php echo site_url();?>schedule/showCalendar",
			type:'post',
			data:{firstdate: firstdate,business_id: business_id},
			success: function(response){
				//console.log(response);
				
				if(response==1){
					 $("#mainbodyc").text("");					
				}
				else
				{
					$("#mainbodyc").html(response);
				} 
				
			}
		});
		
        $("#datepicker").datepicker( "setDate" , firstdate );
        setCalendarDate(firstdate);
    });

    // get next 7 days
    $('.next').click(function(){
        var lastdate = (localStorage.getItem("lastDate"));        
        lastdate = new Date(lastdate);
        lastdate.setDate(lastdate.getDate()+1); 
		//alert(lastdate);
		var business_id = $('#business_id').val();
		$.ajax({
			 url: "<?php echo site_url();?>schedule/showCalendar",
			type:'post',
			data:{firstdate: lastdate,business_id: business_id},
			success: function(response){
				//console.log(response);
				
				if(response==1){
					//document.getElementById('mainbody').text("");	
					
                     $("#mainbodyc").text("");					
				}
				else
				{
					$("#mainbodyc").html(response);
				} 
			}
		});
        $("#datepicker").datepicker( "setDate" , lastdate );
        setCalendarDate(lastdate);
    });

  } );
</script> 

<script>
  // get selected date from calendar and  set it to week
  function setNewDate(){
      setCalendarDate($('#datepicker').val());
	  var datepicker = $('#datepicker').val();
      var business_id = $('#business_id').val();
	  
	  $.ajax({
			 url: "<?php echo site_url();?>schedule/showCalendar",
			type:'post',
			data:{firstdate: datepicker,business_id: business_id},
			success: function(response){
				//console.log(response);
				
				if(response==1){
					//document.getElementById('mainbody').text("");	
					
                     $("#mainbodyc").text("");					
				}
				else
				{
					$("#mainbodyc").html(response);
				} 
				
			}
		});
	}

  // to show week date
  function setCalendarDate(today){      
      today = new Date(today);            

      localStorage.setItem("startDate", today);

      var start = localStorage.getItem("startDate");
      
      var d1 = new Date(start);
      var d2 = new Date(start);
      var d3 = new Date(start);
      var d4 = new Date(start);
      var d5 = new Date(start);
      var d6 = new Date(start);
      var d7 = new Date(start);      
      
      d1.setDate(((today.getDate() + 0))); 
      d2.setDate(((today.getDate() + 1))); 
      d3.setDate(((today.getDate() + 2))); 
      d4.setDate(((today.getDate() + 3))); 
      d5.setDate(((today.getDate() + 4))); 
      d6.setDate(((today.getDate() + 5))); 
      d7.setDate(((today.getDate() + 6))); 

      localStorage.setItem("lastDate",d7);
      localStorage.setItem("firstDate",d1);

      d1 = new Date(d1);
      
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
      ];
  
      $('.d1').html(d1.getDate()+'-'+(monthNames[d1.getMonth()])+'-'+d1.getFullYear());
      $('.d2').html(d2.getDate()+'-'+(monthNames[d2.getMonth()])+'-'+d2.getFullYear());
      $('.d3').html(d3.getDate()+'-'+(monthNames[d3.getMonth()])+'-'+d3.getFullYear());
      $('.d4').html(d4.getDate()+'-'+(monthNames[d4.getMonth()])+'-'+d4.getFullYear());
      $('.d5').html(d5.getDate()+'-'+(monthNames[d5.getMonth()])+'-'+d5.getFullYear());
      $('.d6').html(d6.getDate()+'-'+(monthNames[d6.getMonth()])+'-'+d6.getFullYear());
      $('.d7').html(d7.getDate()+'-'+(monthNames[d7.getMonth()])+'-'+d7.getFullYear());
    }

</script>
<!-- calender end-->
</body>

</html>
