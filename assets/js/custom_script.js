(function($) {
	"use strict";
	// info menu js
	$(".info_menu_icon").click(function(){
		$(".info_nav").slideToggle(300);
	});
  	// date picker
  	 $( ".date_picker" ).datepicker();
  	//tabs Menu
	$('.tab_menu .tab_link').on('click', function(){
		$(".tab_content").removeClass("active");
		var tab_data = $(this).attr("data-tab");
		$('.tab_menu .tab_link').removeClass("active");
		$(this).addClass("active");
		$("#"+tab_data).addClass("active");
	});
	//day week tabs
	$('.schedules_tabs > .tab_link').on('click', function(){
		$(".s_tab_content").removeClass("active");
		var tab_data = $(this).attr("data-tab");
		//$('.schedules_tabs .tab_link').removeClass("active_lnk");
		//$(this).addClass("active_lnk");
		$("#"+tab_data).addClass("active");
	});
	//on right click show menu
	$(".schedule_box").bind("contextmenu",function(e){
	    $(".verticle_menu").hide();
        $(this).children(".verticle_menu").toggle();
	    return false;
	});
	//hide menu on click
	$(".schedule_box").on("click", function(e){
	    $(".verticle_menu").hide();
	});
	//============== Timepicker jquery script ===============//
	//Timepicker
	if($(".time_picker").length > 0){
		$('.time_picker').timepicker({
		  timeFormat: 'h:mm: TT',
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
		i++;
		var html = '<div class="form_group" id="s_row'+i+'">\
		  <input type="text" name="name" placeholder="E.g. 9-5"/>\
		  <button type="button" class="remove_btn" id="s_remove_'+i+'">&times;</button>\
		</div>';
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
		$(this).parents(".verticle_menu").hide();
	});
	//remove shift field
	$(document).on('click', '.remove_btn', function(){
		var button_id = $(this).attr("id");
		//var remove_prnt = $(this).parents(".form_group");
		$('#s_row'+button_id+'').remove();
	});
		
	//============== append comment field on click ===============//
	var j = 1;
	$('.add_cmt_btn').on('click', function(){
		j++;
		var html = '<div class="form_group" id="cmt_row'+j+'">\
		  <input type="text" name="name" placeholder="Add Comment"/>\
		  <button type="button" class="remove_btn" id="remove-'+j+'">&times;</button>\
		</div>';
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
		//$(this).parents(".verticle_menu").hide();
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
		var b_time = $(this).text();
		k++;
		var html = '<div class="form_group break_group" id="brk_row'+k+'">\
		  <input class="break_input" type="text" name="name" value="'+b_time+'" disabled/>\
		  <button type="button" class="remove_btn" id="remove_'+k+'">&times;</button>\
		</div>';
		$(this).parents(".verticle_menu").prev('.append_td_data').append(html);
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
		ad++;
		var html = '<div class="form_group more_input" id="input_row'+ad+'">\
		<input class="input" type="text" name="" placeholder="e.g 9-5">\
		<button type="button" class="remove_btn" id="remove_input'+ad+'">&times;</button>\
		</div>';
		$(this).next('.append_td_data').append(html);
	});
	//remove break input field
	$(document).on('click', '.remove_btn', function(){
		var remove_prnt = $(this).parents(".form_group");
		$(remove_prnt).remove();
	});
	//============== append Multiple Staff field on click ===============//
	var st = 1;
	$('.add_mlt_staff').on('click', function(){
		st++;
		var html = '<div class="staffs_row staffs_row_new" id="stf_row'+st+'">\
			<div class="form-group">\
			   <label for="name">First Name</label>\
			   <input type="text" class="form-control" placeholder="John" id="">\
			</div>\
			<div class="form-group">\
			    <label for="name">Last Name</label>\
				<input type="text" class="form-control" placeholder="Smith" id="">\
			</div>\
			<div class="form-group">\
			    <label for="email">Email</label>\
				<input type="email" class="form-control" placeholder="example123@gmail.com" id="">\
			</div>\
			<div class="form-group">\
			    <label for="number">Phone Number</label>\
				<input type="text" class="form-control" placeholder="+91-98765-43210" id="">\
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
	$(document).on('change', '.time_range_check', function(){
		if ($(this).is(":checked")) {
		  $("input.time_range_inpt").removeAttr("disabled");
		}
		else{
			$("input.time_range_inpt").attr("disabled",'true');
		}
	});
})(jQuery);

