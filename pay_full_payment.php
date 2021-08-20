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
	<title>Pay Full Payment</title>
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
</head>

<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->


<div class="container-fluid">

		<div class="col-sm-6 text-center">
			<br><h1>Final Bill Payment</h1><br>

			<div class="card" style="background-color:#8f8f8f;">
        	<div class="card-body">

          <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            if(isset($_POST['make_full_payment'])){
              $emailid = $_POST["emailid"];
              $balancedue = $_POST["balancedue"];

              $Result = mysqli_query($db,"UPDATE reservation SET fullpayment='$balancedue' WHERE email='$emailid' AND res_status='1'");

              $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$emailid'");
              while($row=mysqli_fetch_array($Result)){
                //$fullname = $row["fullname"];
                $_SESSION['cus_name'] = $row["fullname"];//add full name to session variable
                $_SESSION['nic'] = $row["nic"];
              }

              $mail_body = "
              <p>Dear ".$_SESSION['cus_name'].",</p>
              <p>Thanks for your payment. We have successfully received your payment amount <b>Rs.$balancedue/=</b>
              <p>We are happy to say, now your all the due balance have been fully settle.</p><br>

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

                  //Content
                  $mail->isHTML(true);//Set email format to HTML
                  $mail->Subject = 'Your Payment Confirmation #' .$_SESSION['nic'];
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
            if(isset($_POST['make_full_payment'])) {
                $nic = $_SESSION['nic'];
                $emailid = $_POST["emailid"];
                $balancedue = $_POST["balancedue"];
            }

            $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$emailid'");
            while($row=mysqli_fetch_array($Result)){

                $fullname = $row["fullname"];//add full name to session variable
                $email = $row["email"];
                $phoneno = $row["phoneno"];
                $streete = $row["streete"];
                $city = $row["city"];
                $state = $row["state"];
            ?>

            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                <input type="hidden" name="merchant_id" value="1218261"> <!--Ramifyo Resort Merchant ID-->
                <input type="hidden" name="return_url" value="http://127.0.0.1/project/UserHomePage.php">
                <input type="hidden" name="cancel_url" value="http://127.0.0.1/project/UserHomePage.php">
                <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                
                <br><br><b>Payment Details</b><br>
                NIC<br><input type="text" name="order_id" readonly value="<?php echo $nic ?>">
                <input type="hidden" name="items" value="NIC: <?php echo $nic ?> | Email: <?php echo $email ?>"><br>
                Currency<br><input type="text" name="currency" readonly value="LKR"><br>
                Payment Amount<br><input type="text" name="amount" readonly value=<?php echo $balancedue ?>><br>
                
                <br><br><b>Personal Details</b><br>
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
