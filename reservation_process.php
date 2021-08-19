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
	<title>Reservation</title>
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
</head>

<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

<div class="row">
    <div class="col-sm-3"><br><br><br><br><br><br>

    <div class="col-sm-3">
      <div class="bg-info text-center" style="height:60px;">
        <h6 class="tooltip" onmouseover="tooltip.pop(this, '<h4><b>How to reservation room(s)?</b></h4><h5>Do following steps</h5><h6>1. Select a <b>check in</b> date that you wish..</h6><br><h6>2. Select a <b>check out</b> date..</h6><br><h6>3. Select no. of adult(s) and children(s)..</h6><br><h6>4. Then click <b>Check Availability</b> button..</h6><br><h6>5. After you click above mentioned button, bottom of the page will displayed the available room(s)..</h6><br><h6>6. Now you can select any room(s) and click the <b>Reservation</b> button..</h6><h6><br>7. After you click the above mentioned button, you will redirect to the reservation conformation page..</h6><br><h6>8. The reservation conformation page you need to confirm your reservation by clicking <b>Yes. I want to reserve selected room</b> button..</h6>')">Hover me<h5>How<br>to</h5></h6>
      </div>
      <br>
      <div class="bg-info text-center" style="height:60px;">
        <h6 class="tooltip" onmouseover="tooltip.pop(this,'<h4><b>Room reservation policies</b></h4><h6><b>Check-in Time and Check-out Time</b></h6><h6>Check-in Time: From 1400h (02:00 pm)<br>Check-out Time: Until 1200h (12:00 noon)</h6><br><h6><b>Child Policy</b></h6><br><h6>- Children below 5 years - free of charge on existing bedding.<br>- Children between 6-11 years (up to maximum 02 children) sharing parents room - 50%.<br>- Children of 12 years and above are considered as adults, and full rate will be charged.</h6><br><h6><b>Applicable Rate</b></h6><br><h6>- The Sri Lankan rate made available through the online booking engine in LKR, are only applicable for Sri Lankans and Sri Lankan resident visa holders.<br>- Verification (Sri Lankan National ID or the Passport) will also be requested at the hotel during check-in to confirm Nationality.<br>- If a guest book the Sri Lankan rate and a foreign national(s) is a part of the group, the standard foreign rate will be charged from that guest(s) at the hotel during check-in.<br>- If a foreign national does book the Sri Lankan rate, then the difference between the Sri Lankan rate and the standard foreign rate will have to be paid.</h6><br><h6><b>Booking (Reservation) Disputes.</b></h6><br><h6>If a dispute arises with regard to a reservation made with Ramifyo Coco Beach Resort, then Ramifyo Coco Beach Resort(Pvt) Ltd has the sole authority to cancel the reservation by informing the guest via email. The reservation amount will be refunded in full minus any bank charges to the credit card of the guest.</h6><br>')">Hover me<h5>Our<br>Policies</h5></h6>
      </div>
    </div>

    </div>

		<div class="col-sm-6 text-center">
			<br><h1>Checkout</h1><br>

            <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Note that, </strong>we are automatically added the payment advance (1000 LKR) for reservation perpose.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Hide"></button>
            </div>

			<div class="card" style="background-color:#8f8f8f;">
        	<div class="card-body">

          <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            if(isset($_POST['room_reservation'])){
              $roomno = $_POST["roomno"];
              $emailid = $_POST["emailid"];
              $date1 = $_POST["date1"];
              $date2 = $_POST["date2"];
              $adults = $_POST["adults"];
              $childs = $_POST["childs"];
              $nights = $_POST["nights"];
              $pay = 1000;

              $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$emailid'");
              while($row=mysqli_fetch_array($Result)){
                //$fullname = $row["fullname"];
                $_SESSION['cus_name'] = $row["fullname"];//add full name to session variable
              }

              $mail_body = "
              <p>Dear ".$_SESSION['cus_name'].",</p>
              <p>Thanks for your reservation.
              <p><b>Your room reservation has been completed.</b></p>
              <p>Your resevation detaile here</p>
              Room No: <mark>".$roomno."</mark><br/>
              Check-in: <mark>".$date1."</mark><br/>
              Check-out: <mark>".$date2."</mark><br/>
              No. of night(s): <mark>".$nights."</mark><br/>
              Members: <mark>".$adults." Adult(s) ,".$childs." Children(s)</mark><br/>
              Advance payment: <mark>Rs.".$pay."</mark></p>
              <p>If you have any question feel free to contact us.</p>
              <a href='tel: +94777242153'>+94 777 24 2153</a><br/>
              <a href='mailto:ramifyonego@yahoo.com'>ramifyonego@yahoo.com</a><br/>
              <a href='https://www.ramifyo.lk'>www.ramifyo.lk</a>
              <p>Best Regards,<br/>Ramifyo Coco Beach Resort (Pvt) Ltd.</br></p>
              ";

              //Load Composer's autoloader
              require './vendor/autoload.php';
              require 'credential.php';

              //Create an instance; passing `true` enables exceptions
              $mail = new PHPMailer(true);

              try {
                  //Server settings
                  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;//Enable verbose debug output
                  $mail->isSMTP();//Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';//Set the SMTP server to send through
                  $mail->SMTPAuth   = true;//Enable SMTP authentication
                  $mail->Username   = EMAIL;//SMTP username
                  $mail->Password   = PASS;//SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//Enable implicit TLS encryption
                  $mail->Port       = 587;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                  //Recipients
                  $mail->setFrom(EMAIL, 'Ramifyo Resort');
                  $mail->addAddress($_POST['emailid']);//Add a recipient
                  $mail->addReplyTo(SUPPORT, 'Ramifyo Support');
                  //$mail->addCC('cc@example.com');
                  //$mail->addBCC('bcc@example.com');

                  //Content
                  $mail->isHTML(true);//Set email format to HTML
                  $mail->Subject = 'Room No '.$roomno.' Reservation successfull !';
                  $mail->Body    = $mail_body;
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                  $mail->send();
                  //echo "<script>alert('Message has been sent')</script>";
              } catch (Exception $e) {
                  //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
              }
              }
              ?>

            <?php
            if(isset($_POST['room_reservation'])) {
                $roomno = $_POST["roomno"];
                $emailid = $_POST["emailid"];
                $date1 = $_POST["date1"];
                $date2 = $_POST["date2"];
                $adults = $_POST["adults"];
                $childs = $_POST["childs"];
                $nights = $_POST["nights"];
            }

            $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$emailid'");
            while($row=mysqli_fetch_array($Result)){
                //$fullname = $row["fullname"];
                $fullname = $row["fullname"];//add full name to session variable
                $email = $row["email"];
                $phoneno = $row["phoneno"];
                $streete = $row["streete"];
                $city = $row["city"];
                $state = $row["state"];
            ?>

            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                <input type="hidden" name="merchant_id" value="1218261"> <!--Ramifyo Resort Merchant ID-->
                <input type="hidden" name="return_url" value="http://127.0.0.1/project/reservation_complete.php">
                <input type="hidden" name="cancel_url" value="http://127.0.0.1/project/booking.php">
                <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                
                <br><br><b>Selected Booking Details By You</b><br>
                Room No<br><input type="text" name="order_id" readonly value="<?php echo $roomno ?>">
                <input type="hidden" name="items" value="Room No: <?php echo $roomno ?> | Night(s): <?php echo $nights ?>"><br>
                Check in<br><input type="text" name="custom_1" readonly value="<?php echo $date1 ?>"><br>
                Check out<br><input type="text" name="custom_2" readonly value="<?php echo $date2 ?>"><br>
                Currency<br><input type="text" name="currency" readonly value="LKR"><br>
                Payment Advance<br><input type="text" name="amount" readonly value="1000"><br>
                
                <br><br><b>Customer Details</b><br>
                <input type="text" name="first_name" readonly value="<?php echo $fullname ?>">
                <input type="hidden" name="last_name" value=""><br>
                <input type="text" name="email" readonly value="<?php echo $email ?>">
                <input type="text" name="phone" readonly value="<?php echo $phoneno ?>"><br>
                <input type="text" name="address" readonly value="<?php echo $streete ?>">
                <input type="text" name="city" readonly value="<?php echo $city ?>">
                <input type="hidden" name="country" value="Sri Lanka"><br><br>

                <input type="submit" class="btn btn-success" value="Make a Reservation"> 
            </form>
            <?php } ?>

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
