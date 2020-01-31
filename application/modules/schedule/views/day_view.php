                 
						 <?php if(!empty($staffName)){ 
			                     foreach ($staffName as $key => $value) { ?>
                        <tr class="daytable">
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
						</tr>
						 <?php } }?>
                    
                    