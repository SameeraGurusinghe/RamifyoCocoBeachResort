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

<!-- Start wrapper-->
<div id="wrapper">

<!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar-auto-hide="true">
   <ul class="sidebar-menu do-nicescrol">
        <li>
          <a href="employeedashbord.php">
          <i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="empfoodgallery.php">
          <i class="zmdi zmdi-grid"></i><span>Food Gallery</span>
          </a>
        </li>
      

        <li>
        <a href="empcalendar.php">
          <i class="zmdi zmdi-calendar-check"></i><span>Calendar</span>
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

    <div class="row">  
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title">RICE</h5>

               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                    
                      <?php
                        $Result = mysqli_query($db,"select*from foods where ftype='RIce'");
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["name"];
                        $foodid = $row["foodid"];
                        $fprice = $row["price"]; 
                      ?> 

                        <td><?php echo " $fname";?> </td>
                        <td><?php echo " $foodid";?> </td>
                        <td><?php echo "Rs $fprice/=";?> </td>
      
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

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title">KOTHTHU</h5>

                <table class="table table-hover">
                  <thead>
                      <tr>
                        <th scope="col">FOOD Name</th>
                        <th scope="col">FOOD ID</th>
                        <th scope="col">PRICE</th>
                      </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <?php
                        $Result = mysqli_query($db,"select*from foods where ftype='koththu'");
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["name"];
                        $foodid = $row["foodid"];
                        $fprice = $row["price"];  
                      ?> 
    
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
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
    <div><br><br><br>
    <!--End Row-->

    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title">NOODLES</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">FOOD ID</th>
                      <th scope="col">PRICE</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Result = mysqli_query($db,"select*from foods where ftype='noodles'");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["name"];
                      $foodid = $row["foodid"];
                      $fprice = $row["price"];    
                    ?> 

                          
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $foodid";?> </td>
                      <td><?php echo "Rs $fprice/=";?> </td>
      
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


        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h5 class="card-title">SOUP</h5>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">FOOD Name</th>
                        <th scope="col">FOOD ID</th>
                        <th scope="col">PRICE</th>
                    
                      </tr>
                    </thead>
                    
                    <tbody>
                      <tr>
                        <?php
                         $Result = mysqli_query($db,"select*from foods where ftype='soup'");
                         while($row=mysqli_fetch_array($Result)){
                         $fname = $row["name"];
                         $foodid = $row["foodid"];
                         $fprice = $row["price"];  
                        ?> 

                         
                        <td><?php echo " $fname";?> </td>
                        <td><?php echo " $foodid";?> </td>
                        <td><?php echo "Rs $fprice/=";?> </td>
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
      <!--End Row-->
	  
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
