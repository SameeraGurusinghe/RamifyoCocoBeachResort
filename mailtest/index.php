<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    </head>
    <body></body>
</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('../includes/dbconnection.php');

if(isset($_POST['password-reset-token'])){

    $emailId = $_POST['email'];
    $result = mysqli_query($db,"SELECT * FROM users WHERE email='" . $emailId . "'");
    $row= mysqli_fetch_array($result);

  if($row){
    
    $token = ($emailId).rand(10,9999);
    $expFormat = mktime(
    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
    );

    $expDate = date("Y-m-d H:i:s",$expFormat);
    $update = mysqli_query($db,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,
    exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
    $link = "<a href='http://127.0.0.1/project/reset-password.php?key=".$emailId."&token=".$token."'>Reset Password</a>";

    //email body
    $mail_body = "
    <p>Dear ".$emailId.",</p>
    <p>Please click the password reset link below.
    <p><b>Note that, Password reset link expired after 24 hours.</b> So, reset your password as soon as possible.</p>
    <button style='color:green;'>$link</button>
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
        $mail->SMTPAutoTLS = false;
        $mail->Username   = EMAIL;//SMTP username
        $mail->Password   = PASS;//SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//Enable implicit TLS encryption
        $mail->Port       = 587;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(EMAIL, 'Ramifyo Resort');
        $mail->addAddress($_POST['email']);//Add a recipient
        $mail->addReplyTo(EMAIL);

        //Content
        $mail->isHTML(true);//Set email format to HTML
        $mail->Subject  =  'Password Reset Link';
        $mail->Body    = $mail_body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo "<script>alert('Message has been sent')</script>";
        echo "<script type='text/javascript'>           
        swal({ title: 'Success!',text: 'The password reset link has been send to the email.',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = '../resetLinkSendCompleted.php';}
        });
        </script>";
        
    } catch (Exception $e) {
        //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        echo "<script type='text/javascript'>           
        swal({ title: 'Opps!',text: 'An error occured. Try again.',icon: 'error'}).then(okay => {
        if (okay) {
        window.location.href = '../Login.php';}
        });
        </script>";
    }
    }
}
?>


