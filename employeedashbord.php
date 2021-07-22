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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Employee Dashboard</title>

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
          <a href="employeedashbord.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="empfoodgallery.php">
          <i class="zmdi zmdi-grid"></i> <span>Food Gallery</span>
          </a>
        </li>
      
        <li>
        <a href="empcalendar.php">
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

<!--employee content code design start-->
<!--*****************-->
<div class="col d-flex justify-content-center">
<div class="col-md-8">
  <br>
<h3 style="text-align: center;"><b>CHECK CUSTOMER BILL</b></h3>
<hr>

	<div class="card-Secondary" style="align: center;">
		<div class="card bg-dark">
			<div class="card-body text-center">
			
			<form method="post" enctype="multipart/form-data">	
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" class="form-control" name="un" placeholder="Enter Customer Email.." style="text-align: center;" required><br>
						
					</div>
				</div>

					<div class="p-2">
						<button type="reset" class="btn btn-warning btn-sm" style="width: 110px; float: center;"><b>CLEAR</b></button>
						<button type="submit" class="btn btn-success btn-sm" name="checkstatus" style="width:  110px; float: center;"><b>PROCEED</b></button>
					</div>
			</form>
			</div></div></div> <br></div>
    </div>




            

<!--employee content code design end-->
<br>
<!--food bill calculate area start--> 
<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">Summary of Food Services</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">FOOD Name</th>
                      <th scope="col">price of Food </th>
                      <th scope="col">Amount</th>
                      <th scope="col">Total Price of Food Charge </th>
                      <th scope="col">Date</th>
                    </tr>
                </thead>

                <tbody>
                  <tr>

                    <?php
$Totalbill=0;
           if(isset($_POST["checkstatus"])){
           $mail = $_POST["un"];

                    $orderstatus=1;
                    $tobill=0;
                    $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$mail' AND orderstatus='$orderstatus'");
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
                      <td>
                          <?php 
                      
                      $tobill=$fprice*$foodamount;
                      $Totalbill=$Totalbill+$tobill;


                      echo "Rs.$tobill/=";?> </td>


                      <td><?php echo "$fooddate";?> </td>
      
                  </tr>

                    <?php 
                    }
                  }
                    ?> 
                    
                </tbody>
              
              </table>
              <!--food bill calculate area end--> 
              <hr>
              <h5 class="card-title text-center">  Active Total Charges for Food 
                                            <button type="button" class="btn btn-dark btn-sm"><?php  echo "Rs $Totalbill/=";?></button> </h5>
<!--total bill calculate area start--> 
           <table class="table table-sm">
           <thead>

                    <tr> 
                      <th scope="col">Total Charge for Food </th>
                      <th scope="col">Total charge for Room </th>
                      <th scope="col">Total bill</th>
                      <th scope="col">Advance for Room</th>
                      <th scope="col">Balance Due </th>
                      
                    </tr>
          </thead>


          <tbody>

                 <tr>
                      <td><?php $TotalChargeforFood=$Totalbill; echo "Rs.$TotalChargeforFood/=";?> </td>
                      <td><?php $TotalchargeforRoom=1500; echo "Rs.$TotalchargeforRoom/=";?> </td>
                      <td><?php $FinalTotalbill=$TotalChargeforFood+$TotalchargeforRoom; echo "Rs.$FinalTotalbill/=";?> </td>
                      <td><?php $AdvanceforRoom=0; echo "Rs.$AdvanceforRoom/=";?> </td>
                      <td><?php $BalanceDue=$FinalTotalbill-$AdvanceforRoom; echo "Rs.$BalanceDue/=";?> </td>     
                </tr>
                

                    
</tbody>
                </table>
              <!--total bill calculate area end--> 
              <hr>
            </div></div>
          </div>
        </div>
      </div>
      <!--Noodles menu area end-->    
      </div>
    
      </div>

	
	
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
