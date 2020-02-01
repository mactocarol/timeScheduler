(function($) {
	"use strict";
	// info menu js
	$(".info_menu_icon").click(function(){
		$(".info_nav").slideToggle(300);
	});
  	// date picker
  	 $( ".date_picker" ).datepicker();
	 //Jquery ui Datepicker Range
	$("#first_dayoff").datepicker({          
	  onClose: function( selectedDate ) {
		$("#last_dayoff").datepicker( "option", "minDate", selectedDate );
	  }
	});
	$("#last_dayoff").datepicker({
	  onClose: function( selectedDate ) {
		$("#first_dayoff").datepicker( "option", "maxDate", selectedDate );
	  }
	});
	
	
	$("#from").datepicker({          
	  onClose: function( selectedDate ) {
		$("#to").datepicker( "option", "minDate", selectedDate );
	  }
	});
	$("#to").datepicker({
	  onClose: function( selectedDate ) {
		$("#from").datepicker( "option", "maxDate", selectedDate );
	  }
	});
  	//tabs Menu
	$('.tab_menu .tab_link').on('click', function(){
		$(".tab_content").removeClass("active");
		var tab_data = $(this).attr("data-tab");
		$('.tab_menu .tab_link').removeClass("active");
		$(this).addClass("active");
		$("#"+tab_data).addClass("active");
	});
	//day week tabs
	$('.schedules_tabs .tab_link').on('click', function(){
		$('.schedules_tabs .tab_link').removeClass("active_lnk");
		$(this).addClass("active_lnk");
	});
	//on right click show menu
	$(".schedule_box").bind("contextmenu",function(e){
	    $(".verticle_menu").hide();
        $(this).children(".verticle_menu").toggle();
		$(this).children(".verticle_menu_scnd").hide();
		//offset menu
		var menu = $(this).children(".verticle_menu");
		var menupos = $(menu).offset();
		if (menupos.left + menu.width() > $(window).width()) {
			$(".verticle_menu").addClass("offset_menus").css({'left':'auto', 'right':'0'});
		}
		else{
			$(".verticle_menu").removeClass("offset_menus").css({'left':'50%', 'right':'auto'});
		}
	    return false;
	});
	//hide menu on click
	$(".schedule_box").on("click", function(e){
	    $(".verticle_menu").hide();
		$(".verticle_menu_scnd").hide();
	});
	//============== Timepicker jquery script ===============//
	//Timepicker
	if($(".time_picker").length > 0){
		$('.time_picker').timepicker({
		  timeFormat: 'h:mm tt',
		  ampm: true,
		  stepHour: 1,
		  stepMinute: 5,
		});
	}
	//============== Timepicker jquery script ===============//
	//============== all checkbox checked on click ===============//
	$('.all_checked').change(function(){
		if ($(this).is(":checked")) {
			$(this).parents(".check_boxs").addClass("checked");
			$(".check_boxs.checked .custom_check input").prop('checked', true);
				     
			}
		else{
			$(this).parents(".check_boxs").removeClass("checked");
			$(".custom_check input").prop('checked', false);
		}
	});
	//============== append add shift field on click ===============//
	var i = 1;
	$('.add_shift_btn').on('click', function(){
			var staffid = $(this).data('staffid');
	        var dates = $(this).data('dates');
		i++;
		var html = '<div class="form_group shift_grp" id="s_row'+i+'">\
		  <input type="text" name="shifttime" id="shifttime" placeholder="E.g. 9-5"/>\
		  <div class="btn_div">\
		  <button type="button" class="submit_shift" id="shift_submit">&check;</button>\
		   </div>\
		</div>';
		localStorage.setItem("staffids", staffid);
	    localStorage.setItem("daysid", dates);
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
		$(this).parents(".verticle_menu").hide();
		//add vertical menu second
		vertical_menu_second();
	});
	//remove shift field
	$(document).on('click', '.remove_btn', function(){
		var button_id = $(this).attr("id");
		//var remove_prnt = $(this).parents(".form_group");
		$('#s_row'+button_id+'').remove();
	});
	//add vertical menu second
	vertical_menu_second();
	//============== append comment field on click ===============//
	var j = 1;
	$('.add_cmt_btn').on('click', function(){
		j++;
		var staffid = $(this).data('staffid');
	    var dates = $(this).data('dates');
		var html = '<div class="form_group shift_grp" id="cmt_row'+j+'">\
		  <input type="text" name="comment" id="comment" placeholder="Add Comment"/>\
		  <div class="btn_div">\
		  <button type="button" class="submit_shift" id="comment_submit">&check;</button>\
		  </div>\
		</div>';
		localStorage.setItem("staffids", staffid);
	    localStorage.setItem("daysid", dates);
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
		//$(this).parents(".verticle_menu").hide();
		//add vertical menu second
		vertical_menu_second();
	});
	//remove comment field
	$(document).on('click', '.remove_btn', function(){
		//var button_id = $(this).attr("id");
		var remove_prnt = $(this).parents(".form_group");
		$(remove_prnt).remove();
	});
	//============== append Break field on click ===============//
	var k = 1;
	$(".break_menu ul li").on("click", function(){
		var staffid = $(this).data('staffid');
	    var dates = $(this).data('dates');
		
		var b_time = $(this).text();
		k++;
		var html = '<div class="form_group shift_grp" id="cmt_row'+k+'">\
		  <input type="text" name="break" id="break" value="'+b_time+'"/>\
		  <div class="btn_div">\
		  <button type="button" class="submit_shift" id="break_submit">&check;</button>\
		  </div>\
		</div>';
		/* var html = '<div class="form_group break_group" id="brk_row'+k+'">\
		  <input class="break_input" type="text" name="break" value="'+b_time+'"/>\
		  <button type="button" class="remove_btn" id="remove_'+k+'">&times;</button>\
		</div>'; */
		localStorage.setItem("staffids", staffid);
	    localStorage.setItem("daysid", dates);
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
		//add vertical menu second
		vertical_menu_second();
	});
	//remove break input field
	$(document).on('click', '.remove_btn', function(){
		//var button_id = $(this).attr("id");
		var remove_prnt = $(this).parents(".form_group");
		$(remove_prnt).remove();
	});
	// Remove break on click function
	$(document).on('dblclick', '.break_group', function(){
		$(this).addClass("actives");
		$(this).children("input").removeAttr("disabled");
	});

	//============== Add input on plus icon click ===============//
	var ad = 1;
	$(".add_more_input").on("click", function(){
		var staffid = $(this).data('staffid');
	        var dates = $(this).data('dates');
		ad++;
		var html = '<div class="form_group more_input" id="input_row'+ad+'">\
		<input type="text" name="shifttime" id="shifttime" placeholder="E.g. 9-5"/>\
		<button type="button" class="submit_shift" id="shift_submit">&check;</button>\
		</div>';
		localStorage.setItem("staffids", staffid);
	    localStorage.setItem("daysid", dates);
		$(this).next('.append_td_data').append(html);
	});
	//remove break input field
	$(document).on('click', '.remove_btn', function(){
		var remove_prnt = $(this).parents(".form_group");
		$(remove_prnt).remove();
	});
	//remove break input field
	$(document).on('click', '.remove_btn', function(){
		var remove_prnt = $(this).parents(".Vacation");
		$(remove_prnt).remove();
	});
	//============== append Multiple Staff field on click ===============//
	var st = 1;
	$('.add_mlt_staff').on('click', function(){
		st++;
		var html = '<div class="staffs_row staffs_row_new" id="stf_row'+st+'">\
			<div class="form-group">\
			   <label for="name">First Name</label>\
			   <input type="text" class="form-control" name="fnames[]" placeholder="John" id="">\
			</div>\
			<div class="form-group">\
			    <label for="name">Last Name</label>\
				<input type="text" class="form-control" name="lnames[]" placeholder="Smith" id="">\
			</div>\
			<div class="form-group">\
			    <label for="email">Email</label>\
				<input type="email" class="form-control" name="emails[]" placeholder="example123@gmail.com" id="">\
			</div>\
			<div class="form-group">\
			    <label for="number">Phone Number</label>\
				<input type="text" class="form-control" name="phonenos[]" placeholder="+91-98765-43210" id="">\
			</div>\
			<button type="button" class="remove_btn" id="remove-stf'+st+'">&times;</button>\
		</div>';
		$(this).parents(".form_footer").prev('.append_staff_row').append(html);
	});
	//remove comment field
	$(document).on('click', '.remove_btn', function(){
		var remove_prnt = $(this).parents(".staffs_row_new");
		$(remove_prnt).remove();
	});
	//Enable input on checkbox
	$(document).on('change', '.schedule_check', function(){
		if ($(this).is(":checked")) {
		  $("input.schedule_date").removeAttr("disabled");
		}
		else{
			$("input.schedule_date").attr("disabled",'true');
		}
	});
	//Enable input on checkbox
	$(document).on('change', '.staffdis, .all_checked', function(){
		if ($(this).is(":checked")) {
		  $(".disable_btn").removeAttr("disabled");
		}
		else{
			$(".disable_btn").attr("disabled",'true');
		}
	});
	//Enable input on checkbox
	$(document).on('change', '.time_range_check', function(){
		if ($(this).is(":checked")) {
		  $("input.time_range_inpt").removeAttr("disabled");
		}
		else{
			$("input.time_range_inpt").attr("disabled",'true');
		}
	});
	//============== email copy on checked  ===============//
	$('.email_copy_check').change(function(){
		if ($(this).is(":checked")) {
			$(".email_copy_input").show();
				     
			}
		else{
			$(".email_copy_input").hide();
		}
	});
	//custom hide bootstrape modal
    // Hide modal on button click
    $(".modal_hide").click(function(){
        $("#emailschedule").modal('hide');
    });
	
	//show vertical menu on right click
	function vertical_menu_second(){
	$(".append_td_data .form_group").bind("contextmenu",function(e){
		$(".verticle_menu_scnd").hide();
		$(".verticle_menu").hide();
		$(this).parents(".schedule_box").children(".verticle_menu_scnd").toggle();
		return false;
	});
	}
})(jQuery);

