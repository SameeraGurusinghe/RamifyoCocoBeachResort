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
  <title>Admin - Rooms</title>
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

<!--ADD NEW ROOM area start-->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			<div class="table-responsive">
			    <h5 style="text-align: center;">ADD A NEW ROOM</h5>
                
                <!--Automatically generate next room number-->
                <?php
                $Result = mysqli_query($db,"SELECT * FROM room");
                while($row=mysqli_fetch_array($Result)){
                    $room_no = $row["room_no"];
                    $rate = $row["rate"];
                    $nextroom = $room_no+1;
                }
                //echo $nextroom;
                ?>

                <form action="controller.php" method="POST">

				    <div class="p-2">
                        <h6>Automatically generate the next room number</h6>
                      <input type="text" name="rnumber" class="form-control" readonly value="<?php echo $nextroom ?>">
					</div>

                    <div class="p-2">
                      <input type="text" name="rprice" class="form-control" value="<?php echo $rate ?>"  placeholder="Enter room rate" required>
					</div> 

                    <div class="p-2">
                      <textarea type="text" name="rdescription" class="form-control"  placeholder="Enter description for the room" required></textarea>
					</div>

					<div class="p-2 text-center">
                      <button type="reset" class="btn btn-warning btn-sm" style="width: 80px;">RESET</button>
                      <button type="button" class="btn btn-success btn-sm" style="width: 80px;" data-bs-toggle="modal" data-bs-target="#staticBackdropForRoom">ADD</button>
					</div>
                    
                    <?php include("infobox/addroominfobox.php"); ?>
												
				</form>
			</div>
		</div>
    </div>
</div>                 
<!--ADD NEW ROOM area end-->

<!--Update ROOM Details area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			<div class="table-responsive">
			<h5 style="text-align: center;">UPDATE ROOM DETAILS</h5>

            <form method="post">
                <div class="form-group">
                    <select class="form-control" name="roomnumber">
					<option selected>Select Room Number</option>
					<option> 
						<?php
						$Result = mysqli_query($db,"SELECT * FROM room");
						while($row=mysqli_fetch_array($Result)){
					    echo "<li>".$row['room_no']."</li>";
						echo "<option>";	
						}
						?>
					</option>
					</select>
                </div>

                <div class="p-2 text-center">
                  <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                  <button type="submit" class="btn btn-success btn-sm" name="checkroom"><b>PROCEED</b></button>
                </div>
              </form>

              <form action="action_pages/roomupdateaction.php" method="post">
              
                <?php
                if(isset($_POST['checkroom'])) {
                $roomnumber = $_POST['roomnumber'];
                
                $Result = mysqli_query($db,"SELECT * FROM room WHERE room_no='$roomnumber'");
                  while($row=mysqli_fetch_array($Result)){

                    $rid = $row['id'];
                    //$name = $row["room_no"];
                    $rprice = $row["rate"];
                    $rdescription = $row["description"];
                ?>
				<div class="p-2">
                    <input type="hidden" name="rid" value="<?php echo "$rid"; ?>" class="form-control">
			    </div>

                <div class="p-2">
                    <input type="text" name="rnumber" value="<?php echo "$roomnumber"; ?>" class="form-control">
				</div>

				<div class="p-2">
                    <input type="text" name="rprice" value="<?php echo "$rprice"; ?>" class="form-control">
				</div>

                <div class="p-2">
                    <input type="text" name="rdescription" value="<?php echo "$rdescription"; ?>" class="form-control">
				</div>

                <div class="p-2 text-center">
                    <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForUpdateRoom"><b>UPDATE</b></button>
                </div>

                <?php include("infobox/updateroominfobox.php"); ?>

                <?php }} ?>
              </form>

				</div>
				</div>
        </div>
      </div>
</div><br><br>          
<!--Update ROOM Details area end-->


