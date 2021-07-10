<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>
<!--Session end-->

<!--database connection-->
<?php
include_once("includes/dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Profile update</title>
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>
</head>


<body class="bg">

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->

    <div class="container-fluid">
    <p class="profileupdateinfo">Update Profile</p>
      <div class="card">
        <div class="card-body">

              <form action="action_pages/profile_update_action.php" method="post" enctype="multipart/form-data">

              <?php
              if (isset($_SESSION['email'])) {
                $ee = $_SESSION['email'];
              }
                $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$ee'");
                  while($row=mysqli_fetch_array($Result)){

                    $fullname = $row["fullname"];
                    $nic = $row["nic"];
                    $phoneno = $row["phoneno"];
                    $email = $row["email"];
                    $streete = $row["streete"];
                    $city = $row["city"];
                    $state = $row["state"]; 
              ?> 

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                    <div class="col-lg-9 text-center">
                      <input class="form-control"  type="text" value="<?php echo "$fullname"; ?>" name="fullname">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9 text-center">
                      <input class="form-control"  type="text" readonly value="<?php echo "$email"; ?>" name="email">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="file" value="" name="profilepic">
                    </div>
                </div>
                        
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="<?php echo "$streete"; ?>" placeholder="Street" name="street">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-6">
                      <input class="form-control" type="text" value="<?php echo "$city"; ?>" placeholder="City" name="city">
                    </div>
                <div class="col-lg-3">

                      <input class="form-control" type="text" value="<?php echo "$state"; ?>" placeholder="State" name="state">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">NIC</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" readonly value="<?php echo "$nic"; ?>" name="nic">
                    </div>
                </div>
                       
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="<?php echo "$phoneno"; ?>" name="tp">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="password" name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">   
                      <button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;"><b>UPDATE</b></button>&nbsp;
									    <button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;"><b>CLEAR</b></button>
                    </div>
                </div>

                <?php 
                        }
                  ?> 

              </form>

            </div>
          </div>
        </div>

<!--start overlay-->
	<div class="overlay toggle-menu"></div>
<!--end overlay-->

<!--Start Back To Top Button-->
  <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
	

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/app-script.js"></script>


<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->

</body>
</html>
