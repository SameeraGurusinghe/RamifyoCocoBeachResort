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

if (isset($_POST['updatefood'])) {

    $fid = $_POST['fid'];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $ftype = $_POST["ftype"];
    $mealplantype = $_POST["mealplantype"];
    $fdescription = $_POST["fdescription"];
    $fimage = $_POST["fimage"];

	$Result = mysqli_query($db,"UPDATE foods SET foodid='$fid',name='$name',price='$price',ftype='$ftype',mealplantype='$mealplantype',fdescription='$fdescription',fimage='$fimage' WHERE foodid='$fid' " );
    
    if($Result){

	    echo "<script type='text/javascript'>
		swal({ title: 'Food details have been updated!',text: '',icon: 'success'}).then(okay => {
		if (okay) {
    	    window.location.href = '../foodgallery.php';}
		});
        </script>";
		}
									
	else{
		echo "<script type='text/javascript'>
		swal({ title: 'Food details update was failed!',text: '',icon: 'error'}).then(okay => {
		if (okay) {
    	window.location.href = '../foodgallery.php';}
		});
    	</script>";
		}
}
									
?>