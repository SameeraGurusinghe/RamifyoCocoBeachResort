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



									
                    $a=$_POST["fname"];
                    $b=$_POST["lname"];
                    $c=$_POST["email"];
                    $d=$_POST["profile"];
                    $e=$_POST["street"];
                    $f=$_POST["city"];
                    $g=$_POST["state"];
                    $h=$_POST["tp"];
                    $i=$_POST["password"];
					$j=$_POST["conform_password"];
					$nic1=$_POST["nic"];
					

				  $Result = mysqli_query($db,"UPDATE users  SET fname='$a',lname='$b',email='$c',streete='$e',city='$f',state='$g',phoneno='$h',password='$i'where fullname='Admin' " );
                  if($Result){

										echo "<script type='text/javascript'>
                
										swal({ title: 'profile details has been updated!',text: '',icon: 'success',timer: 3000}).then(okay => {
										if (okay) {
    									window.location.href = 'officer.php';}
										});
    									</script>";
									}
									
									else{
										echo "<script type='text/javascript'>
                
										swal({ title: 'profile details update was failed!',text: '',icon: 'error',timer: 3000}).then(okay => {
										if (okay) {
    									window.location.href = 'officer.php';}
										});
    									</script>";
										}
									
									?>