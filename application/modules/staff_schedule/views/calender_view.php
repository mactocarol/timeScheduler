
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
										// $shiftsf = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : [];  									
									
									// print_r($shiftsf);
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                 <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Paste</li>
								 <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[0]; ?>">Add Shift</li>-->
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
										$staffArray = [];
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){ ?>
												<div class="form_group" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,1,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
													<button type="button" class="remove_btn" onclick="shift_remove(this.value)"  value="<?php echo $v['id']; ?>">&times;</button>
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
								 <!-- <li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[1]; ?>">Add Shift</li>-->
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
                               <div class="verticle_menu">
                                 <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Paste</li>
								  <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[2]; ?>">Add Shift</li>-->
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                 <ul>
                                 <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Paste</li>
								  
                                  <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[3]; ?>">Add Shift</li>-->
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Paste</li>
								  <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[4]; ?>">Add Shift</li>-->
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
								  <!--<input type="text" name="name" placeholder="E.g. 9-5" value="">-->
								  
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Paste</li>
								  <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[5]; ?>">Add Shift</li>-->
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
                               <div class="verticle_menu">
                               <ul>
                                  <li id="paste" data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Paste</li>
								  <!--<li class="add_shift_btn"  data-staffid="<?= $value['id']; ?>" data-dates="<?= $alldates[6]; ?>">Add Shift</li>-->
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
						   
                       
						 