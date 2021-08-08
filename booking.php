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
  <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
  <link href="css/style.css" rel="stylesheet"/>
  <link href="assets/css/app-style.csss" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">

  <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script language="javascript">
    $(document).ready(function () {
        $("#txtdate1").datepicker({
            minDate: 0
        });
    });

    $(document).ready(function () {
        $("#txtdate2").datepicker({
            minDate: 0
        });
    });
</script>

</head>


<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

<h1>Booking</h1><br>

<div class="row">

<div class="col-sm-1"></div>
<div class="social col-sm-10 text-center">
    <h3>Check Availability</h3>
      
    <form method="post">
      <div class="social text-center"><br>
          <span><b>Check in</b></span>
          <input type="date" name="checkin" placeholder="Check in">

          <span><b>Check out</b></span>
          <input type="date" name="checkout" placeholder="Check out">

          <select name="ftype" required>
          <option selected>Adult(s)</option>
            <option value="1">1</option>
            <option value="2">2</option>                  
          </select><br><br>

          <button type="submit" name="check" class="btn btn-danger">Check Availability</button><br><br>

      </div>
    </form>
    <br>

    <div class="info text-center">
    <h3>Available Rooms for your selected time period</h3>
    
    <div class="alert alert-info text-center" role="alert">
    <h6>Note that, our all the rooms have same faclitities and safe.</h6>
    </div>

    <?php
    if(isset($_POST['check'])) {
      $date1 = $_POST["checkin"];
      $date2 = $_POST["checkout"];
      echo "<h6>Selected Date : From $date1 to $date2 </h6>";
    }
    ?>
    </div>
    <br>

    <table class="table table-sm table-hover table-secondary">
      <thead>
      <tr>
        <th scope="col">Room No</th>
        <th scope="col">Room Facilities</th>
        <th scope="col">Rate</th>
        <th scope="col">Booking</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          if(isset($_POST['check'])) {
          $date1 = $_POST["checkin"];
          $date2 = $_POST["checkout"];

          $Result = mysqli_query($db,"SELECT * FROM room WHERE room_no NOT IN (SELECT DISTINCT room_no FROM reservation WHERE check_in <= '$date1' AND check_out >= '$date2')");

          while($row=mysqli_fetch_array($Result)){
          $id = $row["id"];
          $roomno = $row["room_no"];
          $type = $row["description"];
          $rate = $row["rate"];
        ?>

          <td><?php echo $roomno ?></td>
          <td><?php echo $type ?></td>
          <td><?php echo $rate ?></td>
          <td><button class="btn btn-success">Booking</button></td>
      </tr>
      <?php }} ?>

    </tbody>
    </table>
    <br>

</div>
<div class="col-sm-1"></div>
</div><br>
  
<!--
		<div class="col-sm-6 bg-info">
		//Room tables file include.... area start-->
		<?php //include_once("includes/roomavailability.php"); ?>
		<!--Room tables file include.... area end
		</div>-->

<!--
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
	</div>-->

</div>


<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->


</body>
</html>