<!--DELETE EXISTING FOODS area start-->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
			<div class="table-responsive">
			<h5 style="text-align: center;">DELETE A ROOM</h5>

			<form method="post">
                <div class="p-2">
                    <select class="form-control" name="roomno">
                    <option selected>Select Room Number</option>
                    <option> 
                        <?php
                        $Result = mysqli_query($db,"SELECT * FROM room");
                        while($row=mysqli_fetch_array($Result)){
                        echo "<li>".$row['room_no']."</li>";
                        echo "<option>";							
                        }
                        ?>
                    </option>
                    </select>
                </div>

                <div class="p-2 text-center">
                    <button type="reset" class="btn btn-warning btn-sm"><b>RESET</b></button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForDeleteRoom">DELETE</button>
                </div>

                <?php include("infobox/deleteroominfobox.php"); ?>

                <?php
                if(isset($_POST["deleteroom"])){
                $rnumber = $_POST["roomno"];
                                                    
                $Result = mysqli_query($db,"DELETE FROM room WHERE room_no='$rnumber'");
                //$Result = mysqli_query($Connection,"INSERT INTO announcement (title,descriptions,dates) VALUES('$a','$b','$date')");
                    if($Result){
                        echo "<script type='text/javascript'>	                
                        swal({ title: 'SUCCESS',text: 'Selected room successfully deleted!',icon: 'success'}).then(okay => {
                        if (okay) {
                        window.location.href = 'roomgallery.php';}
                        });
                        </script>";
                    }
                                                                                                    
                    else{
                        echo "<script type='text/javascript'>	                
                        swal({ title: 'SUCCESS',text: 'Selected room delete was failed!',icon: 'error'}).then(okay => {
                        if (okay) {
                        window.location.href = 'roomgallery.php';}
                        });
                        </script>";
                        }
                    }
                ?>
			</form>
		</div>
	</div>
</div>
</div><br><br>
<!--DELETE EXISTING FOODS area end-->

<!--Rice Menu area start-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">ROOM RESERVATION DETAILS</h5>

                <div style="width:auto; height:300px; overflow:auto;">
                <table class="table table-sm bg-dark">
                  <thead>
                    <tr>
                      <th scope="col">Room No</th>
                      <th scope="col">Email</th>
                      <th scope="col">Check-in</th>
                      <th scope="col">Check-out</th>
                      <th scope="col">Night(s)</th>
                      <th scope="col">Adult(s)</th>
                      <th scope="col">Child(s)</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <?php
                      $Result = mysqli_query($db,"SELECT * FROM reservation order by date_time DESC");
                      //essential data coming from foodtabledate.php include file
                      //include("includes/roomreservationtabledata.php");
                      
                        while($row=mysqli_fetch_array($Result)){
                            
                            $room_no = $row["room_no"];
                            $email = $row["email"];
                            $checkin = $row["check_in"];
                            $checkout = $row['check_out'];
                            $nights = $row["nights"];
                            $adults = $row["adults"];
                            $childs = $row["childs"];
                            $res_status = $row["res_status"];
                            ?> 

                            <?php
                            if($res_status == 1){
                                echo "<td style='color:green;font-weight:bold;'>$room_no</td>";
                                echo "<td style='color:green;font-weight:bold;'>$email</td>";
                                echo "<td style='color:green;font-weight:bold;'>$checkin</td>";
                                echo "<td style='color:green;font-weight:bold;'>$checkout</td>";
                                echo "<td style='color:green;font-weight:bold;'>$nights</td>";
                                echo "<td style='color:green;font-weight:bold;'>$adults</td>";
                                echo "<td style='color:green;font-weight:bold;'>$childs</td>";
                                
                            }
                                            
                            else if($res_status == 0){
                                echo "<td style='color:red;font-weight:bold;'>$room_no</td>";
                                echo "<td style='color:red;font-weight:bold;'>$email</td>";
                                echo "<td style='color:red;font-weight:bold;'>$checkin</td>";
                                echo "<td style='color:red;font-weight:bold;'>$checkout</td>"; 
                                echo "<td style='color:red;font-weight:bold;'>$nights</td>"; 
                                echo "<td style='color:red;font-weight:bold;'>$adults</td>"; 
                                echo "<td style='color:red;font-weight:bold;'>$childs</td>";  
                            }
                                            
                            echo "</tr>";
                            ?>
                            <?php } ?>
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Rice menu area end-->
 
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
