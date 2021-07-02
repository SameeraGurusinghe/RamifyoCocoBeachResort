<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>
<!--Session end-->


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
	    if (isset($_SESSION['email'])) {
			$useremail = $_SESSION['email'];
		}

        $fullname = $_POST["fullname"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $nic = $_POST["nic"];
        $tp = $_POST["tp"];
		$password = $_POST["password"];


		//Profile pic upload
		$file = $_FILES["profilepic"]["tmp_name"];
		$profi = $nic;
		$path1 = "../images/profilepicture/".$profi.".png";
		$r = move_uploaded_file($file, $path1);
					
		$userpassword = md5($password);
		$Result = mysqli_query($db,"UPDATE users SET fullname='$fullname',nic='$nic',phoneno='$tp',password='$userpassword',streete='$street',city='$city',state='$state',propicture='$path1' WHERE email='$useremail' " );
            if($Result){

				echo "<script type='text/javascript'>
						swal({ title: 'profile details has been updated!',text: '',icon: 'success',timer: 3000}).then(okay => {
							if (okay) {
    							window.location.href = '../profile.php';}
							});
    						</script>";
						}
									
			else{
				echo "<script type='text/javascript'>
						swal({ title: 'profile details update was failed!',text: '',icon: 'error',timer: 3000}).then(okay => {
							if (okay) {
    						window.location.href = '../profile.php';}
							});
    						</script>";
							}
									
?>