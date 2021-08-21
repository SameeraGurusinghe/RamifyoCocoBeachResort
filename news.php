<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->

<!--database connection-->
<?php include_once("includes/dbconnection.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Offers & News</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->


<div class="container-fluid">

	<div class="row">
		<h1>offers & news</h1>

		<div class="col-sm-6 text-center">
			<h3>Offers</h3>

<!--Offer from database start-->
<?php
	$Result = mysqli_query($db,"SELECT * FROM news_offer WHERE posttype='offer' AND expiredate > now() order by expiredate;");
	while($row=mysqli_fetch_array($Result)){
	//$p = $row["news_id"];
	$title = $row["title"];
	$desc = $row["postdescription"];
	$expiredate = $row["expiredate"];
	$datetime = $row["datetime"];
	$imgs = $row["postimage"];

			echo "<div class='news'>";
				echo "<h6>Offer Posted date time:<mark>$datetime</mark></h6>";
				echo "<h4><b>$title</b></h4>";
				echo "<h5>$desc</h5>";
				echo "<h5 class='text-danger'>The offer will expire on : <b>$expiredate</b></h5>";

				echo "<div class='offer-img'>";
				echo "<img src='$imgs' alt='* image not available for this offer'>";
			echo "</div>";
				
			echo "</div>";
			echo "<br>";
		}
		?>
			
		</div>

		<div class="col-sm-6 text-center">
			<h3>News</h3>

<!--News from database start-->
<?php
	$Result = mysqli_query($db,"SELECT * FROM news_offer WHERE posttype='news' order by news_id DESC;");
	while($row=mysqli_fetch_array($Result)){
	//$p = $row["news_id"];
	$title = $row["title"];
	$desc = $row["postdescription"];
	$datetime = $row["datetime"];
	$imgs = $row["postimage"];

			echo "<div class='news'>";
				echo "<h6>News Posted date time:<mark>$datetime</mark></h6>";
				echo "<h4><b>$title</b></h4>";
				echo "<h5>$desc</h5>";

				echo "<div class='offer-img'>";
				echo "<img src='$imgs' alt='* image not available for this news'>";

			echo "</div>";
				
			echo "</div>";
			echo "<br>";
		}
		?>

		</div>
		
	</div>
	
</div>


<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->


</body>
</html>
