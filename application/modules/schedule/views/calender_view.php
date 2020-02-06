
						 <?php if(!empty($staffName)){ 
						 
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
						 
						 $fcount = 0;
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
										// $shiftsf = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : [];  									
									
									// print_r($shiftsf);
									 foreach($shiftsf as $key=>$val){
										if($key == $value['id']){
											foreach($val as $v){ 
											if($v['end_time']){
											 $arrayf = explode(":", $v['end_time']); 
											 $end_times = $arrayf[0];
											 
											 $arrayf1 = explode(":", $v['start_time']); 
											 $start_times = $arrayf1[0];
											 $fcount += $end_times - $start_times; ?>
											 
									 <?php } 
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
									$staffArray = [];
									
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												      <input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,0,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													    <button type="button" class="remove_btn" onclick="shift_remove(this.value)" value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
													 $array = explode(":", $v['end_time']); 
													 $end_times = $array[0];
													 
													 $array1 = explode(":", $v['start_time']); 
													 $start_times = $array1[0];
													 $hourCount = $hourCount + ($end_times - $start_times);
													 if(!in_array($value['id'],$staffArray)){
														 $staffArray[] = $value['id'];
														$peopleCount++;
													 }
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
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
												
										<?php 	}
										}
									}
							  ?>
							  <span class="add_icon add_more_input" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">
                                <i class="fas fa-plus"></i>
                              </span>
                             <div class="append_td_data">
                                
								  <?php
										$shifts = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,1,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													<button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
													$array2 = explode(":", $v['end_time']); 
													$end_times = $array2[0];
													 
													 $array3 = explode(":", $v['start_time']); 
													 $start_times = $array3[0];
													 $hourCount1 = $hourCount1 + ($end_times - $start_times);
														  if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount1++;
														 }
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
									 $staffArray = [];
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
                               <div class="verticle_menu">
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
                              <!-- shecule menus -->
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
													<button type="button" class="remove_btn" onclick="shift_remove(this.value)" value="<?php echo $v['id']; ?>">&times;</button>
								                   </div>
												<?php 
												if($v['end_time']){
												$array4 = explode(":", $v['end_time']); 
				                                $end_times = $array4[0];
												 
												 $array5 = explode(":", $v['start_time']); 
				                                 $start_times = $array5[0];
												 $hourCount2 = $hourCount2 + ($end_times - $start_times);
												 if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount2++;
														 }
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
                               <div class="verticle_menu">
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
													$array6 = explode(":", $v['end_time']); 
													$end_times = $array6[0];
													 
													 $array7 = explode(":", $v['start_time']); 
													 $start_times = $array7[0];
													 $hourCount3 = $hourCount3 + ($end_times - $start_times);
													 if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount3++;
														 }
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
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
													$array8 = explode(":", $v['end_time']); 
													$end_times = $array8[0];
													 
													 $array9 = explode(":", $v['start_time']); 
													 $start_times = $array9[0];
													 $hourCount4 = $hourCount4 + ($end_times - $start_times);
													 if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount4++;
														 }
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
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
													$array10 = explode(":", $v['end_time']); 
													$end_times = $array10[0];
													 
													 $array11 = explode(":", $v['start_time']); 
													 $start_times = $array11[0];
													 $hourCount5 = $hourCount5 + ($end_times - $start_times);
													 if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount5++;
														 }
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
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
													$array12 = explode(":", $v['end_time']); 
													$end_times = $array12[0];
													 
													 $array13 = explode(":", $v['start_time']); 
													 $start_times = $array13[0];
													 $hourCount6 = $hourCount6 + ($end_times - $start_times);
													 if(!in_array($value['id'],$staffArray)){
															 $staffArray[] = $value['id'];
															$peopleCount6++;
														 }
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
                               <div class="verticle_menu">
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
						 <?php } } ?>
							 <tr class="schdule_hour_row">
							 <td>
							  <div class="s_hour">Scheduled hours</div>
							  <div class="emp">Employees</div>
							</td>
							<td>
							  <div class="s_hour"><?php echo $hourCount; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount1; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount1; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount2; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount2; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount3; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount3; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount4; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount4; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount5; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount5; ?> People</div>
							</td>
							<td>
							   <div class="s_hour"><?php echo $hourCount6; ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount6; ?> People</div>
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
                       
						 