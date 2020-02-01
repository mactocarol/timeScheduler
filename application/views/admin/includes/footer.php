
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

	
<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>/assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <!--<script src="<?php echo base_url();?>/assets/vendor/chart.js/Chart.min.js"></script>-->
  <!-- Page level custom scripts -->
  <!--<script src="<?php echo base_url();?>/assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>/assets/js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url();?>/assets/js/demo/chart-bar-demo.js"></script>-->
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
      //dateFormat: 'yy M, d',
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
		$('#daydates').hide();
		$('#weekdates').show();
        var firstdate = (localStorage.getItem("firstDate"));        
        firstdate = new Date(firstdate);
        firstdate.setDate(firstdate.getDate()-7); 
        /* if(firstdate < new Date()){
          alert('Previous Dates are disabled');
          return false;
        } */
		var business_id = $('#business_id').val();
		var firstdate = (firstdate.getMonth()+1)+'/'+(firstdate.getDate())+'/'+(firstdate.getFullYear());		
   
	
		$.ajax({
			 url: "<?php echo site_url();?>schedule/showCalendar",
			type:'post',
			data:{firstdate: firstdate,business_id: business_id},
			success: function(response){
				//console.log(response);
				
				if(response==1){
					 $("#mainbodyc").text("");
					caljs();					 
				}
				else
				{
					$("#mainbodyc").html(response);
					caljs();
				} 
				
			}
		});
		
        $("#datepicker").datepicker( "setDate" , firstdate );
        setCalendarDate(firstdate);
    });

    // get next 7 days
    $('.next').click(function(){
		$('#daydates').hide();
		$('#weekdates').show();
        var lastdate = (localStorage.getItem("lastDate"));        
        lastdate = new Date(lastdate);
        lastdate.setDate(lastdate.getDate()+1);
		
		var firstdate = (lastdate.getMonth()+1)+'/'+(lastdate.getDate())+'/'+(lastdate.getFullYear());				
		//alert(lastdate);
		var business_id = $('#business_id').val();
		$.ajax({
			 url: "<?php echo site_url();?>schedule/showCalendar",
			type:'post',
			data:{firstdate: firstdate,business_id: business_id},
			success: function(response){
				//console.log(response);
				
				if(response==1){
					//document.getElementById('mainbody').text("");	
					
                     $("#mainbodyc").text("");	
                     caljs();					 
				}
				else
				{
					$("#mainbodyc").html(response);
					caljs();
					
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
	  $('#daydates').hide();
		$('#weekdates').show();
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
                       caljs();					 
				}
				else
				{
					$("#mainbodyc").html(response);
					caljs();
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


function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
   
   
}

$('.prinnt').on('click',function(){
	//alert('dsfsd');
	$('.verticle_menu').html('');
	/* document.getElementById("verticle_menus").style.display = "none";
	document.getElementById("verticle_menus1").style.display = "none";
	document.getElementById("verticle_menus2").style.display = "none";
	document.getElementById("verticle_menus3").style.display = "none";
	document.getElementById("verticle_menus4").style.display = "none";
	document.getElementById("verticle_menus5").style.display = "none";
	document.getElementById("verticle_menus6").style.display = "none"; */
   printData();

  
}); 
</script>
<!-- calender end-->
</body>

</html>
