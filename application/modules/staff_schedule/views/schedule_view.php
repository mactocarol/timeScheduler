
        <div class="container-fluid" >
			<!-- alert message -->
			<div class="alert alert-dismissible alert-success" id="message">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<div class="msg"></div>
			</div>
			<!--<input type="text" id="ccc">-->
			<!-- alert message -->
          <div class="inner_page_header">
             <div class="tab_menu">
               <ul class="tab_menu">
                 <li class="active tab_link" data-tab="tab_1">Schedule</li>
                 <!--<li class="tab_link" data-tab="tab_2">Time off</li>-->
               </ul>
             </div>
             <div class="tab_content active" id="tab_1">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2><?php echo $business_name; ?></h2>
				   
                   <label class="saving_schedule" title="All changes are automatically saved.">All Changes saved</label>
                   <span><a style="cursor: pointer; color: #4469d7;" onclick="window.location.href=this">Refresh</a></span>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="add_time_btn" id="addtime">Add Time Off</button>
                   <button class="crate_shift_btn" id="addshift">Create Shift</button>
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
                        <span class="text_link prev_link previous" >Previous Week</span>
                        <span class="text_link next_link next" >Next Week</span>
                      </div>
                    </div>
                    <!-- left side -->
                    <!-- Right side -->
                    <div class="controler_right">
                      <div class="email_text ctrl_item">
                        <a href="#" class="text_link" id="emailschedule">Email</a>
                      </div>
                    <!--  <div class="download_text ctrl_item">
                        <a href="#" class="text_link">Download Schedule</a>
                      </div>-->
                     <div class="print_text ctrl_item">
                         <span class="print_button text_link prinnt">Print</span>
                      </div>
			
       
    
                      <div class="email_text ctrl_item">
                        <span class="text_link" data-toggle="modal" data-target="#clear_weekMod">clear week</span>
                      </div>
                      <ul class="schedules_tabs">
                        <li class="tab_link active_lnk" id="week">week</li>
                        <li class="tab_link" id="day">day</li>
                      </ul>
                    </div>
                    <!-- Right side -->
                  </div>
                  <!-- controler bar end-->
                  <!-- table start -->
                  <div class="schedule_tables week_schedule_tbl">
                    <div class="table-responsive">
                       <table class="table table-bordered dataTable" id="printTable">
                         <thead>
                           <tr id="weekdates">
                             <th>Employee Name</th>
                              <th class="d1" style="width:100px"></th>
							  <th class="d2" style="width:100px"></th>
							  <th class="d3" style="width:100px"></th>
							  <th class="d4" style="width:100px"></th>
							  <th class="d5" style="width:100px"></th>
							  <th class="d6" style="width:100px"></th>
							  <th class="d7" style="width:100px"></th>
							</tr>
						   <tr id="daydates" style="text-align:center;">
                             <th>Employee Name</th>
                             <th class="curentday"><?php echo $currdates; ?> </th>
						  </tr>
                         </thead>
                         <tbody id="mainbodyc">
						<?php 
						
 						 $hourCount = 0;
						 $peopleCount= 0;
						 
						 $hourCount1 = 0;
						 $peopleCount1 = 0;
						 
						 $hourCount2 = 0;
						 $peopleCount2 = 0;
						 
						 $hourCount3 = 0;
						 $peopleCount3 = 0;
						 
						 $hourCount4 = 0;
						 $peopleCount4 = 0;
						 
						 $hourCount5 = 0;
						 $peopleCount5 = 0;
						 
						 $hourCount6 = 0;
						 $peopleCount6 = 0;
						 if(!empty($staffName)){ 
						
						   foreach ($staffName as $key => $value) { ?>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3><?php echo $value['first_name']." ".$value['last_name']; ?> </h3>
								 <?php
								 //$shiftsf = array();
								$fcount = 0;								 
								for ($i = 0 ; $i <= 6; $i++){
									$shiftsf = isset($finalArray[$alldates[$i]]) ? $finalArray[$alldates[$i]] : [];
									
									foreach($shiftsf as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ 
												if($v['end_time']){
													$startdatetime = strtotime($v['start_time']);
													$enddatetime = strtotime($v['end_time']);
													if($enddatetime > $startdatetime){
														$difference = $enddatetime - $startdatetime;
														$hoursDiff = $difference / 3600;
														$fcount += round($hoursDiff,0);
													}
													else{
														$difference = $startdatetime - $enddatetime;
														$hoursDiff = $difference / 3600;
														$fcount += round($hoursDiff,0);
													}
												}
										    } 
									    } 
								    }
								}
								?>
								  <span><?php echo $fcount; ?> Hours</span>
                               </div>
                             </td>
							
                             <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[0]]) ? $finalArrayTimeoff[$alldates[0]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>
											   </div>
											    
												
										<?php 	}
										}
									}
							  ?>

							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                  <?php
								       
										$shifts = isset($finalArray[$alldates[0]]) ? $finalArray[$alldates[0]] : []; 
										 $staffArray=[];
										foreach($shifts as $key=>$val){
											
											if($key == $value['id']){
												foreach($val as $v){?>
												<div class="form_group shift_grp" id="s_row">
												    <input type="text" id="shiftCut" name="shifs" class="shftcls" onFocus="setAttr(this.value,'<?=$value['id']?>',1,0,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													<div class="btn_div">
													  <button type="button" class="remove_btn" onclick="shift_remove(this.value)" value="<?php echo $v['id']; ?>">&times;</button>
													</div>
								                </div>
												
													<?php 
													if($v['end_time']){
													$startdatetime = strtotime($v['start_time']);
												    $enddatetime = strtotime($v['end_time']);
												    $difference = $enddatetime - $startdatetime;
												    $hoursDiff = $hourCount+$difference / 3600;
												    $hourCount = round($hoursDiff,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount++;
													}
												}
												
											}
										}
								    ?>	
								
								  <?php
									 $comments = isset($finalArrayComment[$alldates[0]]) ? $finalArrayComment[$alldates[0]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													 <input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,0,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													    <div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													</div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[0]]) ? $finalArrayBreak[$alldates[0]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													 <input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,0,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													
													    <div class="btn_div">
														   <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													</div>
														
														
												<?php 	}
												}
											}
									  ?>
								 </div>
                              
                              <!-- Append data -->
							  <?php if(isset($finalArrayTimeoff[$alldates[0]]) ? $finalArrayTimeoff[$alldates[0]] : []) ?>
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus">
                                <ul>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
								   <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>" >Email</a></li>
                                </ul>
                              </div>
							  <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								  <!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[1]]) ? $finalArrayTimeoff[$alldates[1]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
												
											    <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>	
											   </div>
										<?php }
										}
									}
							  ?>
							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
                                  <?php
										$shifts = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : []; 
										 $staffArray=[];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group shift_grp" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,1,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													<div class="btn_div">
													   <button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
													</div>
								                  </div>
												<?php 
												
													if($v['end_time']){
													$startdatetime1 = strtotime($v['start_time']);
												    $enddatetime1 = strtotime($v['end_time']);
												    $difference1 = $enddatetime1 - $startdatetime1;
												    $hoursDiff1 = $hourCount1+$difference1 / 3600;
												    $hourCount1 = round($hoursDiff1,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount1++;
													}
												}												
											}
										}
										
								  ?>	
								
								  <?php
									 $comments = isset($finalArrayComment[$alldates[1]]) ? $finalArrayComment[$alldates[1]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,1,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													 <div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[1]]) ? $finalArrayBreak[$alldates[1]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,1,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													</div>
														
														
												<?php 	}
												}
											}
									  ?>								  
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus1">
                                <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">Paste</li>
                                  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								 <!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[2]]) ? $finalArrayTimeoff[$alldates[2]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											  <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>	
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							 <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[2]]) ? $finalArray[$alldates[2]] : [];
										$staffArray = [];										
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,2,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
														 <button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												  if($v['end_time']){
													$startdatetime2 = strtotime($v['start_time']);
												    $enddatetime2 = strtotime($v['end_time']);
												    $difference2 = $enddatetime2 - $startdatetime2;
												    $hoursDiff2 = $hourCount2+$difference2 / 3600;
												    $hourCount2 = round($hoursDiff2,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount2++;
													}
												}
											}
										}
								  ?>	
								   <?php
									 $comments = isset($finalArrayComment[$alldates[2]]) ? $finalArrayComment[$alldates[2]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,2,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[2]]) ? $finalArrayBreak[$alldates[2]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,2,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							</div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus2">
                               <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                 <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								 <!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[3]]) ? $finalArrayTimeoff[$alldates[3]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>	
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[3]]) ? $finalArray[$alldates[3]] : []; 
										$staffArray = [];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,3,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													<button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php
												if($v['end_time']){
													$startdatetime3 = strtotime($v['start_time']);
												    $enddatetime3 = strtotime($v['end_time']);
												    $difference3 = $enddatetime3 - $startdatetime3;
												    $hoursDiff3 = $hourCount3+$difference3 / 3600;
												    $hourCount3 = round($hoursDiff3,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount3++;
													}
												}
											}
										}
								?>
									<?php
									 $comments = isset($finalArrayComment[$alldates[3]]) ? $finalArrayComment[$alldates[3]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,3,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[3]]) ? $finalArrayBreak[$alldates[3]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,3,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
													</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>								  
							  </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus3">
                                <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								 <ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								  <!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[4]]) ? $finalArrayTimeoff[$alldates[4]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[4]]) ? $finalArray[$alldates[4]] : []; 
										$staffArray = [];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,4,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													 <button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
													$startdatetime4 = strtotime($v['start_time']);
												    $enddatetime4 = strtotime($v['end_time']);
												    $difference4 = $enddatetime4 - $startdatetime4;
												    $hoursDiff4 = $hourCount4+$difference4 / 3600;
												    $hourCount4 = round($hoursDiff4,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount4++;
													}
												
												}
											}
										}
								  ?>
									<?php
									 $comments = isset($finalArrayComment[$alldates[4]]) ? $finalArrayComment[$alldates[4]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,4,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[4]]) ? $finalArrayBreak[$alldates[4]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,4,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													  <div class="btn_div">
														    <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>								  
							  </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus4">
                               <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								<!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[5]]) ? $finalArrayTimeoff[$alldates[5]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[5]]) ? $finalArray[$alldates[5]] : []; 
										$staffArray = [];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,5,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													 <button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
													$startdatetime5 = strtotime($v['start_time']);
												    $enddatetime5 = strtotime($v['end_time']);
												    $difference5 = $enddatetime5 - $startdatetime5;
												    $hoursDiff5 = $hourCount5+$difference5 / 3600;
												    $hourCount5 = round($hoursDiff5,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														$staffArray[] = $value['id'];
														$peopleCount5++;
													}
												}
											}
										}
								  ?>
								<?php
									 $comments = isset($finalArrayComment[$alldates[5]]) ? $finalArrayComment[$alldates[5]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,5,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[5]]) ? $finalArrayBreak[$alldates[5]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,5,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													<div class="btn_div">
														    <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>								  
								
								</div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus5">
                                <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								  <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								 <!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[6]]) ? $finalArrayTimeoff[$alldates[6]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="timeoff_remove" value="<?php echo $v['id']; ?>">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							 <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[6]]) ? $finalArray[$alldates[6]] : []; 
										$staffArray = [];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,6,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													 <button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
													$startdatetime6 = strtotime($v['start_time']);
												    $enddatetime6 = strtotime($v['end_time']);
												    $difference6 = $enddatetime6 - $startdatetime6;
												    $hoursDiff6 = $hourCount6+$difference6 / 3600;
												    $hourCount6 = round($hoursDiff6,0);
												    }
													if(!in_array($value['id'],$staffArray)){
														$staffArray[] = $value['id'];
														$peopleCount6++;
													}
												}
											}
										}
								  ?>
                                <?php
									 $comments = isset($finalArrayComment[$alldates[6]]) ? $finalArrayComment[$alldates[6]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<input type="text" id="commentCut" onFocus="setAttr(this.value,'<?=$value['id']?>',2,6,<?=$v['id']?>)" value="<?php echo $v['comment']; ?>">	
													
													<div class="btn_div">
														 <button type="button" class="remove_btn" id="comment_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													</div>
														
														
												<?php 	}
												}
											}
									  ?>
							         <?php
									 $breaks = isset($finalArrayBreak[$alldates[6]]) ? $finalArrayBreak[$alldates[6]] : []; 
											foreach($breaks as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="b_row">
													<input type="text" id="breakCut" onFocus="setAttr(this.value,'<?=$value['id']?>',3,6,<?=$v['id']?>)" value="<?php echo $v['break']; ?>">
													
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="break_remove" value="<?php echo $v['id']; ?>">&times;</button>
														</div>
													 </div>
														
														
												<?php 	}
												}
											}
									  ?>								  
							 </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu" id="verticle_menus6">
                               <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Paste</li>
								  <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Add Shift</li>
                                  <li class="add_cmt_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Add Comment</li>
                                  <li><a href="#" id="addtimecal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>" >Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">15 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">30 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">45 minutes</li>
                                        <li data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">1 hour</li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li><a href="#" id="addemailcal" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>" >Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
							  <!-- Verticle menus second -->
							   <div class="verticle_menu_scnd">
								<ul>
								   <li onclick="cutItems();">Cut</li>
								  <li onclick="copyItems();">Copy</li>
								  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Paste</li>
								  <li onclick="deleteItems();">Delete</li>
								<!--<li>Edit</li>--->
								</ul>
							  </div>
							  <!-- Verticle menus second -->
                             </td>
                           </tr>
						 <?php } }?>
							 <tr class="schdule_hour_row">
							<td>
							  <div class="s_hour">Scheduled hours</div>
							  <div class="emp">Employees</div>
							</td>
							</td>
								<td>
							  <div class="s_hour"><?php echo (abs($hourCount)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount1)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount1; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount2)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount2; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount3)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount3; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount4)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount4; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount5)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount5; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo (abs($hourCount6)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount6; ?> People</div>
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
            </div>
		  <!-- Timeoff -->
            <div class="tab_content" id="tab_2">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2>Time Off</h2>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="crate_shift_btn" id="addtime">Add Time Off</button>
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
					   <?php
                 
				    if(!empty($timeOff))
				       { 
			            foreach ($timeOff as $keytime => $valuetime) 
						{ 
						  $created_date = $valuetime['created_at'];
                          $newDate = date("d M ,Y", strtotime($created_date));
					   ?>
							 <tr>
							   <td><?php echo $newDate; ?></td>
							   <td><!--<a href="#" data-toggle="modal" data-target="#staff_edit_modal">--><?php echo $valuetime['first_name'];?></a></td>
							   <td><!--<a href="#" data-toggle="modal" data-target="#staff_edit_modal">--><?php echo $valuetime['last_name'];?></a></td>
							   <td><!--<a href="#" data-toggle="modal" data-target="#staff_edit_modal">--><?php echo $valuetime['email'];?></a></td>
							   <td><?php echo $valuetime['firstday_off'];?></td>
							   <td><?php echo $valuetime['firstday_off'];?></td>
							   <td><?php echo $valuetime['start_time'];?></td>
							   <td><?php echo $valuetime['end_time'];?></td>
							   <td>8 Hours</td>
							   <td><?php echo $valuetime['end_time'];?></td>
							   <td class="action_td">
								 <a href="#" class="icons">
								   <i class="fas fa-edit"></i>
								 </a>
								 <a href="#" class="icons">
								   <i class="fas fa-trash-alt"></i>
								 </a>
							   </td>
							 </tr>
					   <?php } 
					   }?>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 </div>
               </div>
             </div>
			  <!-- Timeoff -->
        </div>
    </div>
<!-- clear busineess modal -->
    <div class="modal" id="clear_weekMod">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Clear Schedule</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body clear_schedule_form">
             <form class="my_common_form">
                <p>Are you sure?</p>
                <div class="button_groups">
				<input type="hidden" id="businessids">
                  <button type="button" class="site_button" id="delweek">Clear</button>
                  <button type="button" class="site_button" data-dismiss="modal">cancel</button>
                </div>
             </form>
            </div>
          </div>
        </div>
      </div>
    <!-- clear busineess modal -->
<input type="hidden" id="business_id" value="<?php echo $business_id; ?>">
<input type="hidden" id="dayvalue">


   <!--  <script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
<!-- add staff by ajax -->
 <script>
$(document).on('click','#delweek', function(e){
	e.preventDefault();
	
	var dayvalue = $('#dayvalue').val();
	var datepicker = $('#datepicker').val();
	var business_id = $('#business_id').val();
	$.ajax({
		 url: "<?php echo site_url();?>staff_schedule/weekDelete",
		type:'post',
		data:{dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
		success: function(response){
			//alert(response);
			$("#mainbodyc").html(response);
			$('#clear_weekMod').modal('hide');
			caljs();
		}
	});
});



	
	
 $('#message').hide();	
 $('#daydates').hide();	
 
	
	
	
	
	
	
</script>
<!-- add shift by ajax -->
 <script>
	$(document).on('submit','#shiftform', function(e){
		e.preventDefault();
		var date = $('#date').val();
		var start_time = $('#start_time').val();
		var end_time = $('#end_time').val();
		
		if(date == ""){
			$('#addshiftbutton').prop('disabled', true);
			return false;
			
		}
		if(start_time == ""){
			$('#addshiftbutton').prop('disabled', true);
			return false;
		}
		if(end_time == ""){
			$('#addshiftbutton').prop('disabled', true);
			return false;
		}
	
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/addshift",
			type:'post',
			data:$('#shiftform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				
				
				
					$("#mainbodyc").html(response);
					$('#addshiftmod').modal('hide');
					caljs();
					//location.reload();
					 $('#message').show();
				     $('#message .msg').html("Shift Added Successfully");
				
				//$('#message').show();
				//$('#message .msg').text(response);
				
				
			}
		});
    });
