<!DOCTYPE html>
<html>
<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body></body>
</html>

<?php
//Database Connection include start
include_once("../includes/dbconnection.php");
//Database Connection include end
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['meal_order_confirm'])){
  $emailid = $_POST["emailid"];
  $orderid = $_POST["orderid"];
  $foodname = $_POST["foodname"];
  $amount = $_POST["amount"];
  $price = $_POST["price"];
  $totalprice = $price*$amount;

  $Result = mysqli_query($db,"SELECT * FROM users WHERE email='$emailid'");
  while($row=mysqli_fetch_array($Result)){
	//$fullname = $row["fullname"];
	$_SESSION['cus_name'] = $row["fullname"];//add full name to session variable
  }

  $mail_body = "
  <p>Dear ".$_SESSION['cus_name'].",</p>
  <p>Thanks for your order.
  <p><b>Your meal order has been approved.</b> Meal order will receive you soon.</p>
  <p>Your order details here</p>
  Order ID: <mark>".$orderid."</mark><br/>
  Food Name: <mark>".$foodname."</mark><br/>
  Amount: <mark>".$amount."</mark><br/>
  Unit price: <mark>Rs.".$price."</mark><br/>
  Total charge: <mark>Rs.".$totalprice."</mark></p>
  <p>If you have any question feel free to contact us.</p>
  <a href='tel: +94777242153'>+94 777 24 2153</a><br/>
  <a href='mailto:ramifyonego@yahoo.com'>ramifyonego@yahoo.com</a><br/>
  <a href='https://www.ramifyo.lk'>www.ramifyo.lk</a>
  <p>Best Regards,<br/>Ramifyo Coco Beach Resort (Pvt) Ltd.</br></p>
  ";

  //Load Composer's autoloader
  require '../vendor/autoload.php';
  require '../credential.php';

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
	  $mail->Subject = 'Your '.$foodname.' meal order is on the way !';
	  $mail->Body    = $mail_body;
	  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	  $mail->send();
	  //echo "<script>alert('Message has been sent')</script>";
  } catch (Exception $e) {
	  //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
  }
  }


if(isset($_POST['meal_order_confirm'])){
$emailid = $_POST["emailid"];
$foodid = $_POST["orderid"];
$status = $_POST["orderstatus"];

$Result = mysqli_query($db,"UPDATE foodorders SET orderstatus='$status' WHERE customerid='$emailid' AND foodorderid ='$foodid'");
if($Result){
	echo "<script type='text/javascript'>
      
	swal({ title: 'Success !',text: 'order confirmed',icon: 'success'}).then(okay => {
	if (okay) {
    window.location.href = '../admindashbord.php';}
	});
    </script>";

	}

else{
	echo "<script type='text/javascript'>
                
	swal({ title: 'An error occured!',text: 'Try again',icon: 'error'}).then(okay => {
	if (okay) {
    window.location.href = '../admindashbord.php';}
	});
    </script>";
}
}

?>