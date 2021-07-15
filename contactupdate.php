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
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Admin - Update Contact Info</title>

  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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

<!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar-auto-hide="true">
    <ul class="sidebar-menu do-nicescrol">
      <li>
        <a href="admindashbord.php">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="foodgallery.php">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Food Gallery</span>
        </a>
      </li>
    
      <li>
        <a href="News & Feedback.php">
        <i class="zmdi zmdi-calendar-check"></i> <span>News & Feedback</span>
        </a>
      </li>

      <li>
          <a href="contactupdate.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Contact Info</span>
          </a>
      </li>

      <li>
      <a href="calendar.html">
        <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
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


<div class="content-wrapper">
  <div class="container-fluid">

      <!--Contact Information update area end-->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
									<h5 style="text-align: center;">UPDATE CONTACT INFORMATION</h5>

                  <form action="action_pages/contact_update_action.php" method="POST">

                  <?php
                      $Result = mysqli_query($db,"SELECT * FROM contact_us WHERE contact_id='c1'");
                        while($row=mysqli_fetch_array($Result)){

                          //$id = $row["contact_id"];
                          $phoneno = $row["telephone"];
                          $email = $row["email"];
                          $address = $row["address"];
                          $website = $row["website"];
                  ?>

                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label">Telephone</label>
                          <div class="col-lg-10 text-center">
                            <input class="form-control"  type="text" value="<?php echo "$phoneno"; ?>" name="phoneno">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label">Email</label>
                          <div class="col-lg-10 text-center">
                            <input class="form-control"  type="text" value="<?php echo "$email"; ?>" name="email">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label">Address</label>
                          <div class="col-lg-10 text-center">
                            <input class="form-control"  type="text" value="<?php echo "$address"; ?>" name="address">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label form-control-label">Website</label>
                          <div class="col-lg-10 text-center">
                            <input class="form-control"  type="text" value="<?php echo "$website"; ?>" name="website">
                          </div>
                      </div>

											<div class="p-2">
											<button type="submit" name="contact_update" class="btn btn-success btn-sm" style="width: 80px; float: right;">UPDATE</button>
                      <button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;">RESET</button>
											</div>
                      
                      <?php 
                        }
                      ?>

									</form>
						</div>
					</div>
        </div>
      </div>               
      <!--Contact Information update area end-->

	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
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
