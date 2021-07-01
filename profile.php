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

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <h5 class="logo-text">Dashboard</h5>
     </a>
   </div>
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
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>


    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

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
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">
                <?php
                                        include_once("includes/dbconnection.php");
                                       $Result = mysqli_query($db,"SELECT * FROM users where email='$email'");
                                       while($row=mysqli_fetch_array($Result)){

	                                     $fn = $row["fullname"];
                                         $em = $row["email"];
                                         $ph = $row["phoneno"];
                                         $ps = $row["password"];
                                         $nic = $row["nic"];
                                         
                                         
	                                                            }	
                                                                echo "$fn";		
	                                                  ?></h6>
            <p class="user-subtitle"><?php echo "$em";?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

       
    
        <div class="col-lg-8 text-center">
        
           <div class="card text-center">
            <div class="card-body text-center">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                
               
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                   
                  
                
                <div class="tab-pane" id="edit">
                    
                <form action="profile_update_action.php" method="post">

                    
                        <div class="form-group row text-center">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9 text-center">
                                <input class="form-control"  type="text" value="Kelum" name="fname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Weerasuriya" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="weerasuriya@gmail.com" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="file" name="profile">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="" placeholder="Street" name="street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="" placeholder="City" name="city">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="" placeholder="State" name="state">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">NIC</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="jhonsanmark" name="nic">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="jhonsanmark" name="tp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333" name="conform_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                
                                <button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;"><b>PUBLISH</b></button>&nbsp;
									<button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;"><b>CLEAR</b></button>
                            </div>
                            
                            
									<?php
/*
									if(isset($_POST["cUpdate"])){
                    $a=$_POST["fname"];
                    $b=$_POST["lname"];
                    $c=$_POST["email"];
                    $d=$_POST["profile"];
                    $e=$_POST["street"];
                    $f=$_POST["city"];
                    $g=$_POST["state"];
                    $h=$_POST["tp"];
                    $i=$_POST["password"];
                    $j=$_POST["conform_password"];

									$Result = mysqli_query($Connection,"UPDATE users  SET fname='$a',lname='$b',email='$c',street='$e',city='$f',state='$g',tp='$h',password='$i'");
                 
                  if($Result){

										echo "<script type='text/javascript'>
                
										swal({ title: 'Conatact details has been updated!',text: '',icon: 'success',timer: 3000}).then(okay => {
										if (okay) {
    									window.location.href = 'officer.php';}
										});
    									</script>";
									}
									
									else{
										echo "<script type='text/javascript'>
                
										swal({ title: 'Conatact details update was failed!',text: '',icon: 'error',timer: 3000}).then(okay => {
										if (okay) {
    									window.location.href = 'officer.php';}
										});
    									</script>";
										}
									}*/
									?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
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
	
   
  </div>
  <!--End wrapper-->


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>
