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
  <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
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
      <ul class="sidebar-menu">
        <li>
          <a href="admindashbord.php">
          <i class="fa fa-th"></i><span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="foodgallery.php">
          <i class="fa fa-cutlery"></i><span>Food Gallery</span>
          </a>
        </li>

        <li>
          <a href="roomgallery.php">
          <i class="fa fa-braille"></i><span>Room Gallery</span>
          </a>
        </li>
      
        <li>
          <a href="News & Feedback.php">
          <i class="fa fa-newspaper-o"></i><span>News and Feedback</span>
          </a>
        </li>

        <li>
          <a href="contactupdate.php">
          <i class="fa fa-address-card-o"></i><span>Contact Info</span>
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

<!--Oreder conform area start-->
<div class="row">
	  <div class="card">
		  <div class="card-action">
	      <div class="table-responsive">
          <h4 style="text-align: center;"><b>Meal Orders</b></h4>

          <div style="height:350px; overflow:auto;">
          <table class="table table-sm table-hover" style="background-color:#282c2b;">
            <thead>
              <tr>
                <th>CUSTOMER NAME</th>
                <th>ROOM NO</th>
                <th>FOOD NAME</th>
                <th>ORDER ID</th>
                <th>AMOUNT</th>
                <th>ORDER STATUS</th>
                <th>DATE</th>
              </tr>

              <?php
                //$Result = mysqli_query($db,"SELECT * FROM foodorders AND order by date DESC;");
                $Result = mysqli_query($db,"SELECT foodorders.foodorderid,foodorders.customerid,foodorders.foodname,foodorders.foodid,foodorders.amount,foodorders.price,foodorders.date,foodorders.orderstatus, reservation.room_no FROM foodorders INNER JOIN reservation ON foodorders.customerid=reservation.email order by date DESC;;");
                
                while($row=mysqli_fetch_array($Result)){
                  $roomno = $row["room_no"];
                  $cusname = $row["customerid"];
                  $foodname = $row["foodname"];
                  $foodid = $row["foodid"];
                  $orderid = $row["foodorderid"];
                  $amount= $row["amount"];
                  $price = $row["price"];
                  $date = $row["date"];
                  $status = $row["orderstatus"];                  
              ?>
            </thead>

            <tbody>
              <tr>
                <td><?php echo "$cusname" ?></td>
                <td><?php echo "$roomno" ?></td>
                <td><?php echo "$foodname" ?></td>
                <td><?php echo "$orderid" ?></td>
                <td><?php echo "$amount" ?></td>
                <td>
                <?php 
                  $oredrvelue=1;
                  echo "<form action='action_pages/orderaconformction.php' method='post'>";
                  echo "<input type='hidden' name='emailid' value='$cusname'>";
                  echo "<input type='hidden' name='orderid' value='$orderid'>";
                  echo "<input type='hidden' name='foodname' value='$foodname'>";
                  echo "<input type='hidden' name='amount' value='$amount'>";
                  echo "<input type='hidden' name='price' value='$price'>";
                  echo "<input type='hidden' name='orderstatus' value='$oredrvelue'>";
                  
                  if($status==0){
                  echo "<button type='submit' name='meal_order_confirm' class='btn btn-success' style='float: right;'>Approve</button>";
                  }
                  
                  elseif($status==1){
                  echo "<button class='btn btn-warning' style='float: right;' disabled>Approved</button>";
                  }

                  echo "</form>";          
                ?>
                </td>
                <td><?php echo "$date" ?></td>

              </tr>

              <?php } ?>
            </tbody>
          </table>
          </div>
          
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
