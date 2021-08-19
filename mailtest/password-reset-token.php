<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include('includes/dbconnection.php');
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    
    
    $emailId = $_POST['email'];

    $result = mysqli_query($db,"SELECT * FROM users WHERE email='" . $emailId . "'");

    $row= mysqli_fetch_array($result);

  if($row)
  {
    
     $token = md5($emailId).rand(10,9999);

     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

    $expDate = date("Y-m-d H:i:s",$expFormat);

    $update = mysqli_query($db,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

    $link = "<a href='www.yourwebsite.com/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

   

require './vendor/autoload.php';
require 'credential.php';

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

    
     $mail->setFrom(EMAIL, 'Ramifyo Resort');
    $mail->AddAddress($emailId);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Go back";
  }
}
?>