</script>
<!-- add timeoff by ajax -->
 <script>
/*  $(document).on('click','#cut', function(e){
		e.preventDefault();
 }); */
	$(document).on('submit','#timeoffform', function(e){
		e.preventDefault();
	   /*  $('#daydates').hide();
		$('#weekdates').show();  */
		
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/addtimeoff",
			type:'post',
			data:$('#timeoffform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				
				
				/* if(response==1){
					 $("#mainbodyc").text("");					
				}
				else
				{ */
					$("#mainbodyc").html(response);
					$('#addtimemod').modal('hide');
		             caljs();
					//location.reload();
					$('#message').show();
				    $('#message .msg').html("Timeoff Added Successfully");
				//} 
				
				//$('#message').show();
				//$('#message .msg').text(response);
				
				
			}
		});
    });
</script>

<!-- add email schedule by ajax -->
 <script>
	$(document).on('click','#sendbtn', function(e){
		e.preventDefault();
	
		
		$.ajax({
			url: "<?php echo site_url();?>staff_schedule/addemail",
			type:'post',
			data:$('#emailform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
					$("#mainbodyc").html(response);
					$('#addemailmod').modal('hide');
					
		             //caljs();
					//location.reload();
					$('#message').show();
				    $('#message .msg').html("Email Send Successfully");
				//} 
				
				//$('#message').show();
				//$('#message .msg').text(response);
			}
		});
    });
	
	
	//email preview
	$(document).on('click','#previewbtn', function(e){
		
		e.preventDefault();
	      $.ajax({
			url: "<?php echo site_url();?>staff_schedule/emailPreview",
			type:'post',
			data:$('#emailform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				//$('#addemailmod').modal('hide');
				$("#moddiv").html(response);
				
				//$('#email_preview_modal').modal('show');
				
			}
		}); 
    });
