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
<meta name="description" content=""/>
  <meta name="author" content=""/>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
  <link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Employee Dashboard</title>
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar-auto-hide="true">
      <ul class="sidebar-menu">
        <li>
          <a href="employeedashbord.php">
            <i class="fa fa-th"></i><span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="empfoodgallery.php">
            <i class="fa fa-cutlery"></i><span>Food Gallery</span>
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

<!--employee content code design start-->
<div class="col-md-12">
<div class="card">
<br>
<h4 style="text-align: center;"><b>CHECK CUSTOMER BILL</b></h4><br>

<div class="card-secondary" style="align: center;">
	<div class="card bg-dark col-md-12 text-center">
		<div class="card-body text-center">
			
      <form method="post">	
        <div class="form-group">
          <div class="col-md-12">
            <input type="text" class="form-control" name="nic" placeholder="Enter Customer NIC" style="text-align: center;" required><br>
          </div>
        </div>

        <div class="p-2">
          <button type="reset" class="btn btn-warning btn-sm" style="width: 110px; float: center;"><b>CLEAR</b></button>
          <button type="submit" class="btn btn-success btn-sm" name="checkstatus" style="width: 110px; float: center;"><b>PROCEED</b></button>
        </div>
      </form>

		</div>
  </div>
</div><br>
</div>
</div>
<!--employee content code design end-->
<br>

