

<body class="login_back">

  <div class="container">

    <!-- Outer Row -->
      <div class="change_pass_center">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
              <div class="change_pass_form">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                  </div>
                  	<form method="post" action="<?php echo base_url('staff_schedule/updatePasswords'); ?>" class="user">
					<h4 style="color: green;"><?php echo $this->session->flashdata('message'); ?></h4>
                    <div class="form-group">
                      <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password">
					  <label id="name-error" style="font-size: 1rem; color:red;" class="" for="current_password"><?php echo form_error('current_password'); ?></label>
											     
                    </div>
					<div class="form-group">
                      <input type="password" class="form-control" name="new_password" id="exampleInputEmail" placeholder="Enter New Password">
					  <label id="name-error"  style="font-size: 1rem; color:red;" class=""  for="new_password"><?php echo form_error('new_password'); ?></label>
											      
                    </div>
					<div class="form-group">
                      <input type="password" class="form-control" name="conf_password" id="exampleInputEmail" placeholder="Enter Confirm Password">
					   <label id="name-error" style="font-size: 1rem; color:red;" class="" for="conf_password"><?php echo form_error('conf_password'); ?></label>
											     
                    </div>
					<input type="submit"  value="Update Password" class="update-pass">
                   <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                      Update Password
                    </a>-->
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                 
                </div>
              </div>
          </div>
        </div>

      </div>


  </div>

