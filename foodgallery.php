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

        <li>
          <a href="calendar.html">
          <i class="fa fa-calendar-check-o"></i><span>Calendar</span>
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

<!--ADD NEW FOODS item area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
									<h5 style="text-align: center;">ADD NEW FOOD</h5>

                  <form action="controller.php" method="POST" enctype="multipart/form-data">

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
                          <option value="various">Various</option>                    
                        </select>
											</div>

                      <div class="p-2">
                      <select name="mealplantype" class="form-control" required>
                          <option selected>Select meal plan type</option>
                          <option value="breakfast">Breakfast</option>
                          <option value="all">Both Lunch & Dinner</option>
                          <option value="dinner">Dinner</option>
                          <option value="curry">Curry</option>
                          <option value="drink">Drink</option>
                          <option value="dessert">Dessert</option>                    
                        </select>
											</div>

											<div class="p-2">
                      <input type="text" name="fname" class="form-control" placeholder="Enter food name" required>
											</div>

                      <div class="p-2">
                      <input type="text" name="fprice" class="form-control"  placeholder="Enter food price" required>
											</div>

                      <div class="p-2">
                      <textarea type="text" name="fdescription" class="form-control"  placeholder="Enter description for the food" required></textarea>
											</div>

                      <div class="p-2">
                      <input type="file" name="fpicture" class="form-control">
											</div>

											<div class="p-2 text-center">
                      <button type="reset" class="btn btn-warning btn-sm" style="width: 80px;">RESET</button>
                      <button type="button" class="btn btn-success btn-sm" style="width: 80px;" data-bs-toggle="modal" data-bs-target="#staticBackdropForAdd">ADD</button>
											</div>
                      <?php include("infobox/addfoodinfobox.php"); ?>
												
									  </form>
						</div>
					</div>
        </div>
      </div>                 
      <!--ADD NEW FOODS item area end-->

<!--Update FOODS item area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
							<h5 style="text-align: center;">UPDATE FOOD DETAILS</h5>

              <form method="post">
                <div class="form-group">
                    <select class="form-control" name="foodname">
											<option selected>Select Food Name</option>
											<option> 
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

                <div class="p-2 text-center">
                  <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                  <button type="submit" class="btn btn-success btn-sm" name="checkfood"><b>PROCEED</b></button>
                </div>
              </form>

              <form action="action_pages/foodupdateaction.php" method="post" enctype="multipart/form-data">
              
                <?php
                if(isset($_POST['checkfood'])) {
                $foodname = $_POST['foodname'];
                
                $Result = mysqli_query($db,"SELECT * FROM foods WHERE name='$foodname'");
                  while($row=mysqli_fetch_array($Result)){

                    $fid = $row['foodid'];
                    $name = $row["name"];
                    $price = $row["price"];
                    $ftype = $row["ftype"];
                    $mealplantype = $row["mealplantype"];
                    $fdescription = $row["fdescription"];
                    $fimage = $row["fimage"];
                ?>
											<div class="p-2">
                      <input type="hidden" name="fid" value="<?php echo "$fid"; ?>" class="form-control">
											</div>

                      <div class="p-2">
                      <input type="text" name="ftype" readonly value="<?php echo "$ftype"; ?>" class="form-control">
											</div>

                      <div class="p-2">
                      <input type="text" name="mealplantype" readonly value="<?php echo "$mealplantype"; ?>" class="form-control">
											</div>

                      <div class="p-2">
                      <input type="text" name="name" value="<?php echo "$name"; ?>" class="form-control">
											</div>

											<div class="p-2">
                      <input type="text" name="price" value="<?php echo "$price"; ?>" class="form-control">
											</div>

                      <div class="p-2">
                      <input type="text" name="fdescription" value="<?php echo "$fdescription"; ?>" class="form-control">
											</div>

                      <div class="p-2">
                      <input type="hidden" name="fimage" value="<?php echo "$fimage"; ?>" class="form-control">
											</div>
                      
                      <div class="p-2">
                      <input type="file" value="<?php echo "$fimage"; ?>" class="form-control">
											</div>

                      <div class="p-2 text-center">
                      <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                      <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForUpdate"><b>UPDATE</b></button>
                      </div>

                      <?php include("infobox/updatefoodinfobox.php"); ?>

                      <?php }} ?>
                  </form>

						</div>
					</div>
        </div>
      </div>
