<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">

		.col{
			background-color: #333538;
			color: #b2beb5;
			position: relative;
			bottom: auto;
			text-align: center;
		}

		.col .fa{
			border-radius: 30%;
		}

		.fa {
			padding: 5px;
			font-size: 30px;
			width: 40px;
			text-align: center;
			text-decoration: none;
			margin: 5px 2px;
			}

		.fa-facebook {
  			background: #3B5998;
  			color: white;
			}

		.fa-twitter {
  			background: #55ACEE;
  			color: white;
			}

		.fa-youtube {
  			background: #bb0000;
  			color: white;
			}

	</style>

</head>
<body>


<?php

echo "<div class='col'>";
	echo "<img src='images/theme.png' class='hometheme'>";
      echo "<br><a href='https://www.facebook.com/Sea-Beach-Resort-Negombo-106715187809659/' class='fa fa-facebook'></a>";
      echo "<a href='#' class='fa fa-twitter'></a>";
      echo "<a href='#' class='fa fa-youtube'></a><br>";
	  echo "<a href='termsandcondition.php' target='_blank' style='text-decoration:none;'>Terms & Conditions</a><br>";
      echo "<p id='copyright'>&copy; <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script> Ramifyo Coco Beach Resort Private Limited. All Rights Reserved.</p></br>";
echo "</div>";

?>

</body>
</html>