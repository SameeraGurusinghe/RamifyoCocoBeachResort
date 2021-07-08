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
  <title>Admin Dashboard</title>

  <link href="assets/css/pace.min.css" rel="stylesheet"/>
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
 
<div id="wrapper"><!-- Start wrapper-->

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
        <i class="zmdi zmdi-grid"></i> <span>Food Gallery</span>
        </a>
      </li>
    
      <li>
        <a href="News & Feedback.php">
        <i class="zmdi zmdi-calendar-check"></i> <span>News & Feedback</span>
        </a>
      </li>

      <li>
      <a href="calendar.html">
        <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
      </a>
      </li>
    
    </ul>
 </div>
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

<!--News area start-->
   <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 style="text-align: center;"><b>POST A NEWS OR OFFER</b></h4>
				
            <form action="admin_php/admin_announcement_action.php" method="post" enctype="multipart/form-data">
              
              <div class="p-2">           
                <select class="form-control" name="posttype" required>
                  <option selected>Select post type - News or Offer</option>
                  <option value="news">News</option>
                  <option value="offer">Offer</option>
                </select>
							</div>

              <div class="p-2">           
                <input type="text" name="tit" class="form-control" id="Write Announcement Title"  placeholder="News Title" required>
							</div>
                          
              <div class="p-2">
                <textarea type="text" name="annou" class="form-control" id="Write Description"  placeholder="Description" required></textarea>
              </div>

              <div class="p-2">
                <h6>Attach a image. No required.</h6>
                <input class="form-control" type="file" value="" name="postimage">
              </div>
									
							<div class="p-2">
								<button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;">PUBLISH</button>
								<button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;">CLEAR</button>									    
              </div>
                        
            </form>

        </div>
      </div>
    </div>
	</div><BR><BR><BR>    
<!--News area END-->


<!--Feedback table area start-->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
        <h4 style="text-align: center;"><b>CUSTOMER FEEDBACK</b></h4>
              
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">DATE</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Discription</th>
              </tr>
            </thead>

            <tbody>
            <tr>

              <?php
                $Result = mysqli_query($db,"select*from customer_feedback");
                while($row=mysqli_fetch_array($Result)){
                $p = $row["cusname"];
                $q = $row["emailid"];
                $r = $row["description"];
                $s = $row["date_time"];
              ?> 

                <td><?php echo "$s";?></td>
                <td><?php echo "$p";?> </td>
                <td><?php echo "$q";?> </td>
                <td><?php echo "$r";?> </td>
              </tr>

              <?php 
              }
              ?> 
                  
            </tbody>

          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<!--Feedback table area end-->

<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->

</div><!-- End container-fluid-->
</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
   
</div>
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