</div><br><br>          
<!--Update FOODS item area end-->


<!--Real time food availability area start-->
<div class="row">
<div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
							<h5 style="text-align: center;">CHANGE MEAL AVAILABILITY</h5>

              <form method="post">	
                <div class="P-2">
                    <select class="form-control" name="avafoodname">
											<option selected>Select Meal Name</option>
											<option> 
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

                <div class="p-2 text-center">
                  <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                  <button type="submit" class="btn btn-success btn-sm" name="checkavailabilityfood"><b>PROCEED</b></button>
                </div>
              </form>

              <form action="action_pages/availabilityupdateaction.php" method="post">
              
              <?php
                if(isset($_POST['checkavailabilityfood'])) {
                $foodname = $_POST['avafoodname'];
                
                $Result = mysqli_query($db,"SELECT * FROM foods WHERE name='$foodname'");
                while($row=mysqli_fetch_array($Result)){

                $fid = $row['foodid'];
                $foodstatus = $row["foodstatus"];
              ?>

                      <?php if($foodstatus == 0){
                      echo "<hr>";
                      echo "<span style='float: left;'>This meal currently available.<br>Do you need to change it as an unavailable status ?</span><br>";
                      echo "<span style='float: left;'><mark>$foodname</mark></span>";
                      echo "<div class='p-2'>";
                      echo "<input type='hidden' name='fid' value='$fid'>";
                      echo "<input type='hidden' name='fstatus' value='1'>";
                      echo "<button type='button' style='float: right;' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdropForAvailability'>Make an Unavailable</button>";
											echo "</div>";
                      } 

                      else if($foodstatus == 1){
                      echo "<hr>";
                      echo "<span style='float: left;'>This meal currently unavailable.<br>Do you need to change it as an available status ?</span><br>";
                      echo "<br><span style='float: left;'><mark>$foodname</mark></span>";
                      echo "<div class='p-2'>";
                      echo "<input type='hidden' name='fid' value='$fid'>";
                      echo "<input type='hidden' name='fstatus' value='0'>";
                      echo "<button type='button' style='float: right;' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#staticBackdropForAvailability'>Make an Available</button>";
                      echo "</div>";
                      }
                      ?>

                      <?php include("infobox/availabilityfoodinfobox.php"); ?>

                      <?php }} ?>
                  </form>

						</div>
					</div>
        </div>
      </div><br><br>          
<!--Real time food availability area end-->
      

<!--DELETE EXISTING FOODS area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			      <div class="table-responsive">
							<h5 style="text-align: center;">DELETE A FOOD</h5>

								<form method="post">
                  <div class="p-2">
										<select class="form-control" name="fids">
											<option selected>Select Food Name</option>
											<option> 
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

									<div class="p-2 text-center">
                    <button type="reset" class="btn btn-warning btn-sm"><b>RESET</b></button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForDelete">DELETE</button>
                  </div>
                  <?php include("infobox/deletefoodinfobox.php"); ?>

											<?php
												if(isset($_POST["delid"])){
													$prodataa = $_POST["fids"];
												
													$Result = mysqli_query($db,"DELETE FROM foods WHERE name='$prodataa'");
													//$Result = mysqli_query($Connection,"INSERT INTO announcement (title,descriptions,dates) VALUES('$a','$b','$date')");
														if($Result){

														echo "<script type='text/javascript'>
															                
														swal({ title: 'SUCCESS',text: 'Selected food successfully deleted!',icon: 'success'}).then(okay => {
														if (okay) {
														window.location.href = 'foodgallery.php';}
														});
														</script>";
														}
																								
														else{
														echo "<script type='text/javascript'>
															                
														swal({ title: 'SUCCESS',text: 'Selected food delete was failed!',icon: 'error'}).then(okay => {
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
  <script src="assets/js/bootstrap.bundle.min.js"></script>
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
