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

<!--ADD NEW FOODS item area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
									<h5 style="text-align: center;">ADD NEW FOOD</h5>

                  <form action="controller.php" method="POST">

                      <div class="p-2">
                        <select name="ftype" class="form-control" required>
                          <option selected>Select a food type</option>
                          <option value="koththu">Koththu</option>
                          <option value="noodles">Noodles</option>
                          <option value="rice">Rice</option>
                          <option value="soup">Soup</option>
                          <option value="curry">Curry</option>
                          <option value="drink">Drink</option>
                          <option value="dessert">Dessert</option>                      
                        </select>
											</div>

											<div class="p-2">
                      <input type="text" name="fname" class="form-control" id="Enter FOOD Name" placeholder="Enter FOOD Name" required>
											</div>

                      <div class="p-2">
                      <input type="text" name="fprice" class="form-control" id="Enter FOOD Name"  placeholder="Enter FOOD price" required>
											</div>

											<div class="p-2">
											<button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;" name="addfood">ADD</button>
                      <button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;">RESET</button>
											</div>

											<?php
										/*	if(isset($_POST["addpro"])){
											$restype = $_POST["ftype"];
											$resname = $_POST["fname"];
                      $resprice = $_POST["fprice"];

											$Result = mysqli_query($db,"INSERT INTO foods (name,price,ftype) VALUES('$resname','$resprice','$restype')");
											if($Result){

												echo "<script type='text/javascript'>
		                
												swal({ title: 'SUCCESS',text: 'Food has been added!',icon: 'success',timer: 000}).then(okay => {
												if (okay) {
		    									window.location.href = 'foodgallery.php';}
												});
		    									</script>";
											}
											
											else{
												echo "<script type='text/javascript'>
		                
												swal({ title: 'ERROR',text: 'Food added failed!',icon: 'error',timer: 4000}).then(okay => {
												if (okay) {
		    									window.location.href = 'foodgallery.php';}
												});
		    									</script>";
												}
											}*/
											?>
												
									  </form>
						</div>
					</div>
        </div>
      </div>                 
      <!--ADD NEW FOODS item area end-->
      

      <!--DELETE EXISTING FOODS area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
							<h5 style="text-align: center;">DELETE EXISTING FOOD</h5>

								<form method="post">
											
                  <div class="p-2">
										<select class="browser-default custom-select" name="fids">
											<option selected>Select Food Name</option>
											<option> 

												<!--ALL food types view php code START-->
												<?php
												$Result = mysqli_query($db,"SELECT * FROM foods");

												while($row=mysqli_fetch_array($Result)){
												echo "<li>".$row['name']."</li>";
												echo "<option>";
													
												}
												?>

											</option>
										</select>
									</div>

									<div class="p-2">
										<button type="submit" class="btn btn-danger btn-sm" name="delid" style="width: 80px; float: right;">DELETE</button>
                    <button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;"><b>RESET</b></button>
                  </div>

											<?php
												if(isset($_POST["delid"])){
													$prodataa = $_POST["fids"];
												
													$Result = mysqli_query($db,"DELETE FROM foods WHERE name='$prodataa'");
													//$Result = mysqli_query($Connection,"INSERT INTO announcement (title,descriptions,dates) VALUES('$a','$b','$date')");
														if($Result){

														echo "<script type='text/javascript'>
															                
														swal({ title: 'SUCCESS',text: 'Selected food successfully deleted!',icon: 'success',timer: 3000}).then(okay => {
														if (okay) {
														window.location.href = 'foodgallery.php';}
														});
														</script>";
														}
																								
														else{
														echo "<script type='text/javascript'>
															                
														swal({ title: 'SUCCESS',text: 'Selected food delete was failed!',icon: 'error',timer: 4000}).then(okay => {
														if (okay) {
														window.location.href = 'foodgallery.php';}
														});
														</script>";
														}
													}

											?>
								</form>
						</div>
					</div>
        </div>
      </div></div><br><br>
      <!--DELETE EXISTING FOODS area end-->

    <!--Food tables file include.... area start-->
    <?php include_once("includes/foodtables.php"); ?>
    <!--Food tables file include.... area end-->
	  
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
