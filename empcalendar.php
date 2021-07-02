<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>

<!--Session end here-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Calendar</title>
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <link href="assets/plugins/fullcalendar/css/fullcalendar.min.css" rel='stylesheet'/>
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

  <!-- start loader -->
     <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
  <!-- end loader -->
  
  <!-- Start wrapper-->
   <div id="wrapper">
  
  <!-- Start wrapper-->
  <div id="wrapper">
   
<!-- Start wrapper-->
<div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar-auto-hide="true">
     <ul class="sidebar-menu do-nicescrol">
        <li>
          <a href="employeedashbord.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="empfoodgallery.php">
          <i class="zmdi zmdi-grid"></i> <span>Food Gallery</span>
          </a>
        </li>
      

        <li>
        <a href="empcalendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
        </a>
        </li>

        <li>
          <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
          </a>
        </li>
      
      </ul>
   </div></div>
   <!--End sidebar-wrapper-->
  
  
  <!--header start-->
  <?php
  include_once("includes/header.php");
  ?>
  <!--header end-->
  
  <!--Start topbar header-->
  <header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
      <ul class="navbar-nav mr-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link toggle-menu" href="javascript:void();">
            <i class="icon-menu menu-icon"></i>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    <BR>
    <div class="mt-3">
      <div id='calendar'></div>
    </div>
			
		<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->	
			
    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   
  <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2021 REMOCO Admin
        </div>
      </div>
    </footer>
	<!--End footer-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
  <!-- Full Calendar -->
  <script src='assets/plugins/fullcalendar/js/moment.min.js'></script>
  <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
  <script src="assets/plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>
	
</body>
</html>
