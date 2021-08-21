<?php

include("db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class model extends db{

    //Registration function
    function save($table,$arr){
        $res=mysqli_query($this->connect(),"insert into $table values('".implode("','",array_values($arr))."')");
    
        if($res){
            return true;
        }
        else{
            return false;
        }
    }


    //Login function
    function login($email,$password){
        //$password = md5($password);
        $res = mysqli_query($this->connect(),"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $c = false;

        while($row = mysqli_fetch_array($res)){
        $c = true;
        $utype = $row["usertype"];
        $_SESSION["email"] = $email;
        }

        if($c){

            if ($utype=='1') {
            return "1";
            }

            elseif ($utype=='2') {
            return "2";
            }

            elseif ($utype=='0') {
            return "0";
            }
        }

        else{
        return false;
        }
    }

    //Registration confirmation Email send function
    function mailsend($fullname,$email){
        //$res=mysqli_query($this->connect(),"insert into $table values('".implode("','",array_values($arr))."')");

        $mail_body = "
        <p>Hello ".$fullname.",</p>
        <p>Thanks for Registration.
        <p><b>Your account has been created.</b> You can access to your account by providing your email(username) and password.</p>
        <p>If you have any question feel free to contact us.</p>
        <a href='tel: +94777242153'>+94 777 24 2153</a><br/>
        <a href='mailto:ramifyonego@yahoo.com'>ramifyonego@yahoo.com</a><br/>
        <a href='https://www.ramifyo.lk'>www.ramifyo.lk</a>
        <p>Best Regards,<br/>Ramifyo Coco Beach Resort (Pvt) Ltd.</br></p>
        ";

        //Load Composer's autoloader
        require './vendor/autoload.php';
        require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require './vendor/phpmailer/phpmailer/src/SMTP.php';
        require './vendor/phpmailer/phpmailer/src/Exception.php';
        require 'credential.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer;

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
            $mail->addAddress($email);//Add a recipient
            $mail->addReplyTo(SUPPORT, 'Ramifyo Support');

            //Attachments
            //$mail->addAttachment('example.jpg');//Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');//Optional name

            //Content
            $mail->isHTML(true);//Set email format to HTML
            $mail->Subject = 'Registration Successful !';
            $mail->Body    = $mail_body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //return true;
            echo "<script type='text/javascript'>           
            swal({ title: 'Registration Successful!',text: 'You will receive the confirmation email soon.',icon: 'success'}).then(okay => {
            if (okay) {
            window.location.href = 'Login.php';}
            });
            </script>";
            //echo "<script>alert('Message has been sent')</script>";
        }
        catch (Exception $e) {
            //return false;
            echo "<script type='text/javascript'>           
            swal({ title: 'Opps!',text: 'An error occured !',icon: 'error'}).then(okay => {
            if (okay) {
            window.location.href = 'Login.php';}
            });
            </script>";
            //echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        }
    
        /*if($res){
            return true;
        }
        else{
            return false;
        }*/
    }

}

$obj=new model;



?>