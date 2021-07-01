<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->


<!DOCTYPE html>
<html>
<head>
	<title>Offers & News</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
	include_once("includes/dbconnection.php");
?>

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
	$Result = mysqli_query($db,"SELECT * FROM news_offer WHERE type='offer' order by news_id DESC LIMIT 3;");
	while($row=mysqli_fetch_array($Result)){
	//$p = $row["news_id"];
	$title = $row["title"];
	$desc = $row["description"];
	$datetime = $row["datetime"];

			echo "<div class='news'>";
				echo "<h6><mark>$datetime</mark></h6>";
				echo "<h4><b>$title</b></h4>";
				echo "<h5>$desc</h5>";

				echo "<div class='offer-img'>";
				echo "<img src='images/story/4.jpg'>&nbsp;&nbsp;";
				echo "<img src='images/story/3.jpg'>";
			echo "</div>";
				
			echo "</div>";
			echo "<br>";
		}
		?>
			
		</div>

		<div class="col-sm-6 text-center">
			<h3>News</h3>

<!--Offer from database start-->
<?php
	$Result = mysqli_query($db,"SELECT * FROM news_offer WHERE type='news' order by news_id DESC LIMIT 3;");
	while($row=mysqli_fetch_array($Result)){
	//$p = $row["news_id"];
	$title = $row["title"];
	$desc = $row["description"];
	$datetime = $row["datetime"];

			echo "<div class='news'>";
				echo "<h6><mark>$datetime</mark></h6>";
				echo "<h4><b>$title</b></h4>";
				echo "<h5>$desc</h5>";

				echo "<div class='offer-img'>";
				echo "<img src='images/story/4.jpg'>&nbsp;&nbsp;";
				echo "<img src='images/story/3.jpg'>";
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
