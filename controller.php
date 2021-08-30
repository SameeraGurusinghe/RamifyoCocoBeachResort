<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    </head>
    <body></body>
</html>

<?php
session_start(); //starting the session, necessary for using session variables

include("model.php");

//user registration function start
if(isset($_POST["reg_user"])){

    //receiving the values entered and storing in the variables
    $id = 0;
    $usertype = '0';
    $fullname = $_POST["fullname"];
    $nic = $_POST["nic"];
    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];
    $reset_link_token = '';
    $exp_date = '';
    $streete= '';
    $city= '';
    $state= '';
    $propicture= '';
	
    date_default_timezone_set('Asia/Colombo');
    $regdate = date('y-m-d h.i.s');

	if ($password == $password_2) {
    $password = md5($password);//password encryption to increase data security
    
    // if the form is error free, then register the user
    $arr=array($id,$usertype,$fullname,$nic,$phoneno,$email,$password,$reset_link_token,$exp_date,$streete,$city,$state,$propicture,$regdate);
    
    if($obj->save("users",$arr)){

        $obj->mailsend($fullname,$email);

        echo "<script type='text/javascript'>           
        swal({ title: 'Registration Successful!',text: 'Registration Successfull!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'Login.php';}
        });
        </script>";
    }
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
    $foodstatus=0;

	//Profile pic upload
	$file = $_FILES["fpicture"]["tmp_name"];
	$fimg = $fname;
	$path1 = "images/food/".$fimg.".jpg";
	$r = move_uploaded_file($file, $path1);
    
    $arr=array($fid,$fname,$fprice,$ftype,$mealplantype,$fdescription,$path1,$foodstatus);

    if($obj->save("foods",$arr)){
        echo "<script type='text/javascript'>              
        swal({ title: 'SUCCESS',text: 'The food has been added!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'foodgallery.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>              
		swal({ title: 'ERROR',text: 'The food added was failed!',icon: 'error'}).then(okay => {
		if (okay) {
		window.location.href = 'foodgallery.php';}
		});
		</script>";
        }
}
//Food adding function end


//Room adding function start
if(isset($_POST["addroom"])){

    $rnumber = $_POST["rnumber"];
    $rprice = $_POST["rprice"];
    $rdescription = $_POST["rdescription"];
    $rid = 0;
    
    $arr=array($rid,$rnumber,$rdescription,$rprice);

    if($obj->save("room",$arr)){
        echo "<script type='text/javascript'>              
        swal({ title: 'SUCCESS',text: 'The room has been added!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'roomgallery.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>              
		swal({ title: 'ERROR',text: 'The room added was failed!',icon: 'error'}).then(okay => {
		if (okay) {
		window.location.href = 'roomgallery.php';}
		});
		</script>";
        }
}
//Room adding function end


//News adding function start
if(isset($_POST["addnews"])){

    $newsid = 0;
    $posttype = $_POST["posttype"];
    $expiredate = $_POST["expiredate"];
    $tit = $_POST["tit"];
    $annou = $_POST["annou"];

    date_default_timezone_set('Asia/Colombo');
    $newsadddate = date('y-m-d h.i.s');

	//nesw or offer pic upload
	$file = $_FILES["postimage"]["tmp_name"];
	$picturename = $newsadddate;
	$path1 = "images/postimages/".$picturename.".jpg";
	$r = move_uploaded_file($file, $path1);

    $arr=array($newsid,$posttype,$expiredate,$tit,$annou,$path1,$newsadddate);

    if($obj->save("news_offer",$arr)){
        echo "<script type='text/javascript'>               
        swal({ title: 'SUCCESS',text: 'The post has been published!',icon: 'success'}).then(okay => {
        if (okay) {
        window.location.href = 'News & Feedback.php';}
        });
        </script>";
    }
    else{
        echo "<script type='text/javascript'>               
		swal({ title: 'ERROR',text: 'The post published was failed!',icon: 'error'}).then(okay => {
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
        $feedadddate = date('y-m-d h.i.s');
        
        $arr=array($feedid,$feedname,$feddemailid,$feeddescription,$feedadddate);
    
        if($obj->save("customer_feedback",$arr)){
            echo "<script type='text/javascript'>              
            swal({ title: 'SUCCESS',text: 'Your feedback has been recorded!',icon: 'success',timer: 000}).then(okay => {
            if (okay) {
            window.location.href = 'UserHomePage.php';}
            });
            </script>";
        }
        else{
            echo "<script type='text/javascript'>               
            swal({ title: 'ERROR',text: 'Your feedback record was failed!',icon: 'error',timer: 4000}).then(okay => {
            if (okay) {
            window.location.href = 'UserHomePage.php';}
            });
            </script>";
            }
    }
    //Feedback adding function end

?>
