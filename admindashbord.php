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
<?php include_once("includes/header.php");?>
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

    <!--Room tables file include.... area start-->
    <?php include_once("includes/roomavailability.php"); ?>
    <!--Room tables file include.... area end-->
    
    
    
    
<!--Oreder conform area start-->
<div class="row">
	  <div class="card">
		  <div class="card-action">
	      <div class="table-responsive">
          <h4 style="text-align: center;"><b>Orders</b></h4>

          <table class="table align-items-center table-flush table-borderless">
            <thead>
              <tr>
                <th>FOOD NAME</th>
                <th>FOOD ID</th>
                <th>ORDER ID</th>
                <th>AMOUNT</th>
                <th>PRICE</th>
                <th>DATE</th>
                <th>ORDER STATUS</th> 
              </tr>

                <?php
                $Result = mysqli_query($db,"SELECT * FROM foodorders");
                while($row=mysqli_fetch_array($Result)){

                  $foodname = $row["foodname"];
                  $foodid = $row["foodid"];
                  $orderid = $row["foodorderid"];
                  $amount= $row["amount"];
                  $price = $row["price"];
                  $date = $row["date"];
                                    
                ?>

            </thead>

            <tbody>
              <tr>
                <td><?php echo "$foodname" ?></td>
                <td><?php echo "$foodid" ?></td>
                <td><?php echo "$orderid" ?></td>
                <td><?php echo "$amount" ?></td>
                <td> Rs <?php echo "$price" ?>/=</td>
                <td><?php echo "$date" ?></td>
                <td><button type="button" class="btn btn-warning">CONFORM ORDER</button></td>
              </tr>

              <?php }
              ?>
            </tbody>
            
          </table> 	
          
        </div>
	    </div>
	  </div>
	</div>
<!--order conform area end-->

<!--start overlay-->
<div class="overlay toggle-menu"></div>
<!--end overlay-->
		
</div><!-- End container-fluid-->   
</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
	
</div><!--End wrapper-->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <script src="assets/js/app-script.js"></script>
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
  <script src="assets/js/index.js"></script>


<!--footer start-->
<?php include_once("includes/footer.php"); ?>
<!--footer end-->

</body>
</html>
