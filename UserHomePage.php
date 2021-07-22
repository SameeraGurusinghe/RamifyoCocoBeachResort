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
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/app-style.css" rel="stylesheet"/>

</head>

<body>
  <hr>  
<body class="bg-theme bg-theme1">
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
              <h5 class="card-title text-center">Summary of Services</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col"><h6 title="Food Name">FOOD Name</h6></th>
                      <th scope="col"><h6 title="Unit price">Unit Price</h6> </th>
                      <th scope="col"><h6 title="Meal amount that you request">Amount</h6></th>
                      <th scope="col"><h6 title="Total charge = Unit price * Amount you request">Total Charge</h6></th>
                      <th scope="col"><h6 title="Date and time you place the order">Date</h6></th>
                    </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php

                    $Totalbill=0;
                    $tobill=0;
                    $orderstatus=1;
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail 'AND orderstatus='$orderstatus'");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["foodname"];
                      $fprice = $row["price"];
                      $foodamount = $row["amount"];
                      $fooddate = $row["date"];  
                    ?> 

                     
                      <td><?php echo " $fname";?> </td>
                      <td><?php echo " $fprice";?> </td>
                      <td><?php echo " $foodamount";?> </td>
                      <td>
                          <?php 
                      
                      $tobill=$fprice*$foodamount;
                      $Totalbill=$Totalbill+$tobill;


                      echo "Rs $tobill/=";?> </td>


                      <td><?php echo "$fooddate";?> </td>
      
                     </tr>

                    <?php 
                    }
                    ?> 
                    
                  </tbody>
              
                </table>
               <hr>
                  <h5 class="card-title text-center">Active Total Charges for Food 
        <button type="button" class="btn btn-dark btn-sm"><?php  echo "Rs $Totalbill/=";?></button> </h5>
<!--total bill calculate area start--> 
           <table class="table table-sm">
           <thead>

                    <tr> 
                      <th scope="col"><h6 title="Your total meal consumption charge">Food Charge</h6> </th>
                      <th scope="col"><h6 title="Your total room charge">Room Charge</h6></th>
                      <th scope="col"><h6 title="Total Bill = Meal charge + Room charge">Total bill</h6></th>
                      <th scope="col"><h6 title="Amount that you paid when you booking the our hotel room.">Advance for Room</h6></th>
                      <th scope="col"><h6 title="Your have to pay below amount.">Balance Due</h6></th>
                      
                    </tr>
          </thead>


          <tbody>

                 <tr>
                      <td><?php $TotalChargeforFood=$Totalbill; echo " $TotalChargeforFood";?> </td>
                      <td><?php $TotalchargeforRoom=1500; echo " $TotalchargeforRoom";?> </td>
                      <td><?php $FinalTotalbill=$TotalChargeforFood+$TotalchargeforRoom; echo " $FinalTotalbill";?> </td>
                      <td><?php $AdvanceforRoom=0; echo " $AdvanceforRoom";?> </td>
                      <td><?php $BalanceDue=$FinalTotalbill-$AdvanceforRoom; echo " $BalanceDue";?> </td>     
                </tr>
                

                    
</tbody>
                </table>
              <!--total bill calculate area end--> 
              <hr>
            </div>
          </div>
        </div>
      </div>
      <!--bill end-->  
      <!--Order Status start-->  
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body bg-dark">
            <div class="table-responsive">
              <h5 class="card-title text-center">Order Status</h5>
              
              
                
                                  <?php

                    
                    $orderstatus='';
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail' order by date DESC LIMIT 10;");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["foodname"];
                      $orderstatus=$row["orderstatus"];
                      
                      if ($orderstatus==0){
                          
                         echo "<p class='text-warning' title='Your order is under review status. We will send you a confirmation email once order confirm.'>Your '$fname' Order is uneder Review</p>"; 
                         echo "<hr>";
                      }
                      
                       elseif ($orderstatus==1){
                          
                         echo "<p class='text-success' title='Order confirmed. As soon as possible we will delivery your meal order.'>Your '$fname' Order is on the way.</p>"; 
                         echo "<hr>";
                      }
                      
                      }
                    ?> 

              
              
              </div>
          </div>
        </div>
      </div>
      <!--Order Status end-->  
      </div>
    
      </div>
      </div>
      </div>


    </body>


  <!--footer start-->
<?php
include_once("includes/footer.php");
?>
<!--footer end-->
</html>