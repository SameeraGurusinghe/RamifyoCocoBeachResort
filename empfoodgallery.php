<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>
<!--Session end-->

<!--database connection-->
<?php include_once("includes/dbconnection.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content=""/>
  <meta name="author" content=""/>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
  <link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Food Gallery</title>
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar-auto-hide="true">
      <ul class="sidebar-menu">
        <li>
          <a href="employeedashbord.php">
            <i class="fa fa-th"></i><span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="empfoodgallery.php">
            <i class="fa fa-cutlery"></i><span>Food Gallery</span>
          </a>
        </li>
      
      </ul>
   </div>
   <!--End sidebar-wrapper-->


<!--header start-->
<?php include_once("includes/header.php"); ?>
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
	
<div class="content-wrapper">
<div class="container-fluid">

<!--Food tables file include.... area start-->
<?php include_once("includes/foodtables.php"); ?>
<!--Food tables file include.... area end-->
	  
<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->

</div><!-- End container-fluid-->
    
</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
   
</div></div>
<!--End wrapper-->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/app-script.js"></script>
  
	
<!--footer start-->
<?php
include_once("includes/footer.php");
?>
<!--footer end-->

</body>
</html>
