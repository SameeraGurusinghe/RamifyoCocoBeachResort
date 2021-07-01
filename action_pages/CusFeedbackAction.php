<!DOCTYPE html>
<html>
<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title></title>
</head>
<body>

</body>
</html>

<?php


//Database Connection include start
include_once("../includes/dbconnection.php");
//Database Connection include end

$fname = $_POST["fname"];
$emailid = $_POST["emailid"];
$descri = $_POST["description"];

if($db){
	/*echo "Database connection successfully completed.";
	echo ("<br>"); */
	}

else{
	/*echo "Database connection Faild.";
	echo ("<br>");*/
}

date_default_timezone_set('Asia/Colombo');
$date = date('y-m-d h.i.s AM');
$Result = mysqli_query($db,"INSERT INTO customer_feedback (cusname,emailid,description,date_time) VALUES('$fname','$emailid','$descri','$date')");

if($Result){
	echo "<script type='text/javascript'>
                
	swal({ title: 'Submitted !',text: '',icon: 'success'}).then(okay => {
	if (okay) {
    window.location.href = '../UserHomePage.php';}
	});
    </script>";
	/*echo "Data added successfully.";
	echo ("<br>"); */
	}

else{
	echo "<script type='text/javascript'>
                
	swal({ title: 'An error occured!',text: '',icon: 'error'}).then(okay => {
	if (okay) {
    window.location.href = '../UserHomePage.php';}
	});
    </script>";
	/*echo "Data added Faild.";
	echo ("<br>");*/
}

?>