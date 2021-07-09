<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->

<!--database connection-->
<?php include_once("includes/dbconnection.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link href="assets/css/app-style.csss" rel="stylesheet"/>
	
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

	<div>
		<h1>Booking</h1>
	</div><br>

		<div class="col-sm-6 bg-info">
		<!--Room tables file include.... area start-->
		<?php include_once("includes/roomavailability.php"); ?>
		<!--Room tables file include.... area end-->
		</div>


		<div class="col-sm-6 text-center bg-secondary">
			<h3>Checkout</h3>
			<div class="card">
        	<div class="card-body">

              <form action="#" method="post">

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                    <div class="col-lg-9 text-center">
                      <input class="form-control"  type="text" value="" name="fullname">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9 text-center">
                      <input class="form-control"  type="text" value="" disabled>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">NIC</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="" name="nic">
                    </div>
                </div>
                       
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="" name="tp">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="password" value="" name="password">
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">   
                      <button type="submit" class="btn btn-success btn-sm" style="width: 80px; float: right;"><b>UPDATE</b></button>&nbsp;
					<button type="reset" class="btn btn-warning btn-sm" style="width: 80px; float: right;"><b>CLEAR</b></button>
                    </div>
                </div>

              </form>

            </div>
        </div>
	</div>
</div>


<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->


</body>
</html>
