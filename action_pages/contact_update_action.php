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
</head>
<body>

</body>
</html>

<?php
include_once("../includes/dbconnection.php");

if (isset($_POST['contact_update'])) {

    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $website = $_POST["website"];

	$Result = mysqli_query($db,"UPDATE contact_us SET telephone='$phoneno',email='$email',address='$address',website='$website' WHERE contact_id='c1' " );
    
    if($Result){

	    echo "<script type='text/javascript'>
		swal({ title: 'Ramifyo conatct information have been updated!',text: '',icon: 'success'}).then(okay => {
		if (okay) {
    	    window.location.href = '../contactupdate.php';}
		});
        </script>";
		}
									
	else{
		echo "<script type='text/javascript'>
		swal({ title: 'Contact information update was failed!',text: '',icon: 'error'}).then(okay => {
		if (okay) {
    	window.location.href = '../contactupdate.php';}
		});
    	</script>";
		}
}
									
?>