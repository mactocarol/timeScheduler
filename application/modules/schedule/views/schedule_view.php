
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
                 <li class="tab_link" data-tab="tab_2">Time off</li>
               </ul>
             </div>
             <div class="tab_content active" id="tab_1">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2><?php echo $business_name; ?></h2>
				   
                   <label class="saving_schedule" title="All changes are automatically saved.">All Changes saved</label>
                   <span><a href="#">Refresh</a></span>
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
                             <th><?php echo $currdates; ?> </th>
						  </tr>
                         </thead>
                         <tbody id="mainbodyc">
						 <?php if(!empty($staffName)){ 
			                     foreach ($staffName as $key => $value) { ?>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3><?php echo $value['first_name']." ".$value['last_name']; ?> </h3>
								 
                                 <span>0 Hours</span>
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
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
											    
												
										<?php 	}
										}
									}
							  ?>

							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[0]]) ? $finalArray[$alldates[0]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group shift_grp" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<div class="btn_div">
													  <button type="button" class="remove_btn" id="s_remove" >&times;</button>
													</div>
								                  </div>
												<?php }
											}
										}
								  ?>	
								
								  <?php
									 $comments = isset($finalArrayComment[$alldates[0]]) ? $finalArrayComment[$alldates[0]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													    <div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
														    
														    
														</div>
													</div>
														
														
												<?php 	}
												}
											}
									  ?>
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  </div>
                              
                              <!-- Append data -->
							  <?php if(isset($finalArrayTimeoff[$alldates[0]]) ? $finalArrayTimeoff[$alldates[0]] : []) ?>
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
								
                                  <li>Paste</li>
								  <!--<script> 
										

										$("#ccc").bind({
											copy : function(){
												//alert('copy behaviour detected!');
											},
											paste : function(){
												//alert('paste behaviour detected!');
											},
											cut : function(){
												//alert('cut behaviour detected!');
											}
										});									
								 </script> -->
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
							  <!--<div class="cccv">
                                <ul>
                                  <li>Cut</li>
                                  <li>Copy</li>
                                  <li>Paste</li>
                                  <li>Edit</li>
                                  <li>Delete</li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[1]]) ? $finalArrayTimeoff[$alldates[1]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
												
											     <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
                                  <?php
										$shifts = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group shift_grp" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<div class="btn_div">
													  <button type="button" class="remove_btn" id="s_remove">&times;</button>
													</div>
								                  </div>
												<?php }
											}
										}
								  ?>	
								
								  <?php
									 $comments = isset($finalArrayComment[$alldates[1]]) ? $finalArrayComment[$alldates[1]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
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
                              
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[2]]) ? $finalArrayTimeoff[$alldates[2]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[2]]) ? $finalArray[$alldates[2]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<?php echo $v['start_time'].'-'.$v['end_time'].'<br>'; ?>
													<button type="button" class="remove_btn" id="s_remove">&times;</button>
								                   </div>
												<?php }
											}
										}
								  ?>	
								   <?php
									 $comments = isset($finalArrayComment[$alldates[2]]) ? $finalArrayComment[$alldates[2]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                               <ul>
                                  <li>Paste</li>
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
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[3]]) ? $finalArrayTimeoff[$alldates[3]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[3]]) ? $finalArray[$alldates[3]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<button type="button" class="remove_btn" id="s_remove">&times;</button>
								                   </div>
												<?php }
											}
										}
										

								  ?>
									<?php
									 $comments = isset($finalArrayComment[$alldates[3]]) ? $finalArrayComment[$alldates[3]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
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
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[4]]) ? $finalArrayTimeoff[$alldates[4]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[4]]) ? $finalArray[$alldates[4]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<button type="button" class="remove_btn" id="s_remove">&times;</button>
								                   </div>
												<?php }
											}
										}
								  ?>
									<?php
									 $comments = isset($finalArrayComment[$alldates[4]]) ? $finalArrayComment[$alldates[4]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                               <ul>
                                  <li>Paste</li>
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
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[5]]) ? $finalArrayTimeoff[$alldates[5]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[5]]) ? $finalArray[$alldates[5]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<button type="button" class="remove_btn" id="s_remove">&times;</button>
								                   </div>
												<?php }
											}
										}
								  ?>
								<?php
									 $comments = isset($finalArrayComment[$alldates[5]]) ? $finalArrayComment[$alldates[5]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
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
                             </td>
							 <td class="pad schedule_box ">
							 <?php
							 $timeoffs = isset($finalArrayTimeoff[$alldates[6]]) ? $finalArrayTimeoff[$alldates[6]] : []; 
									foreach($timeoffs as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ ?>
											  <div class="Vacation addtime_off_bx" style="background-color: <?php echo $v['color_code']; ?>">
												 <p><?php echo $v['timeoff_type']; ?><span><?php if($v['start_time'] && $v['end_time']){echo $v['start_time'].'-'.$v['end_time']; } else{ echo 'Full day';} ?></span></p>
											   <button type="button" class="remove_btn" id="s_remove">&times;</button>
											   </div>
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[6]]) ? $finalArray[$alldates[6]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'].'<br>';} else{echo $v['start_time'];} ?>
													<button type="button" class="remove_btn" id="s_remove">&times;</button>
								                   </div>
												<?php }
											}
										}
								  ?>
                                <?php
									 $comments = isset($finalArrayComment[$alldates[6]]) ? $finalArrayComment[$alldates[6]] : []; 
											foreach($comments as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){ ?>
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['comment']; ?>
													<div class="btn_div">
														  <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
													<div class="form_group shift_grp" id="cmt_row">
													<?php echo $v['break']; ?>
													<div class="btn_div">
														   <button type="button" class="remove_btn" id="s_remove">&times;</button>
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
                               <div class="verticle_menu">
                               <ul>
                                  <li>Paste</li>
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
							   <a class="staff_lnk" href="#" id="addstaff">
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

<input type="hidden" id="business_id" value="<?php echo $this->uri->segment(4); ?>">
<input type="hidden" id="dayvalue">


   <!--  <script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
<!-- add staff by ajax -->
 <script>
 $('#message').hide();	
 $('#daydates').hide();	
 
	$(document).on('click','#addstaffbutton', function(){
		//alert('hi');
		var fname = $('#fname').val();
		//alert(fname);
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
				//console.log(response);
				$('#message').show();
				$('#message .msg').html("Staff Added Successfully");
				
			}
		});
    });	
	
	
	
	
	//add multiple staff button
	$(document).on('click','#addmultistaff', function(){
		
	      $.ajax({
			url: "<?php echo site_url();?>schedule/addMultistaff",
			type:'post',
			data:$('#multistaffform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				
				//$('#multiple_staff_modal').modal('hide');
				//$('#addstaffmod').modal('hide');
				//$("#moddiv").html(response);
				//$('#message').show();
				//$('#message .msg').html("Staffs Added Successfully");
				//$('#email_preview_modal').modal('show');
				
			}
		}); 
    });
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
			 url: "<?php echo site_url();?>schedule/addshift",
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
	$(document).on('submit','#timeoffform', function(e){
		e.preventDefault();
	    $('#daydates').hide();
		$('#weekdates').show(); 
		
		$.ajax({
			 url: "<?php echo site_url();?>schedule/addtimeoff",
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
			url: "<?php echo site_url();?>schedule/addemail",
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
			url: "<?php echo site_url();?>schedule/emailPreview",
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
		/* $('#daydates').hide();
		$('#weekdates').show(); */
       e.preventDefault();
		var staff_id = localStorage.getItem("staffids");
		var shiftdate = localStorage.getItem("daysid");
		var business_id = $('#business_id').val();
		var start_time = $('#shifttime').val();
		var datepicker = $('#datepicker').val();
		var dayvalue = $('#dayvalue').val();
		//var weekvalue = $('#weekvalue').val();
		//alert(dayvalue);
		
		$.ajax({
			 url: "<?php echo site_url();?>schedule/addshiftcal",
			type:'post',
			data:{business_id: business_id,staff_id: staff_id,start_time: start_time,firstdate: datepicker,shiftdate:shiftdate,dayvalue: dayvalue},
			success: function(response){
				$("#mainbodyc").html(response);
				caljs();
			}
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
			 url: "<?php echo site_url();?>schedule/addcommentcal",
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
			 url: "<?php echo site_url();?>schedule/addbreakcal",
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
			 url: "<?php echo site_url();?>schedule/showCalendar",
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
			 url: "<?php echo site_url();?>schedule/dayCalendar",
			type:'post',
			data:{business_id: business_id,firstdate: datepicker},
			success: function(response){
				//alert(response);
				$('#mainbodyc').html(response); 
				caljs();
				
			}
		});
    });
	
	//calendar js
	function caljs(){
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
		});
	}



//print
 function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#prinnt').on('click',function(){
printData();
}); 
</script>
