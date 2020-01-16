
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
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                            
							 
                              <div class="append_td_data">
                                <div class="form_group" id="s_row">
								  <?php
										$shifts = isset($finalArray[$alldates[0]]) ? $finalArray[$alldates[0]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){
													echo $v['start_time'].'-'.$v['end_time'].'<br>';
												}
											}
										}
								  ?>	
								  <input type="text" name="name" placeholder="E.g. 9-5" value="">
								  <button type="button" class="remove_btn" id="s_remove">&times;</button>
								</div>
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
								<div class="form_group" id="s_row">
								  <?php
										$shifts = isset($finalArray[$alldates[1]]) ? $finalArray[$alldates[1]] : []; 
										foreach($shifts as $key=>$val){
											if($key == $value['id']){
												foreach($val as $v){
													echo $v['start_time'].'-'.$v['end_time'].'<br>';
												}
											}
										}
								  ?>	
								  
								  <button type="button" class="remove_btn" id="s_remove">&times;</button>
								</div>
                              </div>
                              <!-- Append data -->
                              <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
									<div class="form_group" id="s_row">
									  <?php
											$shifts = isset($finalArray[$alldates[2]]) ? $finalArray[$alldates[2]] : []; 
											foreach($shifts as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){
														echo $v['start_time'].'-'.$v['end_time'].'<br>';
													}
												}
											}
									  ?>	
									  
									  <button type="button" class="remove_btn" id="s_remove">&times;</button>
									</div>
                              </div>
                              <!-- Append data -->
                               <!-- shecule menus -->
                               <div class="verticle_menu">
                                <ul>
                                  <li>Paste</li>
                                  <li class="add_shift_btn">Add Shift</li>
                                  <li class="add_cmt_btn">Add Comment</li>
                                  <li><a href="#" data-toggle="modal" data-target="#addtime">Add Time off</a></li>
                                  <li class="ver_menu"><a href="#">Add Break</a>
                                    <div class="submenu break_menu">
                                      <ul>
                                        <li>15 minutes</li>
                                        <li>30 minutes</li>
                                        <li>45 minutes</li>
                                        <li>1 hour</li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li><a href="#" data-toggle="modal" data-target="#emailschedule">Email</a></li>
                                </ul>
                              </div>
                              <!-- shecule menus -->
                             </td>
                             <td class="pad schedule_box">
                              <!--<div class="Vacation addtime_off_bx">
                                 <p>Vacation<span>9:00am - 4:00pm</span></p>
                               </div>-->
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
							   <!-- Append data -->
                              <div class="append_td_data">
									<div class="form_group" id="s_row">
									  <?php
											$shifts = isset($finalArray[$alldates[3]]) ? $finalArray[$alldates[3]] : []; 
											foreach($shifts as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){
														echo $v['start_time'].'-'.$v['end_time'].'<br>';
													}
												}
											}
									  ?>	
									  
									  <button type="button" class="remove_btn" id="s_remove">&times;</button>
									</div>
                              </div>
                              <!-- Append data -->
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
							   <!-- Append data -->
                              <div class="append_td_data">
									<div class="form_group" id="s_row">
									  <?php
											$shifts = isset($finalArray[$alldates[4]]) ? $finalArray[$alldates[4]] : []; 
											foreach($shifts as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){
														echo $v['start_time'].'-'.$v['end_time'].'<br>';
													}
												}
											}
									  ?>	
									  
									  <button type="button" class="remove_btn" id="s_remove">&times;</button>
									</div>
                              </div>
                              <!-- Append data -->
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
							   <!-- Append data -->
                              <div class="append_td_data">
									<div class="form_group" id="s_row">
									  <?php
											$shifts = isset($finalArray[$alldates[5]]) ? $finalArray[$alldates[5]] : []; 
											foreach($shifts as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){
														echo $v['start_time'].'-'.$v['end_time'].'<br>';
													}
												}
											}
									  ?>	
									  
									  <button type="button" class="remove_btn" id="s_remove">&times;</button>
									</div>
                              </div>
                              <!-- Append data -->
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
							   <!-- Append data -->
                              <div class="append_td_data">
									<div class="form_group" id="s_row">
									  <?php
											$shifts = isset($finalArray[$alldates[6]]) ? $finalArray[$alldates[6]] : []; 
											foreach($shifts as $key=>$val){
												if($key == $value['id']){
													foreach($val as $v){
														echo $v['start_time'].'-'.$v['end_time'].'<br>';
													}
												}
											}
									  ?>	
									  
									  <button type="button" class="remove_btn" id="s_remove">&times;</button>
									</div>
                              </div>
                              <!-- Append data -->
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
                       
						 