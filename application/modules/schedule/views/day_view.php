                 
						 <?php 
						  $hourCount = 0;
						 $peopleCount= 0;

						 if(!empty($staffName)){ 
						
			             foreach ($staffName as $key => $value) { ?>
                        <tr class="daytable">
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3><?php echo $value['first_name']." ".$value['last_name']; ?> </h3>
								<?php
								 	$fcount = 0;
										$shiftsf = isset($finalArray[$alldates[0]]) ? $finalArray[$alldates[0]] : [];
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
											} ?>
											 
									 <?php 
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
											    
												
										<?php 
										
										   }
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
												<div class="form_group shift_grp" id="s_row">
												<input type="text" id="shiftCut" onFocus="setAttr(this.value,'<?=$value['id']?>',1,0,<?=$v['id']?>)" value="<?php if($v['end_time']){echo $v['start_time'].'-'.$v['end_time'];} else{echo $v['start_time'];} ?>">
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
						</tr>
							
						 <?php } }?>
                    
                         <tr class="daytable">
							<td>
							  <div class="s_hour">Scheduled hours</div>
							  <div class="emp">Employees</div>
							</td>
						    <td>
							  <div class="s_hour"><?php echo (abs($hourCount)); ?> Hrs</div>
							  <div class="emp"><?php echo $peopleCount; ?> People</div>
							</td>
						</tr>