</script>


 <!--add by ajax on calendar view shift,comment -->
 <script>
 //shift 

    $(document).on('click','#shift_submit', function(e){
		//alert('hi')
		e.preventDefault();
		var staff_id = localStorage.getItem("staffids");
		var shiftdate = localStorage.getItem("daysid");
		var business_id = $('#business_id').val();
		var start_time = $('#shifttime').val();
		var arr = start_time.split("-");
		var time = arr[0];
		var time1 = arr[1];
		
		var diff = time - time1;
        var finalTime = Math.abs(diff);
		var datepicker = $('#datepicker').val();
		var dayvalue = $('#dayvalue').val();
		
		
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/addshiftcal",
			type:'post',
			data:{business_id: business_id,staff_id: staff_id,start_time: start_time,firstdate: datepicker,shiftdate:shiftdate,dayvalue: dayvalue},
			success: function(response){
				//alert(response);
				$("#mainbodyc").html(response);
				//$('#hours').html(finalTime);
				caljs();
			},
			
		});
    });
	
	//comment
	 $(document).on('click','#comment_submit', function(e){
		 
       e.preventDefault();
	 
		var staff_id = localStorage.getItem("staffids");
		var commentdate = localStorage.getItem("daysid");
		var business_id = $('#business_id').val();
		var comment = $('#comment').val();
		var datepicker = $('#datepicker').val();
		var dayvalue = $('#dayvalue').val();
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/addcommentcal",
			type:'post',
			data:{business_id: business_id,staff_id: staff_id,comment: comment,firstdate: datepicker,commentdate: commentdate,dayvalue: dayvalue},
			success: function(response){
				//alert(response); 
				$("#mainbodyc").html(response);
				caljs();
				
				
	            
			}
		});
    });
	
	// add break
	 $(document).on('click','#break_submit', function(e){
		
       e.preventDefault();
		var staff_id = localStorage.getItem("staffids");
		var breakdate = localStorage.getItem("daysid");
		var business_id = $('#business_id').val();
		var addbreak = $('#break').val();
		var datepicker = $('#datepicker').val();
		var dayvalue = $('#dayvalue').val();
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/addbreakcal",
			type:'post',
			data:{business_id: business_id,staff_id: staff_id,addbreak: addbreak,firstdate: datepicker,breakdate: breakdate,dayvalue: dayvalue},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
				
			}
		});
    });
	
	
	// week
	$(document).on('click','#week', function(e){
        $('#daydates').hide();		
		$('#weekdates').show();
		e.preventDefault();
		$('#dayvalue').val(1);
		
		var business_id = $('#business_id').val();
		var datepicker = $('#datepicker').val();
		
		 $.ajax({
			 url: "<?php echo site_url();?>staff_schedule/showCalendar",
			type:'post',
			data:{business_id: business_id,firstdate: datepicker},
			success: function(response){
				//console.log(response);
				    
					$('#mainbodyc').html(response); 
					caljs();
				
			}
		});
    });
	
	// day
	$(document).on('click','#day', function(e){
		$('#weekdates').hide();
		$('#daydates').show();
		e.preventDefault();
		$('#dayvalue').val(2); 
		
		var business_id = $('#business_id').val();
		var datepicker = $('#datepicker').val();
		//alert(datepicker);
		 $.ajax({
			 url: "<?php echo site_url();?>staff_schedule/dayCalendar",
			type:'post',
			data:{business_id: business_id,firstdate: datepicker},
			success: function(response){
				//alert(response);
				
				$('.curentday').html(datepicker);
				$('#mainbodyc').html(response); 
				caljs();
				
			}
		});
    });
	
	

	
	

