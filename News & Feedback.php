<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>News Feedback</title>

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
            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
            <p class="user-subtitle">mccoy@example.com</p>
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

   <div class="row mt-3">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          
           <h4 style="text-align: center;"><b>UPDATE NEWS</b></h4>
          <div class="row">
           
           
            
          </div><!--End Row-->
        
          
          
          <hr>
          <div class="row">
            <!--news update akata adala php code-->
            ****************************
             <div class="p-2">
			<div class="p-2"></div>
			<div class="card card-body" style="background-color: rgb(184, 185, 196);">
				
				<div>

					<div class="card-Secondary">
						<div class="card bg-light">
							<div class="card-body text-center bg-dark">
                                <div class="p-2">
                                    <form action="admin_php/admin_announcement_action.php" method="post">
                                    <input type="text" name="tit" style="width: 500px;" placeholder="Write Announcement Title" required>
                                	</div>

                                    <textarea type="text" name="annou" style="width: 500px; height: 120px;" placeholder="Write Description" required></textarea>
									</div>
									</div>
									</div>
									</div>

								<div class="p-2">
									<button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;"><b>PUBLISH</b></button>&nbsp;
									<button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;"><b>CLEAR</b></button>
									</form>	
									</div>

								</div>
							
						</div>
            ******************
           <!--news update akata adala php code iwarai-->
          </div>
          <hr>
          
          <h4 style="text-align: center;"><b>CUSTOMER FEEDBACE</b></h4>
          <hr>
          <div class="row">
            <!--feedbck  update akata adala php code-->
            
             <div class="p-2">
            <div class="row">
              <div class="col-md-4">
                
                  <table class="table table-bordered bg-light" style="width: 1000px;">
                  </div>
                    <tbody style="background-color: rgb(184, 185, 196);">
                      <tr>
                        <td>
                          <div id="content" class="card p-2">

<!--OFFICER ANNOUNCEMENT VIEWER PHP START -->
				 <?php
          $Result = mysqli_query($Connection,"select*from notice order by notice_id DESC LIMIT 3;");
          while($row=mysqli_fetch_array($Result)){
          $p = $row["notice_id"];
          $q = $row["title"];
          $r = $row["descriptions"];
          $s = $row["dates"];
          echo "<p style='color:red;'><mark>$s</mark></p>";
          
          echo "<b>$q</b>";
          echo "<br>";
          //echo "<br>";

          echo "$r";
          echo "<hr class='style-eight' />";
          }
          ?> 
<!--OFFICER ANNOUNCEMENT VIEWER PHP END -->

                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            
      <!-- ANNOUNCEMENT VIEWER PHP END -->
            
          </div>
          <hr>
          
          
          
        </div>
      </div>
    </div>
  </div><!--End Row-->

  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
  
    </div>
    <!-- End container-fluid-->
    
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
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>
