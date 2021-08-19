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
	<title>Reservation Success</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link href="assets/css/app-style.csss" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">

    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

<div class="row">
	<div class="col-sm-12 text-center">
		<br><h1 class="text-success"><b>Reservation Conformed <i class="fa fa-check-circle"></i></b></h1><br>
        <br><h5 class="text-success">Please check your mailbox or user dashboard for to view room reservation confirmation status.</h5><br>

    </div>
</div>
</div>


<!--footer include start-->
<?php include_once("includes/footer.php"); ?>
<!--footer include end-->

</body>
</html>
