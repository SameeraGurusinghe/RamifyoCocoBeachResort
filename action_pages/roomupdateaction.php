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

if (isset($_POST['updateroom'])) {

    $rid = $_POST['rid'];
    $rnumber = $_POST["rnumber"];
    $rprice = $_POST["rprice"];
    $rdescription = $_POST["rdescription"];

	$Result = mysqli_query($db,"UPDATE room SET id='$rid',room_no='$rnumber',description='$rdescription',rate='$rprice' WHERE room_no='$rnumber'");
    
    if($Result){

	    echo "<script type='text/javascript'>
		swal({ title: 'Room details have been updated!',text: '',icon: 'success'}).then(okay => {
		if (okay) {
    	    window.location.href = '../roomgallery.php';}
		});
        </script>";
		}
									
	else{
		echo "<script type='text/javascript'>
		swal({ title: 'Room details update was failed!',text: '',icon: 'error'}).then(okay => {
		if (okay) {
    	window.location.href = '../roomgallery.php';}
		});
    	</script>";
		}
}
									
?>