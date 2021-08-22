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
	<title>Confirm Reservation</title>
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
    <div class="col-sm-3"></div>
		<div class="col-sm-6 text-center">
			<br><h1>Are You Sure ?</h1><br>

			<div class="card" style="background-color:#8f8f8f;">
        	<div class="card-body">

            <?php
                $roomno = $_GET["roomno"];
                $emailid = $_GET["emailid"];
                $date1 = $_GET["date1"];
                $date2 = $_GET["date2"];

                $time= "14:00:00";
                $newdate1 = $date1." ".$time;
          
                $time= "12:00:00";
                $newdate2 = $date2." ".$time;

                $adults = $_GET["adults"];
                $childs = $_GET["childs"];
                $nights = $_GET["datediff"];
                $advance_amount = 1000;
                $res_status = 1;
                $fullpayment = 0;

                $Result = mysqli_query($db,"INSERT INTO reservation (room_no,email,adults,childs,advance_amount,check_in,check_out,nights,res_status,fullpayment) VALUES ('$roomno','$emailid','$adults','$childs','$advance_amount','$newdate1','$newdate2','$nights','$res_status','$fullpayment')");
            ?>

            <form method="post" action="reservation_process.php">

                <input type="hidden" name="roomno" readonly value="<?php echo $roomno ?>">
                <input type="hidden" name="emailid" readonly value="<?php echo $emailid ?>">
                <input type="hidden" name="date1" readonly value="<?php echo $date1 ?>">
                <input type="hidden" name="date2" readonly value="<?php echo $date2 ?>">
                <input type="hidden" name="adults" readonly value="<?php echo $adults ?>">
                <input type="hidden" name="childs" readonly value="<?php echo $childs ?>">
                <input type="hidden" name="nights" readonly value="<?php echo $nights ?>">

                <div class="alert alert-secondary text-center">
                <input type="submit" name="room_reservation" class="btn btn-success text-center" value="Yes. I want to reserve selected room">
                </div>
            </form>

            </div>
          </div>
	    </div>
    </div><br>
</div>

<!--footer include start-->
<?php include_once("includes/footer.php"); ?>
<!--footer include end-->

</body>
</html>
