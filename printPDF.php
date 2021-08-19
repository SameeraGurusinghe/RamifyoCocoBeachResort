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
	<title>Ramifyo Coco Beach Resort - Customer Invoice - <?php if(isset($_POST["print_cus_info"])){ $useremail = $_POST["cus_email"];echo $useremail;}?></title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link href="assets/css/app-style.csss" rel="stylesheet"/>
    <link href="css/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/tooltip.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script language="javascript" type="text/javascript">
function f3(){
    window.print();
}
</script>

<style>
<style>
@page { size 8.5in 11in; margin: 2cm }
div.page { page-break-after: always }
</style>

</head>

<body>
<a id="timehandle"><?php echo "". date("l ");?><?php include_once("includes/clock.php");?></a>

<div class="container-fluid"><br>
<div class="row">
<div class="p-1 text-center">
    <img src="images/theme.png" style="width:190px;height:120px;">
    <h4>Ramifyo Coco Beach Resort (Pvt) Ltd.</h4>
    <h5>Customer Invoice</h5>
</div>

    <!--food bill calculate area start-->
    <div class="table-responsive">
    <div class="col-md-12">
        <div class="card bg-dark">
          <div class="card-body">

              <h6 class="card-title text-center text-light">- Personal Information -</h6>
              <div class="row">
              <?php
              if(isset($_POST["print_cus_info"])){
              $useremail = $_POST["cus_email"];
              //echo  $cus_name;
              

              $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$useremail'");
                while($row=mysqli_fetch_array($Result)){
                  $fullname = $row["fullname"];
                  $nic = $row["nic"];
                  $phoneno = $row["phoneno"];
                  $street = $row["streete"];
                  $city = $row["city"];
                  $state = $row["state"];  
              ?>
  
              <div class="card col-md-6 p-4">
              <p class="badge bg-success text-wrap">Personal Details</p>
              <span>Email: <?php echo "$useremail";?></span>
              <span>Full Name: <?php echo "$fullname";?></span>
              <span>NIC: <?php echo "$nic";?></span>
              <span>Contact No: <?php echo "$phoneno";?></span>
              <span>Address: <?php echo "$street",", ","$city",", ","$state";?></span>
              </div>
              <br>
              <?php } ?>

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
  
              <div class="card col-md-6 p-4 card-info">
              <p class="badge bg-success text-wrap">Room Reservation Details</p>
              <span>Room reservation date: <?php echo "$reservationDate";?></span>
              <span>Room number: <?php echo "$room_no";?></span>
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

              <h6 class="card-title text-center text-light">- Summary of Meal Consumption -</h6>
              <table class="table table-sm table-hover table-secondary">
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

                      if(isset($_POST["print_cus_info"])){
                        $useremail = $_POST["cus_email"];

                      $orderstatus=1;
                      $tobill=0;
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail' AND orderstatus='$orderstatus' order by date DESC;");
                      
                        while($row=mysqli_fetch_array($Result)){
                        $fname = $row["foodname"];
                        $fprice = $row["price"];
                        $foodamount = $row["amount"];
                        $fooddate = $row["date"];  
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
              <!--food bill calculate area end--> 
              <hr>

              <h6 class=" card-title text-center text-light">Meal consumption fee <span><mark><?php echo "Rs.$Totalbill/=";?></mark></span></h6>
              <!--total bill calculate area start--> 
              <table class="table table-sm table-hover table-secondary">
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
                  $Result = mysqli_query($db,"SELECT * FROM reservation WHERE email='$useremail' AND res_status='1';");
                    while($row=mysqli_fetch_array($Result)){
                      $AdvanceforRoom = $row["advance_amount"];
                      $nights = $row["nights"];
                    }

                  $Result = mysqli_query($db,"SELECT rate FROM room");
                    while($row=mysqli_fetch_array($Result)){
                      $TotalchargeforRoom = $row["rate"]; 
                    }
                ?>

                <tbody>
                <?php
                  if(isset($_POST["print_cus_info"])){
                  ?>
                <tr>
                  <td><?php $TotalChargeforFood=$Totalbill; echo "Rs.$TotalChargeforFood/=";?></td>
                  <td title="<?php echo $TotalchargeforRoom ?> LKR * <?php echo $nights ?> night(s)"><?php $TotalchargeforRoom=$TotalchargeforRoom*$nights; echo "Rs.$TotalchargeforRoom/=";?></td>
                  <td title="<?php echo $TotalChargeforFood ?> LKR (Food charges) + <?php echo $TotalchargeforRoom ?> LKR (Total room charges)"><?php $FinalTotalbill=$TotalChargeforFood+$TotalchargeforRoom; echo "Rs.$FinalTotalbill/=";?></td>
                  <td><?php $AdvanceforRoom; echo "Rs.$AdvanceforRoom/=";?></td>
                  <td title="<?php echo $FinalTotalbill ?> LKR - <?php echo $AdvanceforRoom ?> LKR"><mark><?php $BalanceDue=$FinalTotalbill-$AdvanceforRoom; if($FinalTotalbill == 0){echo "Rs.0.00/=";}else{echo "Rs.$BalanceDue/=";}?></mark></td>     
                </tr>
                <?php }?>
                </tbody>
              </table>
            </div>
            
            <h6 class="text-light p-2">Bill Description</h6>
            <span class="text-light p-2">Total Meal Charges ++++++++++++++  &nbsp;<?php $TotalChargeforFood=$Totalbill; echo "Rs.$TotalChargeforFood";?></span>
            <span class="text-light p-2">Total Room Charges ++++++++++++++  Rs.<?php echo $TotalchargeforRoom ?> [for <?php echo $nights ?> night(s)]</span>
            <span class="text-light p-2">Total Charges  ++++++++++++++++++  Rs.<?php echo $FinalTotalbill ?> [Meal charges + Room charges]</span>
            <span class="text-light p-2">Advance for Room +++++++++++++++  <?php $AdvanceforRoom; echo "Rs.$AdvanceforRoom";?></span>
            <span class="text-light p-2">Sub Total  +++++++++++++++++++++  Rs.<?php echo $FinalTotalbill ?> - Rs.<?php echo $AdvanceforRoom ?><br><br><mark>++++++++++++++++++++++++<b> <?php $BalanceDue=$FinalTotalbill-$AdvanceforRoom; if($FinalTotalbill == 0){echo "Rs.0.00/=";}else{echo "Rs.$BalanceDue/=";}?></b>++++++++++++++++++++++++</span><br>
          </div>
        </div>
        
        <div class="p-1 text-center">
            <img src="images/handshake.png" style="width:160px;height:130px;">
            <h4>- Thank You ! Come Again -</h4>
            <h6>Ramifyo Coco Beach Resort (Pvt) Ltd.</h6>
        </div>
      </div>
      <!--total bill calculate area end-->
        <div class="p-2 text-center">
          <input type="button" name="cancelvalue" value="CANCEL" class="btn btn-warning p-2" onClick="self.close()"> 
          <input type="submit" class="btn btn-success p-2" value="Print this Document" onClick="return f3();">
          <!--<a onclick="document.location.href='employeedashbord.php';"  class="btn btn-warning p-2">Back to Previous Page</a>-->
        </div>

</div>
</div>

</body>
</html>