<form action="printPDF.php" target="_blank" method="post">
<?php
if(isset($_POST["checkstatus"])){
$nic = $_POST["nic"];
$Result = mysqli_query($db,"SELECT * FROM users WHERE nic='$nic'");
while($row=mysqli_fetch_array($Result)){
  $_SESSION['useremail'] = $row["email"];

?>
<div class="p-2 text-center">
<input type="hidden" name="cus_email" readonly value="<?php echo $_SESSION['useremail'] ?>">
<input type="submit" class="p-2 btn btn-success" name="print_cus_info" value="Prints this Details">
</div>
<?php }} ?>
</form><br>

    <!--food bill calculate area start-->
    <div class="table-responsive">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            

              <h5 class="card-title text-center">- Customer Information -</h5><br>

              <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php
              if(isset($_POST["checkstatus"])){
              $nic = $_POST["nic"];
              //echo  $cus_name;
              
              $Result = mysqli_query($db,"SELECT * FROM users WHERE nic='$nic'");
                while($row=mysqli_fetch_array($Result)){
                  $_SESSION['useremail'] = $row["email"];
                  $useremail = $_SESSION["useremail"];
                  $fullname = $row["fullname"];
                  $nic = $row["nic"];
                  $phoneno = $row["phoneno"];
                  $street = $row["streete"];
                  $city = $row["city"];
                  $state = $row["state"];  
              ?>
  
              <div class="card col-md-5 p-4">
              <p class="badge bg-success text-wrap">Customer Personal Details</p>
              <span>Email: <?php echo $_SESSION['useremail'];?></span>
              <span>Full Name: <?php echo "$fullname";?></span>
              <span>NIC: <?php echo "$nic";?></span>
              <span>Contact No: <?php echo "$phoneno";?></span>
              <span>Address: <?php echo "$street",", ","$city",", ","$state";?></span>
              </div>
              <br>
              <?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <?php
              $Result = mysqli_query($db,"SELECT * FROM reservation WHERE email='$useremail' AND res_status='1'");
                while($row=mysqli_fetch_array($Result)){
                  $room_no = $row["room_no"];
                  $adults = $row["adults"];
                  $childs = $row["childs"];
                  $check_in = $row["check_in"];
                  $check_out = $row["check_out"];
                  $nights = $row["nights"];
                  $res_status = $row["res_status"];
                  $AdvanceforRoom = $row["advance_amount"];
                  $reservationDate = $row["date_time"];
              ?>
  
              <div class="card col-md-5 p-4">
              <p class="badge bg-success text-wrap">Room Reservation Details</p>
              <span>Room reservation date: <?php echo "$reservationDate";?></span>
              <span>Room number: <mark><?php echo "$room_no";?></mark></span>
              <span>Check in: <?php echo "$check_in";?></span>
              <span>Check out: <?php echo "$check_out";?></span>
              <span>No. of night(s): <?php echo "$nights";?></span>
              <span>No. of adults: <?php echo "$adults";?></span>
              <span>No. of childs: <?php echo "$childs";?></span>
              </div>
              <br>
              <?php }} ?>

              </div>
              <hr>

              <h5 class="card-title text-center">- Summary of Meal Consumption of the Selected Customer -</h5>
              <div style="height:200px; overflow:auto;">
              <table class="table table-sm table-hover table-dark">
                <thead>
                    <tr>
                      <th scope="col">Food Name</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Total Charges</th>
                      <th scope="col">Oredered Date</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Totalbill=0;
                      if(isset($_POST["checkstatus"])){
                      $nic = $_POST["nic"];
                      $Result = mysqli_query($db,"SELECT * FROM users WHERE nic='$nic'");
                      while($row=mysqli_fetch_array($Result)){
                      $_SESSION['useremail'] = $row["email"];
                      $uemail = $_SESSION['useremail'];

                      $orderstatus=1;
                      $tobill=0;
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$uemail' AND orderstatus='$orderstatus' order by date DESC;");
                        //$Result = mysqli_query($db,"select foodorders.foodname,foodorders.price,foodorders.amount,foodorders.date,payment.amount FROM foodorders,payment where foodorders.$mail=payment.$mail");
                      
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["foodname"];
                        $fprice = $row["price"];
                        $foodamount = $row["amount"];
                        $fooddate = $row["date"];  
                        //$AdvanceforRoom = $row["amount"];
                    ?> 

                      <td><?php echo "$fname";?> </td>
                      <td><?php echo "Rs.$fprice/=";?> </td>
                      <td><?php echo "$foodamount";?> </td>
                      <td><?php 
                              $tobill=$fprice*$foodamount;
                              $Totalbill=$Totalbill+$tobill;
                              echo "Rs.$tobill/=";
                              ?>
                      </td>
                      <td><?php echo "$fooddate";?> </td>
                  </tr>

                    <?php }} ?> 
                    
                </tbody>
              </table>
              </div>
              <!--food bill calculate area end--> 
              <hr>

              <h5 class="card-title text-center">Active Total Charges for Foods <span><mark><?php echo "Rs. $Totalbill/=";?></mark></span></h5>
              <!--total bill calculate area start--> 
              <table class="table table-sm table-hover table-dark">
                <thead>
                  <tr> 
                    <th scope="col"><span title="Your total meal consumption charge">Food Charge</span></th>
                    <th scope="col"><span title="Your total room charge">Room Charge</span></th>
                    <th scope="col"><span title="Total Bill = Meal charge + Room charge">Total bill</span></th>
                    <th scope="col"><span title="Amount that you paid when you booking the our hotel room.">Advance for Room</span></th>
                    <th scope="col"><span title="Your have to pay below amount.">Balance Due</span></th> 
                  </tr>
                </thead>

                <?php
                  $Result = mysqli_query($db,"SELECT * FROM reservation WHERE email='$uemail' AND res_status='1';");
                    while($row=mysqli_fetch_array($Result)){
                      $AdvanceforRoom = $row["advance_amount"];
                      $nights = $row["nights"];
                    

                  $Result = mysqli_query($db,"SELECT rate FROM room");
                    while($row=mysqli_fetch_array($Result)){
                      $TotalchargeforRoom = $row["rate"]; 
                    }
                ?>

                <tbody>
                <?php
                  if(isset($_POST["checkstatus"])){
                  ?>
                <tr>
                  <td><?php $TotalChargeforFood=$Totalbill; echo "Rs.$TotalChargeforFood/=";?></td>
                  <td title="<?php echo $TotalchargeforRoom ?> LKR * <?php echo $nights ?> night(s)"><?php $TotalchargeforRoom=$TotalchargeforRoom*$nights; echo "Rs.$TotalchargeforRoom/=";?></td>
                  <td title="<?php echo $TotalChargeforFood ?> LKR (Food charges) + <?php echo $TotalchargeforRoom ?> LKR (Total room charges)"><?php $FinalTotalbill=$TotalChargeforFood+$TotalchargeforRoom; echo "Rs.$FinalTotalbill/=";?></td>
                  <td><?php $AdvanceforRoom; echo "Rs.$AdvanceforRoom/=";?></td>
                  <td title="<?php echo $FinalTotalbill ?> LKR - <?php echo $AdvanceforRoom ?> LKR"><mark><?php $BalanceDue=$FinalTotalbill-$AdvanceforRoom; if($FinalTotalbill == 0){echo "Rs.0.00/=";}else{echo "Rs.$BalanceDue/=";}?></mark></td>     
                </tr>
                <?php }}} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--total bill calculate area end-->
	
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
  <script src="assets/js/bootstrap.bundle.min.js"></script>
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
