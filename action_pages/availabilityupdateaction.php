<!DOCTYPE html>
<html>
<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title></title>
</head>
</html>

<?php
include_once("../includes/dbconnection.php");

if(isset($_POST['foodstatus'])) {
    $fid = $_POST['fid'];
    $foodstatus = $_POST['foodstatus'];

echo $foodstatus;
/*if($db){
	echo "Database connection successfully completed.";
	echo ("<br>"); 
	}

else{
	echo "Database connection Faild.";
	echo ("<br>");
}*/


$Result = mysqli_query($db,"UPDATE foods SET foodstatus='$foodstatus' WHERE foodid='$fid'");
if($Result){
	echo "<script type='text/javascript'>
      
	swal({ title: 'Success !',text: 'Availability status has been changed.',icon: 'success'}).then(okay => {
	if (okay) {
    window.location.href = '../foodgallery.php';}
	});
    </script>";

	}

else{
	echo "<script type='text/javascript'>
                
	swal({ title: 'An error occured!',text: 'Try again',icon: 'error'}).then(okay => {
	if (okay) {
    window.location.href = '../foodgallery.php';}
	});
    </script>";

}
}

?>