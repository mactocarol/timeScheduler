<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Time Schedule Login</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets');?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets');?>/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets');?>/css/responsive.css" rel="stylesheet">
</head>
<body class="login_back">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="login_sec">
              <div class="overlay_login"></div>
			     <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
			<form class="user" id="loginform" method="post" action="<?php echo site_url('login');?>">
              <div class="user_employ_login">
                <div class="custom-checkbox small">
                <label class="custom_check">Employer
                  <input type="radio" value="1" name="user_type" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="custom-checkbox small">
                <label class="custom_check">User
                  <input type="radio" value="3" name="user_type">
                  <span class="checkmark"></span>
                </label>
              </div>
              </div>
             <div class="row">
              
              <div class="col-lg-12">   
                <div class="login_part">
				<?php
				// display error & success messages
				if(isset($message)) {					
					if($success){
					?>
					  <div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Success!</strong> <?php print_r($message); ?>
					  </div>						
					<?php
					}else{
					?>
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> <?php print_r($message); ?>
						</div>						
					<?php
					}
				}
				?>
               
                 
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"  required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password"  required="">
                    </div>
                    <div class="form-group">
                      <div class="custom-checkbox small">
                        <label class="custom_check">Remember Me
                          <input type="checkbox" value="" name="">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
					 <button class="btn btn-primary btn-user btn-block" type="submit">Log In</button>
                  
                  
                  <hr>
                  <div class="text-center">
                    <a class="small for-pass" href="<?php echo site_url('user/forgotPassword');?>">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
			</form>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets');?>/js/sb-admin-2.min.js"></script>

</body>

</html>
