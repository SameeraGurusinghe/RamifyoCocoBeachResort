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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

	<div class="row">
		<h1>Booking</h1>

        <div class="col-md-12">
        hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
        </div>

		<div class="col-sm-6 text-center">
			<h3>Offers</h3>
		</div>


		<div class="col-sm-6 text-center">
			<h3>News</h3>
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
