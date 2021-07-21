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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
 

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

<body>
  <hr>  
<body class="bg-theme bg-theme1">
<!--header start-->
<?php
include_once("includes/header.php");
$useremail = $_SESSION['email'];
?>
<!--header end-->



    <!--****Javascript****-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/jquery-migrate.min.js"></script>
    <script src="assets/js/apopper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/gijgo.js"></script>
    <script src="assets/js/plugins/vegas.min.js"></script>
    <script src="assets/js/plugins/isotope.min.js"></script>
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <script src="assets/js/plugins/counterup.min.js"></script>
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <script src="assets/js/plugins/slicknav.min.js"></script>
    <script src="assets/js/main.js"></script>

    
  <div class="container-fluid">


 <!--Noodles menu area start-->
 <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">Summery of Serviceses</h5>

              <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col"><h6>FOOD Name</h6></th>
                      <th scope="col"><h6>price of Food</h6> </th>
                      <th scope="col"><h6>Amount</h6></th>
                      <th scope="col"><h6>Total Price of Food Charge </h6></th>
                      <th scope="col"><h6>Date</h6></th>
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
                  <h5 class="card-title text-center">  Active Total Charges for Food 
        <button type="button" class="btn btn-dark btn-sm"><?php  echo "Rs $Totalbill/=";?></button> </h5>
<!--total bill calculate area start--> 
           <table class="table table-sm">
           <thead>

                    <tr> 
                      <th scope="col"><h6>Total Charge for Food</h6> </th>
                      <th scope="col"><h6>Total charge for Room </h6></th>
                      <th scope="col"><h6>Total bill</h6></th>
                      <th scope="col"><h6>Advance for Room</h6></th>
                      <th scope="col"><h6>Balance Due </h6></th>
                      
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
          <div class="card-body">
            <div class="table-responsive">
              <h5 class="card-title text-center">Order Status</h5>
              
              
                
                                  <?php

                    
                    $orderstatus='';
                      $Result = mysqli_query($db,"SELECT * FROM foodorders WHERE customerid='$useremail' order by foodorderid DESC LIMIT 10;");
                      while($row=mysqli_fetch_array($Result)){
                      $fname = $row["foodname"];
                      $orderstatus=$row["orderstatus"];
                      
                      if ($orderstatus==0){
                          
                         echo "Your $fname Order is uneder Review "; 
                         echo "<hr>";
                      }
                      
                       elseif ($orderstatus==1){
                          
                         echo "Your $fname  Order is Conformed "; 
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