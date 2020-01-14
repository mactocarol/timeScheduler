<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Time Schedule</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="js/jquery_ui/jquery-ui.css" rel="stylesheet">
  <link href="js/jquery_ui/jquery-ui-timepicker-addon.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav side_bar_header sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-clock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Express Schedule</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item" data-toggle="modal" data-target="#addshift">
        <a class="nav-link" href="#">
          <i class="fas fa-user-clock"></i>
          <span>Add Shift</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item" data-toggle="modal" data-target="#addtime">
        <a class="nav-link" href="#">
          <i class="far fa-clock"></i>
          <span>Add Time-off</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item" data-toggle="modal" data-target="#emailschedule">
        <a class="nav-link" href="#">
          <i class="far fa-envelope"></i>
          <span>Email Schedule</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-print"></i>
          <span>Print Schedule</span></a>
      </li>
      
      <!-- Divider -->
     <hr class="sidebar-divider my-0">
      <!-- Nav Item - Charts -->
      <li class="nav-item" data-toggle="modal" data-target="#addstaff">
        <a class="nav-link" href="#">
          <i class="fas fa-users"></i>
          <span>Add Staff Member</span></a>
      </li>
      <!-- Divider -->
     <hr class="sidebar-divider">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- start of Main Content -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- navbar -->

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <!-- <div class="input-group search_bar">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary change" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div> -->
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <!-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                
                <span class="badge badge-danger badge-counter">7</span>
              </a> -->
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- navbar -->
        <div class="container-fluid">
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
                   <h2>Software Schedule</h2>
                   <label class="saving_schedule" title="All changes are automatically saved.">All Changes saved</label>
                   <span><a href="#">Refresh</a></span>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="add_time_btn" data-toggle="modal" data-target="#addtime">Add Time Off</button>
                   <button class="crate_shift_btn" data-toggle="modal" data-target="#addshift">Create Shift</button>
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
                        <input type="text" name="s_date" class="date_picker">
                      </div>
                      <div class="week_links ctrl_item">
                        <span class="text_link prev_link">Previous Week</span>
                        <span class="text_link next_link">Next Week</span>
                      </div>
                    </div>
                    <!-- left side -->
                    <!-- Right side -->
                    <div class="controler_right">
                      <div class="email_text ctrl_item">
                        <a href="#" class="text_link" data-toggle="modal" data-target="#emailschedule">Email</a>
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
                        <li class="tab_link active_lnk" data-tab="week_tab">week</li>
                        <li class="tab_link" data-tab="day_tab">day</li>
                      </ul>
                    </div>
                    <!-- Right side -->
                  </div>
                  <!-- controler bar end-->
                  <!-- table start -->
                  <div class="schedule_tables week_schedule_tbl">
                    <div class="table-responsive">
                       <table class="table table-bordered dataTable">
                         <thead>
                           <tr>
                             <th>Employee Name</th>
                             <th>Wednesday, 1 Jan</th>
                             <th>Thursday, 2 Jan</th>
                             <th>Friday, 3 Jan</th>
                             <th>Saturday, 4 Jan</th>
                             <th>Sunday, 5 Jan</th>
                             <th>Monday, 6 Jan</th>
                             <th>Tuesday, 7 Jan</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3>Neha Sharma</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon add_more_input">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
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
                              <div class="Vacation addtime_off_bx">
                                 <p>Vacation<span>9:00am - 4:00pm</span></p>
                               </div>
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                           </tr>
                           <tr>
                             <td class="pad backcolor">
                               <div class="name">
                                 <h3>Anush Gour</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
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
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                             <td class="pad schedule_box">
                               <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                           </tr>
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
                   <a class="staff_lnk" href="#" data-toggle="modal" data-target="#addstaff">
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
                <div class="s_tab_content" id="day_tab">
                  <!-- controler bar start-->
                  <div class="controler_bar">
                    <!-- left side -->
                    <div class="controler_left">
                      <div class="ctrl_date ctrl_item">
                        <span>Date</span>
                        <input type="text" name="s_date" class="date_picker">
                      </div>
                      <div class="week_links ctrl_item">
                        <span class="text_link prev_link">Previous Day</span>
                        <span class="text_link next_link">Next Day</span>
                      </div>
                    </div>
                    <!-- left side -->
                    <!-- Right side -->
                    <div class="controler_right">
                      <div class="email_text ctrl_item">
                        <a href="#" class="text_link" data-toggle="modal" data-target="#emailschedule">Email</a>
                      </div>
                      <div class="download_text ctrl_item">
                        <a href="#" class="text_link">Download Schedule</a>
                      </div>
                      <div class="print_text ctrl_item">
                        <span class="print_button text_link">Print</span>
                      </div>
                      <div class="email_text ctrl_item">
                        <span class="text_link">clear Day</span>
                      </div>
                      <ul class="schedules_tabs">
                        <li class="tab_link" data-tab="week_tab">week</li>
                        <li class="tab_link active_lnk" data-tab="day_tab">day</li>
                      </ul>
                    </div>
                    <!-- Right side -->
                  </div>
                  <!-- controler bar end-->
                  <!-- table start -->
                  <div class="schedule_tables day_schedule_tbl">
                     <div class="table-responsive">
                       <table class="table table-bordered dataTable">
                         <thead>
                           <tr>
                             <th>Employee Name</th>
                             <th>Wednesday, 1 Jan</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                             <td class="pad backcolor s_td_name">
                               <div class="name">
                                 <h3>Neha Sharma</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                              <!-- Append data -->
                              <div class="append_td_data">
                                
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
                           </tr>
                           <tr>
                             <td class="pad backcolor">
                               <div class="name">
                                 <h3>Anush Gour</h3>
                                 <span>0 Hours</span>
                               </div>
                             </td>
                             <td class="pad schedule_box">
                              <span class="add_icon">
                                <i class="fas fa-plus"></i>
                              </span>
                             </td>
                           </tr>
               <tr class="schdule_hour_row">
                 <td>
                  <div class="s_hour">Scheduled hours</div>
                  <div class="emp">Employees</div>
                </td>
                <td>
                  <div class="s_hour">0 Hrs</div>
                  <div class="emp">0 People</div>
                </td>
               </tr>
               <tr class="schdule_hour_row">
                <td>
                 <a class="staff_lnk" href="#" data-toggle="modal" data-target="#addstaff">
                 add staff</a>
                </td>
                <td>
                 
                </td>
               </tr>
                         </tbody>
                       </table>
                     </div>
                  </div>
                  <!-- table end -->
                </div>
                <!-- Day tab content -->
          </div>





             </div>
             <div class="tab_content" id="tab_2">
               <div class="row">
                 <div class="col-xl-6 col-md-12 mb-4">
                 <div class="left_side">
                   <h2>Time Off</h2>
                 </div>
               </div>
               <div class="col-xl-6 col-md-12 mb-4">
                 <div class="right_side">
                   <button class="crate_shift_btn" data-toggle="modal" data-target="#addtime">Add Time Off</button>
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
                         <tr>
                           <td>5-01-2020</td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">Neha</a></td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">Sharma</a></td>
                           <td><a href="#" data-toggle="modal" data-target="#staff_edit_modal">nehasharma@gmail.com</a></td>
                           <td>5-01-2020</td>
                           <td>6-01-2020</td>
                           <td>9:00 AM</td>
                           <td>5:00 PM</td>
                           <td>8 Hours</td>
                           <td>Maternity</td>
                           <td class="action_td">
                             <a href="#" class="icons">
                               <i class="fas fa-edit"></i>
                             </a>
                             <a href="#" class="icons">
                               <i class="fas fa-trash-alt"></i>
                             </a>
                           </td>
                         </tr>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
      <!-- add satff modal -->
      <div class="modal express_modal" id="addstaff">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Staff Member</h4>
        <span><a href="#" data-toggle="modal" data-target="#multiple_staff_modal">Add Multiple Staff</a></span>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body create_frm">
             <form class="my_common_form">
              <div class="form-group">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" placeholder="John" id="">
              </div>
              <div class="form-group">
                  <label for="name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Smith" id="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="example123@gmail.com" id="">
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" class="form-control" placeholder="+91-98765-43210" id="">
              </div>
             </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Add Staff</span>
              </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal add satff -->
      <!-- Edit satff modal Start -->
      <div class="modal staff_edit_modal" id="staff_edit_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Edit Staff Member</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body create_frm">
             <form class="my_common_form">
              <div class="form-group">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" placeholder="John" id="">
              </div>
              <div class="form-group">
                  <label for="name">Last Name</label>
                  <input type="text" class="form-control" placeholder="Smith" id="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="example123@gmail.com" id="">
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" class="form-control" placeholder="+91-98765-43210" id="">
              </div>
             </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="#" class="site_button delete_staff">Delete Staff</a>
              <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Save Profile</span>
              </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
     <!-- Edit satff modal End -->
    <!-- Multiple staff modal -->
      <div class="modal express_modal" id="multiple_staff_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Multiple Staff Member</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body create_frm">
             <form class="my_common_form">
        <div class="append_staff_row">
          <div class="staffs_row">
            <div class="form-group">
              <label for="name">First Name</label>
              <input type="text" class="form-control" placeholder="John" id="">
            </div>
            <div class="form-group">
              <label for="name">Last Name</label>
              <input type="text" class="form-control" placeholder="Smith" id="">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="example123@gmail.com" id="">
            </div>
            <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="text" class="form-control" placeholder="+91-98765-43210" id="">
            </div>
          </div>
        </div>
        <div class="form_footer">
        <button type="button" class="btn btn-secondary add_mlt_staff">Add More</button>
        <button type="submit" class="btn btn-secondary save_staff">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Multiple staff modal -->
      <!-- Business modal -->
      <div class="modal express_modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header custom_modal">
            <h4 class="modal-title">Create New Business</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body create_frm">
           <form class="my_common_form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Business Name" id="">
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email">
            </div>
            <div class="form-group">
              <label for="number">Phone Number</label>
              <input type="text" class="form-control" placeholder="Phone Number" id="email">
            </div>
           </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <a href="#" class="btn btn-secondary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Create Business</span>
            </a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
     <!-- Business modal -->
      <!-- add time Modal -->
      <div class="modal express_modal" id="addtime">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Add Time Off</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body adshi_modal">
             <form class="my_common_form">
              <div class="form-group">
                <p>Staff Member</p>
                <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check">Everyone (Public Holiday)
                  <input type="checkbox" value="" name="" class="all_checked">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Neha Sharma
                  <input type="checkbox" value="Neha Sharma" name="staff_check" class="check_inputs" checked="">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Anusha Gour
                  <input type="checkbox" value="Anusha Gour" name="staff_check" class="check_inputs">
                  <span class="checkmark"></span>
                </label>
              </div>
              <!-- check boxs -->
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Type of Time off</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Vacation</option>
                  <option>Public Holiday</option>
                  <option>LOA</option>
                  <option>Maternity</option>
                  <option>Personal</option>
                  <option>RDO</option>
                  <option>Sick Leave</option>
                  <option>Training</option>
                  <option>Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Notes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="date">First day off</label>
                <input type="text" class="form-control date_picker" id="">
              </div>
              <div class="form-group">
                <label for="date">Last day off</label>
                <input type="text" class="form-control date_picker" id="">
              </div>
            <div class="form-group">
                <label class="custom_check">Time Range
                  <input type="checkbox" value="time_range" name="timerange" class="time_range_check">
                  <span class="checkmark"></span>
                </label>
            </div>
          <div class="form-group">
          <label for="number">Start Time</label>
          <input type="text" name="start_time" class="form-control start_time time_picker time_range_inpt" placeholder="09:00 am" disabled="">
        </div>
        <div class="form-group">
          <label for="number">End Time</label>
          <input type="text" name="end_time" class="form-control end_time time_picker time_range_inpt" placeholder="05:00 pm" disabled="">
        </div>
              <small>Total Hour 8</small>
             </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Add Time off</span>
              </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- add time Modal -->
      <!--Email Schedule modal -->
      <div class="modal express_modal" id="emailschedule">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header custom_modal">
                <h4 class="modal-title">Email Schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body adshi_modal">
               <form class="my_common_form">
                <div class="form-group">
                  <p>Staff Member</p>
                  <!-- check boxs -->
                  <div class="check_boxs">
                   <label class="custom_check">Everyone (Public Holiday)
                    <input type="checkbox" value="" name="" checked="checked" class="all_checked">
                    <span class="checkmark"></span>
                  </label>
                  <label class="custom_check">Neha Sharma
                    <input type="checkbox" value="Neha Sharma" name="staff_check" class="check_inputs" checked="">
                    <span class="checkmark"></span>
                  </label>
                  <label class="custom_check">Anusha Gour
                    <input type="checkbox" value="Anusha Gour" name="staff_check" class="check_inputs">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <!-- check boxs -->
                </div>
                <div class="form-group">
                  <label for="number">Subject</label>
                  <input type="text" class="form-control" placeholder="your schedule" id="">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlTextarea1">Body</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Hello,Please find your schedule below.Thank you.
                  </textarea>
                </div>
                <div class="form-group">
                   <label class="custom_check">include the schedule
                    <input type="checkbox" value="" name="" class="schedule_check">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-group">
                  <label for="date">From</label>
                  <input type="text" class="form-control date_picker schedule_date" id="" disabled="">
                </div>
                <div class="form-group">
                  <label for="date">To</label>
                  <input type="text" class="form-control date_picker schedule_date" id="" disabled="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Send option</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Send staff their own schedule</option>
                    <option>Send staff full schedule</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="custom_check">Email me a copy
                    <input type="checkbox" value="" name="">
                    <span class="checkmark"></span>
                  </label>
                </div>
               </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <a href="#" class="preview_btn">Preview</a>
                <a href="#" class="preview_btn">Send</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
    <!-- Email Schedule modal -->
    <!-- add shift modal -->
    <div class="modal express_modal" id="addshift">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header custom_modal">
            <h4 class="modal-title">Create Shift</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body adshi_modal">
           <form class="my_common_form">
            <div class="form-group">
              <p>Staff Member</p>
              <!-- check boxs -->
                <div class="check_boxs">
                 <label class="custom_check">All Staff
                  <input type="checkbox" value="all staff" name="staff_check" class="all_checked">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Neha Sharma
                  <input type="checkbox" value="Neha Sharma" name="staff_check" class="check_inputs" checked="">
                  <span class="checkmark"></span>
                </label>
                <label class="custom_check">Anusha Gour
                  <input type="checkbox" value="Anusha Gour" name="staff_check" class="check_inputs">
                  <span class="checkmark"></span>
                </label>
              </div>
              <!-- check boxs -->
            </div>
            <div class="form-group">
              <label for="date">Shift Date</label>
              <input type="text" class="form-control date_picker" id="">
            </div>
            <div class="form-group">
              <label for="number">Start Time</label>
              <input type="text" name="start_time" class="form-control start_time time_picker" placeholder="09:00 am" id="">
            </div>
            <div class="form-group">
              <label for="number">End Time</label>
              <input type="text" name="end_time" class="form-control end_time time_picker" placeholder="05:00 pm" id="">
            </div>
            <small>Total Hour 8</small>
           </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <a href="#" class="btn btn-secondary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Create Shift</span>
            </a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  <!-- add shift modal -->
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/jquery_ui/jquery-ui.min.js"></script>
  <script src="js/jquery_ui/jquery-ui-timepicker-addon.js"></script>
  <script src="js/custom_script.js"></script>
</body>
</html>