function setAttr(val,staffid,type,index,dbId){
	/* $('#cut_'+id+'_'+index).attr('data-type',type);
	$('#cut_'+id+'_'+index).attr('data-val',val);
	$('#cut_'+id+'_'+index).attr('data-dbId',dbId); */
	
	localStorage.setItem('itemType',type);
	localStorage.setItem('itemVal',val);
	localStorage.setItem('itemDBId',dbId);
	localStorage.setItem('itemIndex',index);
	localStorage.setItem('itemStaffId',staffid);
	    
}

function cutItems(){
	var type = localStorage.getItem('itemType');
	var val = localStorage.getItem('itemVal');
	var dbId = localStorage.getItem('itemDBId');
	var index = localStorage.getItem('itemIndex');
	var staffid = localStorage.getItem('itemStaffId');
	var dayvalue = $('#dayvalue').val();
	var datepicker = $('#datepicker').val();
	var business_id = $('#business_id').val();
	   if(type == 1)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/shiftDelete",
				type:'post',
				data:{shift_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//alert(response);
					//$('#s_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
		
		
		if(type == 2)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/commentDelete",
				type:'post',
				data:{comment_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//$('#cmt_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
		
		if(type == 3)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/breakDelete",
				type:'post',
				data:{break_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//$('#b_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
}



function copyItems(){
	var type = localStorage.getItem('itemType');
	var val = localStorage.getItem('itemVal');
	var dbId = localStorage.getItem('itemDBId');
	var index = localStorage.getItem('itemIndex');
	var staffid = localStorage.getItem('itemStaffId');
	
}


function deleteItems(){
	
	var type = localStorage.getItem('itemType');
	var dbId = localStorage.getItem('itemDBId');
	var dayvalue = $('#dayvalue').val();
	var datepicker = $('#datepicker').val();
	var business_id = $('#business_id').val();
	//alert(dbId);
	   if(type == 1)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/shiftDelete",
				type:'post',
				data:{shift_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//$('#s_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
		
		
		if(type == 2)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/commentDelete",
				type:'post',
				data:{comment_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//$('#cmt_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
		
		if(type == 3)
		{
			$.ajax({
			    url: "<?php echo site_url();?>staff_schedule/breakDelete",
				type:'post',
				data:{break_id: dbId,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
				success: function(response){
					//$('#b_row').hide();
					$("#mainbodyc").html(response);
					caljs();
				}
		   });
		}
}


     $(document).on('click','#paste', function(e){
		e.preventDefault();
		
		var type = localStorage.getItem('itemType');
		var val = localStorage.getItem('itemVal');
		//var dbId = localStorage.getItem('itemDBId');
		//var index = localStorage.getItem('itemIndex');
		//var staffid = localStorage.getItem('itemStaffId');
		//alert(val);
	    var arrdate = val.split("-");
		var startdate = arrdate[0];
		var enddate = arrdate[1];
		
		var date = $(this).data('dates');
		var staffids = $(this).data('staffid');
		var business_id = $('#business_id').val();
		var datepicker = $('#datepicker').val();
		var dayvalue = $('#dayvalue').val();
		
		
		
		if(type == 1){
			
		    $.ajax({
				 url: "<?php echo site_url();?>staff_schedule/addshiftcals",
				type:'post',
				data:{business_id: business_id,staff_id: staffids,start_time: startdate,end_time: enddate,firstdate: datepicker,shiftdate:date,dayvalue: dayvalue},
				success: function(response){
					//console.log(response);
					$("#mainbodyc").html(response);
					caljs();
				}
			});
		}
		
		
		if(type == 2){
		 	$.ajax({
				 url: "<?php echo site_url();?>staff_schedule/addcommentcals",
				type:'post',
				data:{business_id: business_id,staff_id: staffids,comment: val,firstdate: datepicker,commentdate: date,dayvalue: dayvalue},
				success: function(response){
					//alert(response); 
					$("#mainbodyc").html(response);
					caljs();
				}
			});
		}
		
		if(type == 3){
		 	$.ajax({
				 url: "<?php echo site_url();?>staff_schedule/addbreakcal",
				type:'post',
				data:{business_id: business_id,staff_id: staffids,addbreak: val,firstdate: datepicker,breakdate: date,dayvalue: dayvalue},
			      success: function(response){
					//alert(response); 
					$("#mainbodyc").html(response);
					
					caljs();
				}
			});
		}
		
	});



	///delete for all
	/* $(document).on('click','#shift_remove', function(e){
		
		e.preventDefault();
		var shift_idr = $('#shift_remove').val();
		var dayvalue = $('#dayvalue').val();
		var datepicker = $('#datepicker').val();
		var business_id = $('#business_id').val();
		//alert(shift_id);
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/shiftDelete",
			type:'post',
			data:{shift_id: shift_idr,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
			}
		});
    }); */
	function shift_remove(vals){
		//alert(vals);
		
		var shift_idr = vals;
		var dayvalue = $('#dayvalue').val();
		var datepicker = $('#datepicker').val();
		var business_id = $('#business_id').val();
		//alert(shift_idr);
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/shiftDelete",
			type:'post',
			data:{shift_id: shift_idr,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
			}
		});
    }; 
	
	$(document).on('click','#timeoff_remove', function(e){
		e.preventDefault();
		var timeoff_id = $('#timeoff_remove').val();
		var dayvalue = $('#dayvalue').val();
		var datepicker = $('#datepicker').val();
		var business_id = $('#business_id').val();
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/timeoffDelete",
			type:'post',
			data:{timeoff_id: timeoff_id,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
			}
		});
    });
	$(document).on('click','#comment_remove', function(e){
		e.preventDefault();
		var comment_id = $('#comment_remove').val();
		var dayvalue = $('#dayvalue').val();
		var datepicker = $('#datepicker').val();
		var business_id = $('#business_id').val();
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/commentDelete",
			type:'post',
			data:{comment_id: comment_id,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
				
			}
		});
    });
	$(document).on('click','#break_remove', function(e){
		e.preventDefault();
		var break_id = $('#break_remove').val();
		var dayvalue = $('#dayvalue').val();
		var datepicker = $('#datepicker').val();
		var business_id = $('#business_id').val();
		$.ajax({
			 url: "<?php echo site_url();?>staff_schedule/breakDelete",
			type:'post',
			data:{break_id: break_id,dayvalue: dayvalue,firstdate: datepicker,business_id: business_id},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
			}
		});
    });
	
	//delete for all done closed	
	
	
	//calendar js
	function caljs(){
	//on right click show menu
		$(".schedule_box").bind("contextmenu",function(e){
			$(".verticle_menu").hide();
			$(this).children(".verticle_menu").toggle();
			$(this).children(".verticle_menu_scnd").hide();
			return false;
		});
		//hide menu on click
		$(".schedule_box").on("click", function(e){
			$(".verticle_menu").hide();
			$(".verticle_menu_scnd").hide();
		});
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
			vertical_menu_second();
		});
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
			vertical_menu_second();
		});
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
			vertical_menu_second();
		});
		// vertical menus show
		vertical_menu_second();
		
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
	}


//show vertical menu on right click
	function vertical_menu_second(){
		$(".append_td_data .form_group").bind("contextmenu",function(e){
			$(".verticle_menu_scnd").hide();
			$(".verticle_menu").hide();
			$(this).parents(".schedule_box").children(".verticle_menu_scnd").toggle();
			return false;
		});
	}
</script>



