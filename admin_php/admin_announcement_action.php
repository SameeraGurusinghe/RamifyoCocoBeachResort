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
	include_once("../includes/dbconnection.php");
    
$a=$_POST["tit"];
$b=$_POST["annou"];



if($db){
	/*echo "Database connection successfully completed.";
	echo ("<br>"); */
	}

else{
	echo "Database connection Faild.";
	echo ("<br>");
}

$date = date('Y-m-d');
$Result = mysqli_query($db,"INSERT INTO news (title,descriptions,dates) VALUES('$a','$b','$date')");

if($Result){
	echo "<script type='text/javascript'>
                
	swal({ title: 'News has been published!',text: '',icon: 'success'}).then(okay => {
	if (okay) {
    window.location.href = '../News & Feedback.php';}
	});
    </script>";
	/*echo "Data added successfully.";
	echo ("<br>"); */
	}

else{
	echo "<script type='text/javascript'>
                
	swal({ title: 'An error occured!',text: '',icon: 'error'}).then(okay => {
	if (okay) {
    window.location.href = '../News & Feedback.php';}
	});
    </script>";
	/*echo "Data added Faild.";
	echo ("<br>");*/
}

?>