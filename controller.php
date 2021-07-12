<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body></body>
</html>

<?php
session_start(); //starting the session, necessary for using session variables

include("model.php");

//user registration function start
if(isset($_POST["reg_user"])){

    //receiving the values entered and storing in the variables
    $id=0;
    $usertype='0';
    $fullname=$_POST["fullname"];
    $nic=$_POST["nic"];
    $phoneno=$_POST["phoneno"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $streete= '';
    $city= '';
    $state= '';
    $propicture= '';

    date_default_timezone_set('Asia/Colombo');
    $regdate = date('y-m-d h.i.s AM');
    $password = md5($password);
    $arr=array($id,$usertype,$fullname,$nic,$phoneno,$email,$password,$streete,$city,$state,$propicture,$regdate);
    
    if($obj->save("users",$arr)){
        echo "<script type='text/javascript'>           
        swal({ title: 'SUCCESSFUL',text: 'Registration Successfully!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'Login.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>           
        swal({ title: 'Opps!',text: 'An error occured !',icon: 'error'}).then(okay => {
        if (okay) {
        window.location.href = 'Login.php';}
        });
        </script>";
    }

}
//user registration function end


//user login function start
if (isset($_POST['login_user'])) {

    $email=$_POST["email"];
    $password=$_POST["password"];

    $password = md5($password);

    //page on which the user is sent to after logging in
    if($obj->login($email,$password)=="1"){
        header('location: admindashbord.php');
    }
    elseif($obj->login($email,$password)=="2"){
        header('location: employeedashbord.php');
    }
    elseif($obj->login($email,$password)=="0"){
        header('location: UserHomePage.php');
    }
    else{
        echo "<script type='text/javascript'>           
        swal({ title: 'Opps!',text: 'An error occured !',icon: 'error'}).then(okay => {
        if (okay) {
        window.location.href = 'Login.php';}
        });
        </script>";
    }
}
//user registration function end


//Food adding function start


if(isset($_POST["addfood"])){

    $ftype=$_POST["ftype"];
    $mealplantype=$_POST["mealplantype"];
    $fname=$_POST["fname"];
    $fprice=$_POST["fprice"];
    $fdescription=$_POST["fdescription"];
    $fid=0;

	//Profile pic upload
	$file = $_FILES["fpicture"]["tmp_name"];
	$fimg = $fname;
	$path1 = "images/food/".$fimg.".jpg";
	$r = move_uploaded_file($file, $path1);
    
    $arr=array($fid,$fname,$fprice,$ftype,$mealplantype,$fdescription,$path1);

    if($obj->save("foods",$arr)){
        echo "<script type='text/javascript'>              
        swal({ title: 'SUCCESS',text: 'Food has been added!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'foodgallery.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>              
		swal({ title: 'ERROR',text: 'Food added failed!',icon: 'error'}).then(okay => {
		if (okay) {
		window.location.href = 'foodgallery.php';}
		});
		</script>";
        }

}
//Food adding function end


//News adding function start
if(isset($_POST["addnews"])){

    $newsid=0;
    $posttype=$_POST["posttype"];
    $tit=$_POST["tit"];
    $annou=$_POST["annou"];
    $postimage=$_POST["postimage"];

    date_default_timezone_set('Asia/Colombo');
    $newsadddate = date('y-m-d h.i.s AM');
    
    $arr=array($newsid,$posttype,$tit,$annou,$postimage,$newsadddate);

    if($obj->save("news_offer",$arr)){
        echo "<script type='text/javascript'>               
        swal({ title: 'SUCCESS',text: 'News has been added!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'News & Feedback.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>               
		swal({ title: 'ERROR',text: 'News added failed!',icon: 'error'}).then(okay => {
		if (okay) {
		window.location.href = 'News & Feedback.php';}
		});
		</script>";
        }

}
//News adding function end


//Feedback adding function start


if(isset($_POST["sendfeedback"])){
    
        $feedid=0;
        $feedname=$_POST["feedname"];
        $feddemailid=$_POST["feddemailid"];
        $feeddescription=$_POST["feeddescription"];
        date_default_timezone_set('Asia/Colombo');
        $feedadddate = date('y-m-d h.i.s AM');
        
        
        $arr=array($feedid,$feedname,$feddemailid,$feeddescription,$feedadddate);
    
    
        if($obj->save("customer_feedback",$arr)){
            echo "<script type='text/javascript'>
                            
            swal({ title: 'SUCCESS',text: 'Feedback has been added!',icon: 'success',timer: 000}).then(okay => {
            if (okay) {
            window.location.href = 'UserHomePage.php';}
            });
            </script>";
        
        }
        else{
            echo "<script type='text/javascript'>
                            
            swal({ title: 'ERROR',text: 'Feedback added failed!',icon: 'error',timer: 4000}).then(okay => {
            if (okay) {
            window.location.href = 'UserHomePage.php';}
            });
            </script>";
            }
    
    }
    //Feedback adding function end

?>
