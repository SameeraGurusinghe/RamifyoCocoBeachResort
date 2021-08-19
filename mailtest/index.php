<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('../includes/dbconnection.php');



if(isset($_POST['password-reset-token'])){

    
    $emailId = $_POST['email'];

    $result = mysqli_query($db,"SELECT * FROM user WHERE email='" . $emailId . "'");

    $row= mysqli_fetch_array($result);

  if($row)
  {
    
     $token = ($emailId).rand(10,9999);

     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

    $expDate = date("Y-m-d H:i:s",$expFormat);

    $update = mysqli_query($db,"UPDATE user set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

    $link = "<a href='http://127.0.0.1/Remifiyonewone/project/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";


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
    $mail->SMTPAutoTLS = false;
    $mail->Username   = EMAIL;//SMTP username
    $mail->Password   = PASS;//SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//Enable implicit TLS encryption
    $mail->Port       = 587;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL, 'Ramifyo Resort');
   $mail->addAddress($_POST['email']);//Add a recipient
    //$mail->addAddress('ellen@example.com');//Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');//Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');//Optional name

    //Content
    $mail->isHTML(true);//Set email format to HTML
   $mail->Subject  =  'Reset Password';
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>alert('Message has been sent')</script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
}
}}
?>


