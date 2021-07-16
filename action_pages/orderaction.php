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

$fid = $_POST["fid"];
$fname = $_POST["fname"];
$fprice = $_POST["fprice"];
$mcount = $_POST["mealcount"];
$emailid = $_POST["emailid"];
//$descri = $_POST["description"];

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
$Result = mysqli_query($db,"INSERT INTO foodorders (customerid,foodname,foodid,amount,price,date) VALUES('$emailid','$fname','$fid','$mcount','$fprice','$date')");

if($Result){
	echo "<script type='text/javascript'>
      
	swal({ title: 'Success !',text: 'You order will be confirm soon',icon: 'success'}).then(okay => {
	if (okay) {
    window.location.href = '../foodmenu.php';}
	});
    </script>";
	/*echo "Data added successfully.";
	echo ("<br>"); */
	}

else{
	echo "<script type='text/javascript'>
                
	swal({ title: 'An error occured!',text: 'Try again',icon: 'error'}).then(okay => {
	if (okay) {
    window.location.href = '../foodmenu.php';}
	});
    </script>";
	/*echo "Data added Faild.";
	echo ("<br>");*/
}

?>