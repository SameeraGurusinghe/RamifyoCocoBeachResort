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
  <link href="css/tooltip.css" rel="stylesheet" type="text/css" />
  <script src="assets/js/tooltip.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">

  <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script language="javascript">
    /*$(document).ready(function () {
        $("#txtdate1").datepicker({
            minDate: 0
        });
    });

    $(document).ready(function () {
        $("#txtdate2").datepicker({
            minDate: 0
        });
    });*/
</script>

</head>


<body style="background-color:#3d3d3d;">

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container" style="background-color:#919191;">

<h1 class="text-center">Room Reservation</h1><br>

<div class="row">

<div class="col-sm-1">
  <div class="bg-info text-center" style="height:60px;border-style: ridge;">
    <h6 class="tooltip" onmouseover="tooltip.pop(this, '<h4><b>How to reservation room(s)?</b></h4><h5>Do following steps</h5><h6>1. Select a <b>check in</b> date that you wish..</h6><br><h6>2. Select a <b>check out</b> date..</h6><br><h6>3. Select no. of adult(s) and children(s)..</h6><br><h6>4. Then click <b>Check Availability</b> button..</h6><br><h6>5. After you click above mentioned button, bottom of the page will displayed the available room(s)..</h6><br><h6>6. Now you can select any room(s) and click the <b>Reservation</b> button..</h6><h6><br>7. After you click the above mentioned button, you will redirect to the reservation conformation page..</h6><br><h6>8. The reservation conformation page you need to confirm your reservation by clicking <b>Yes. I want to reserve selected room</b> button..</h6>')">Hover me<h5>How<br>to</h5></h6>
  </div>
<br>
  <div class="bg-info text-center" style="height:60px;border-style: ridge;">
    <h6 class="tooltip" onmouseover="tooltip.pop(this,'<h4><b>Room reservation policies</b></h4><h6><b>Check-in Time and Check-out Time</b></h6><h6>Check-in Time: From 1400h (02:00 pm)<br>Check-out Time: Until 1200h (12:00 noon)</h6><br><h6><b>Child Policy</b></h6><br><h6>- Children below 5 years - free of charge on existing bedding.<br>- Children between 6-11 years (up to maximum 02 children) sharing parents room - 50%.<br>- Children of 12 years and above are considered as adults, and full rate will be charged.</h6><br><h6><b>Applicable Rate</b></h6><br><h6>- The Sri Lankan rate made available through the online booking engine in LKR, are only applicable for Sri Lankans and Sri Lankan resident visa holders.<br>- Verification (Sri Lankan National ID or the Passport) will also be requested at the hotel during check-in to confirm Nationality.<br>- If a guest book the Sri Lankan rate and a foreign national(s) is a part of the group, the standard foreign rate will be charged from that guest(s) at the hotel during check-in.<br>- If a foreign national does book the Sri Lankan rate, then the difference between the Sri Lankan rate and the standard foreign rate will have to be paid.</h6><br><h6><b>Booking (Reservation) Disputes.</b></h6><br><h6>If a dispute arises with regard to a reservation made with Ramifyo Coco Beach Resort, then Ramifyo Coco Beach Resort(Pvt) Ltd has the sole authority to cancel the reservation by informing the guest via email. The reservation amount will be refunded in full minus any bank charges to the credit card of the guest.</h6><br><h6><b>Reservation Cancellation</b></h6><br><h6>If you cancel the reservation, we will not debit your advance amount.(1000 LKR)</h6>')">Hover me<h5>Our<br>Policies</h5></h6>
  </div>
</div>

