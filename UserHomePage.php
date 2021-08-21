<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>
<!--Session end-->


<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link href="css/tooltip.css" rel="stylesheet" type="text/css" />
  <script src="assets/js/tooltip.js" type="text/javascript"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>

</head>

<body> 

<!--header start-->
<?php
include_once("includes/header.php");
$useremail = $_SESSION['email'];
?>
<!--header end-->
  
<div class="container-fluid">

 <!--Noodles menu area start-->
 <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">- Summary of Consumption and Final Bill -</h5>

              <div style="height:200px; overflow:auto;">
              <table class="table table-hover table-sm bg-dark">
                <thead>
                    <tr>
                      <th scope="col"><span title="Food Name">Food Name</span></th>
                      <th scope="col"><span title="Unit Price">Unit Price</span></th>
                      <th scope="col"><span title="Meal amount that you have request">Amount</span></th>
                      <th scope="col"><span title="Total charge = Unit price * Amount you request">Total Charge</span></th>
                      <th scope="col"><span title="Order Date">Date</span></th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                      $Totalbill=0;
                      $tobill=0;
                      $orderstatus=1;
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail 'AND orderstatus='$orderstatus' order by date DESC;");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["foodname"];
                      $fprice = $row["price"];
                      $foodamount = $row["amount"];
                      $fooddate = $row["date"];  
                    ?> 

                    <td><?php echo " $fname";?> </td>
                    <td><?php echo "Rs.$fprice/=";?> </td>
                    <td><?php echo " $foodamount";?> </td>
                    <td><?php
                            $tobill=$fprice*$foodamount;
                            $Totalbill=$Totalbill+$tobill;
                            echo "Rs.$tobill/=";?>
                    </td>

                    <td><?php echo "$fooddate";?></td>
                  </tr>

                    <?php } ?> 
                    
                </tbody>
              
              </table>
              </div>
              <hr>

              <?php
              $Result = mysqli_query($db,"SELECT * FROM reservation WHERE email='$useremail' order by date_time DESC LIMIT 3;");
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
  
              <div class="card col-md-6">
              <p class="text-center">My reservaion details</p>
              <span>Room reservation date: <?php echo "$reservationDate";?></span>
              <span>Room number: <mark><?php echo "$room_no";?></mark></span>
              <span>Check in: <?php echo "$check_in";?></span>
              <span>Check out: <?php echo "$check_out";?></span>
              <span>No. of night(s): <?php echo "$nights";?></span>
              <span>No. of adults: <?php echo "$adults";?></span>
              <span>No. of childs: <?php echo "$childs";?></span>
              <span>Status: <?php if($res_status == '1'){ echo "<span class='text-success'>Reservation confirmed</span>";} else{echo "<span class='text-danger'>Reservation canceled</span>";}?></span>
              </div>
              <br>
              <?php } ?>
              <hr>

          
          <h5 class="card-title">Active Total Charges for Foods <span><mark><?php  echo "Rs $Totalbill/=";?></mark></span></h5>
        
          <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <span class="text-warning">Note that, room charges for 0ne(1) night is 6000 LKR.<br>Below table shows room charges for selected nights by you.</span>
          </div>
          <!--total bill calculate area start--> 
          <table class="table table-hover table-sm bg-dark">
            <thead>
              <tr> 
                <th scope="col"><span title="Your total meal consumption charge">Food Charge</span></th>
                <th scope="col"><span title="Your total room charge">Room Charge</span></th>
                <th scope="col"><span title="Total Bill = Meal charge + Room charge">Total</span></th>
                <th scope="col"><span title="Amount that you paid when you booking the our hotel room.">Room Advance</span></th>
                <th scope="col"><span title="Your have to pay below amount.">Balance Due</span></th>
                <th scope="col"><span title="Payment that your have made.">Payment</span></th>
              </tr>
            </thead>

            <?php
            $Result = mysqli_query($db,"SELECT * FROM reservation WHERE email='$useremail' AND res_status='1';");
              while($row=mysqli_fetch_array($Result)){
                $AdvanceforRoom = $row["advance_amount"];
                $nights = $row["nights"];
                $fullpayment = $row["fullpayment"];
                $_SESSION["yy"] = $fullpayment;
                $_SESSION["rr"] = $AdvanceforRoom;
              }

              //$_SESSION["yy"];

            $Result = mysqli_query($db,"SELECT rate FROM room");
              while($row=mysqli_fetch_array($Result)){
                $TotalchargeforRoom = $row["rate"]; 
              }
            ?>

            <tbody>
              <?php
                if(isset($_SESSION["rr"])){
              ?>
              <tr>
                <td><?php $TotalChargeforFood=$Totalbill; echo "Rs.$TotalChargeforFood/=";?></td>
                <td title="<?php echo $TotalchargeforRoom ?> LKR * <?php echo $nights ?> night(s)"><?php $TotalchargeforRoom=$TotalchargeforRoom*$nights; echo "Rs.$TotalchargeforRoom/=";?></td>
                <td title="<?php echo $TotalChargeforFood ?> LKR (Food charges) + <?php echo $TotalchargeforRoom ?> LKR (Total room charges)"><?php $FinalTotalbill=$TotalChargeforFood+$TotalchargeforRoom; echo "Rs.$FinalTotalbill/=";?></td>
                <td><?php $AdvanceforRoom; echo "Rs.$AdvanceforRoom/=";?></td>
                <input type="hidden" value="<?php echo $BalanceDue=$FinalTotalbill-$AdvanceforRoom; "Rs.$BalanceDue/="; ?>">
                <?php
                if($fullpayment == 0){
                echo "<td title='$FinalTotalbill LKR - $AdvanceforRoom LKR'><mark> Rs.$BalanceDue/=</mark></td>";
                }
                elseif($fullpayment != 0){
                  echo "<td>Rs.0/=</td>";
                }
                ?>
                <td><?php $fullpayment; echo "Rs.$fullpayment/=";?></td>   
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <!--total bill calculate area end--> 
        </div><br>

        <!--display payment due balance button or payment complete button start-->
        <div class="text-center">
          <form action="pay_full_payment.php" method="post">
            <?php
            if(isset($_SESSION["yy"])){
            $BalanceDue;
            $fullpayment;
              if($BalanceDue != $fullpayment){
              echo "<input type='hidden' name='emailid' value='$useremail'>";
              echo "<input type='hidden' name='balancedue' value='$BalanceDue'>";
              echo "<i class='fa fa-arrow-circle-right'></i><button type='submit' name='make_full_payment' class='btn btn-danger text-dark'>Please Settle the Due Balance ->>> <b>Rs.$BalanceDue</b></button><i class='fa fa-arrow-circle-left'></i>";
              }

              elseif($BalanceDue == $fullpayment){
              echo "<span class='btn btn-success'>All the payment has been completed !<i class='fa fa-check-circle'></i></span>"; 
              }
            }
            ?>
          
          </form>
        </div>
        <!--display payment due balance button or payment complete button end-->

      </div>
    </div>
  </div>
<!--bill end-->  

      <!--Order Status start-->  
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body bg-dark">
            <div class="table-responsive">
              <div style="width:auto; height:250px; overflow:auto;">
              <h5 class="card-title text-center">My Meal Order Status</h5>
              
              <?php
                $orderstatus='';
                $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail' order by date DESC LIMIT 10;");
                while($row=mysqli_fetch_array($Result)){
                $fname = $row["foodname"];
                $orderstatus=$row["orderstatus"];
                        
                if ($orderstatus==0){         
                  echo "<p class='text-warning' title='Your order is under review status. We will send you a confirmation email once order confirm.'>Your '$fname' order is under review</p>"; 
                  echo "<hr>";
                }
                        
                elseif ($orderstatus==1){          
                  echo "<p class='text-success' title='Order confirmed. As soon as possible we will delivery your meal order.'>Your '$fname' order is on the way.</p>"; 
                  echo "<hr>";
                }      
                }
              ?>
              </div>
            </div>
          </div>
        </div><br>
        
        <!--reservation cancel start-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body bg-dark text-center">
              <h5>Cancel My Reservation</h5>

              <form method="post">
              <div class="form-group">
                <select class="form-control" name="room_number">
									<option selected>Select your reservation room number</option>
										<option> 
											<?php
												$Result = mysqli_query($db,"SELECT room_no FROM reservation WHERE email='$useremail' AND res_status='1';");

												while($row=mysqli_fetch_array($Result)){
                          //$advance_amount = $row["advance_amount"];
												echo "<li>".$row['room_no']."</li>";
												echo "<option>";	
												}
											?>
										</option>
								</select>
              </div>

              <div class="p-2 text-center">
                <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForCancelRoomReservation">CANCEL RESERVATION</button>
              </div>

              <?php include("infobox/cancelreservationinfobox.php"); ?>

              <?php
                if(isset($_POST["cancel_room"])){
                  $room_number = $_POST["room_number"];
                
                  // 0 = reservation canceled
                  // 1 = reservation confirmed
                  $Result = mysqli_query($db,"UPDATE reservation SET advance_amount='0',res_status='0' WHERE email='$useremail' AND room_no='$room_number';");
                    if($Result){

                    echo "<script type='text/javascript'>              
                    swal({ title: 'SUCCESS',text: 'Room reservation cancellation successfull!',icon: 'success'}).then(okay => {
                    if (okay) {
                    window.location.href = 'UserHomePage.php';}
                    });
                    </script>";
                    }
                                        
                    else{
                    echo "<script type='text/javascript'>                
                    swal({ title: 'SUCCESS',text: 'Room reservation cancellation was failed!',icon: 'error'}).then(okay => {
                    if (okay) {
                    window.location.href = 'UserHomePage.php';}
                    });
                    </script>";
                    }
                  }
              ?>
              </form>

            </div>
          </div>
        </div><br>
        <!--reservation cancel end-->

        <!--Permananlty detele reservation start-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body bg-dark text-center">
              <h5>Permananlty Detele Reservation Details</h5>

              <form method="post">
              <div class="form-group">
                <select class="form-control" name="delete_room_number">
									<option selected>Select your canceled room number</option>
										<option> 
											<?php
												$Result = mysqli_query($db,"SELECT room_no FROM reservation WHERE email='$useremail' AND res_status='0';");

												while($row=mysqli_fetch_array($Result)){
                          //$advance_amount = $row["advance_amount"];
												echo "<li>".$row['room_no']."</li>";
												echo "<option>";	
												}
											?>
										</option>
								</select>
              </div>

              <div class="p-2 text-center">
                <button type="reset" class="btn btn-warning btn-sm"><b>CLEAR</b></button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropForDeleteRoomReservation">DELETE PERMANENTLY</button>
              </div>

              <?php include("infobox/deletereservationinfobox.php"); ?>

              <?php
                if(isset($_POST["delete_room"])){
                  $room_number = $_POST["delete_room_number"];
                
                  // 0 = reservation canceled
                  // 1 = reservation confirmed
                  $Result = mysqli_query($db,"DELETE FROM reservation WHERE email='$useremail' AND room_no='$room_number';");
                    if($Result){

                    echo "<script type='text/javascript'>              
                    swal({ title: 'SUCCESS',text: 'Reservation details delete successfull!',icon: 'success'}).then(okay => {
                    if (okay) {
                    window.location.href = 'UserHomePage.php';}
                    });
                    </script>";
                    }
                                        
                    else{
                    echo "<script type='text/javascript'>             
                    swal({ title: 'SUCCESS',text: 'An error occured!',icon: 'error'}).then(okay => {
                    if (okay) {
                    window.location.href = 'UserHomePage.php';}
                    });
                    </script>";
                    }
                  }
              ?>
              </form>

            </div>
          </div>
        </div><br>
        <!--Permananlty detele reservation end-->

        <!--Prepare My Invoice START-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body bg-dark text-center text-dark">
              <h5>Prepare My Invoice</h5>
              <form action="printPDF.php" target="_blank" method="post">
                <?php
                //if(isset($_SESSION["email"])){
                if(isset($_SESSION["email"]) && ($_SESSION["yy"] > 1)){
                $useremail = $_SESSION["email"];
                ?>
                <div class="p-2 text-center">
                <input type="hidden" name="cus_email" readonly value="<?php echo $useremail ?>">
                <input type="submit" class="p-2 btn btn-success" name="print_cus_info" value="Prepare">
                </div>
                <?php }
                  else{
                    echo "<input type='button' class='p-2 btn btn-danger' value='Action not allowed untill full payment !'>";
                    }
                ?>
                
                </form>
            </div>
          </div>
        </div><br>
        <!--Prepare My Invoice END-->

        <div class="col-sm-3">
          <div class="bg-info text-center" style="height:60px;">
            <h6 class="tooltip" onmouseover="tooltip.pop(this,'<h4><b>Room reservation policies</b></h4><h6><b>Check-in Time and Check-out Time</b></h6><h6>Check-in Time: From 1400h (02:00 pm)<br>Check-out Time: Until 1200h (12:00 noon)</h6><br><h6><b>Child Policy</b></h6><br><h6>- Children below 5 years - free of charge on existing bedding.<br>- Children between 6-11 years (up to maximum 02 children) sharing parents room - 50%.<br>- Children of 12 years and above are considered as adults, and full rate will be charged.</h6><br><h6><b>Applicable Rate</b></h6><br><h6>- The Sri Lankan rate made available through the online booking engine in LKR, are only applicable for Sri Lankans and Sri Lankan resident visa holders.<br>- Verification (Sri Lankan National ID or the Passport) will also be requested at the hotel during check-in to confirm Nationality.<br>- If a guest book the Sri Lankan rate and a foreign national(s) is a part of the group, the standard foreign rate will be charged from that guest(s) at the hotel during check-in.<br>- If a foreign national does book the Sri Lankan rate, then the difference between the Sri Lankan rate and the standard foreign rate will have to be paid.</h6><br><h6><b>Booking (Reservation) Disputes.</b></h6><br><h6>If a dispute arises with regard to a reservation made with Ramifyo Coco Beach Resort, then Ramifyo Coco Beach Resort(Pvt) Ltd has the sole authority to cancel the reservation by informing the guest via email. The reservation amount will be refunded in full minus any bank charges to the credit card of the guest.</h6><br>')">Hover me<h5>Our<br>Policies</h5></h6>
          </div>
        </div>

        </div>
      </div>
      <!--Order Status end-->  
      </div>
    
      </div>
      </div>
      </div>

      <script src="assets/js/bootstrap.bundle.min.js"></script>

<!--footer start-->
<?php
include_once("includes/footer.php");
?>
<!--footer end-->

</body>
</html>