<div class="social col-sm-10 text-center">
    <h3>Check Availability</h3>
      
    <form method="post">
      <div class="social text-center"><br>
          <span><b>Check in</b></span>
          <input type="date" name="checkin" placeholder="Check in" required>

          <span><b>Check out</b></span>
          <input type="date" name="checkout" placeholder="Check out" required>

          <span><b>No. of adults</b></span>
          <select name="adults" required>
          <option selected value="0">Adult(s)</option>
            <option value="1">1</option>
            <option value="2">2</option>                  
          </select>

          <span><b>No. of childrens</b></span>
          <select name="childs" required>
          <option selected value="0">Child(s)</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>                  
          </select>
          <br><br>

          <button type="submit" name="check" class="btn btn-success">Check Availability</button><br><br>

      </div>
    </form>
    <br>

    <div class="info text-center">
    <h3>Available Rooms for your selected time period</h3>
    
    <!--notification start-->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Note that, </strong>our all the rooms have same facilities and safe.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Hide"></button>
    </div>

    <?php
      if(!isset($_SESSION['email'])) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
      echo "<marquee scrollamount='10' onmouseover='this.stop();' onmouseout='this.start();'>To reservation a room(s) you must <a href='Login.php'>Log in</a> to your account.</marquee>";
      echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' title='Hide'></button>";
      echo "</div>";
      }
    ?>
    <!--notification end-->

    <?php
    if(isset($_POST['check'])) {
      $date1 = $_POST["checkin"];
      $date2 = $_POST["checkout"];
      $adults = $_POST["adults"];
      $childs = $_POST["childs"];

      echo "<div class='card'>";
      echo "<h6>Selected Date : From <b>$date1</b> to <b>$date2</b></h6>";
      echo "<h6><b>$adults</b> Adult(s) and <b>$childs</b> Children(s)</h6>";
      
    //$date1 = $_POST["checkin"];
    //$date2 = $_POST["checkout"];

    function dateDiff($date1, $date2){
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }
    $dateDiff = dateDiff($date1, $date2);
    $_SESSION['datediff'] = $dateDiff;

    echo "<h6>Number of night(s) : <b>" . $dateDiff . "</b> night(s) <h6>";
    echo "</div>";
    }
    ?>
    <!--php code for get number of days between two dates end-->

    </div>
    <br>

    <form method="post">
    <table class="table table-sm table-hover table-secondary">
      <thead>
      <tr>
        <th scope="col">Room No</th>
        <th scope="col">Room Floor</th>
        <th scope="col">Price Range</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <?php
          if(isset($_POST['check'])) {
          $date1 = $_POST["checkin"];
          $date2 = $_POST["checkout"];
          $adults = $_POST["adults"];
          $childs = $_POST["childs"];
          $_SESSION['datediff']= $dateDiff;

          //add specific time to the customer selected date
          $time= "14:00:00";
          $newdate1 = $date1." ".$time;
    
          $time= "12:00:00";
          $newdate2 = $date2." ".$time;

          $Result = mysqli_query($db,"SELECT * FROM room WHERE room_no NOT IN (SELECT DISTINCT room_no FROM reservation WHERE check_in <= '$newdate1' AND check_out >= '$newdate2' AND res_status='1')");

          while($row=mysqli_fetch_array($Result)){
          $id = $row["id"];
          $roomno = $row["room_no"];
          $description = $row["description"];
          $rate = $row["rate"];
        ?>
        
          <td><?php echo $roomno ?></td>
          <td><?php echo $description ?></td>
          <td>LKR. <?php echo $rate ?>/=</td>
          <?php
          if(!isset($_SESSION['email'])) {
            echo "<td><a href='Login.php' class='btn btn-danger'>Login</a></td>";
          }
          ?>

          <?php
          if(isset($_SESSION['email'])) {
            $getuser = $_SESSION['email'];
            
            echo "<td><a class='btn btn-success' href='confirmReservation.php?roomno=$roomno&emailid=$getuser&date1=$date1&date2=$date2&adults=$adults&childs=$childs&datediff=$dateDiff'>Reservation</a></td>";
            //echo "<td><a class='btn btn-success' href='reservation_process.php?roomno=$roomno&emailid=$getuser&date1=$date1&date2=$date2'>Booking</a></td>";
            
            
            //echo "<td><button type='submit' name='room_reservation' class='btn btn-success'>Booking</button></td>";
          }
          ?>
      </tr>
      <?php }} ?>

    </tbody>
    </table>
    </form>
    <br>

</div>
<div class="col-sm-1"></div>
</div><br>
  
</div>


<!--footer include start-->
<?php include_once("includes/footer.php"); ?>
<!--footer include end-->


</body>
</html>
