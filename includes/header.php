<?php
date_default_timezone_set('Asia/Colombo');
include_once("includes/dbconnection.php");
?>


<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">


<!--**********script for chat box strat***********-->
  <script type="text/javascript">
		function openWin(){
      window.open("livechat/employee/chatindex.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=300,left=500,width=500,height=500");
      }
  </script>
<!--***********script for chat box end***********-->

<div class="menu-bar">

<!--== Ramifyo title & time display start ==-->
<div>
	<a id="ramifyotitle" href="Home.php">Ramifyo Coco Beach Resort</a><br>
	<a id="timehandle"><?php echo "". date("l ") . date("| Y.m.d |");?><?php include_once("clock.php");?></a>
</div>
<!--== Ramifyo title & time display end ==-->


<!--== Ramifyo header button design start ==-->
<ul>
	<li><a href="Home.php"><i class="fas fa-home">&nbsp;&nbsp;Home</i></a></li>
	<li><a href="#"><i class="fas fa-info">&nbsp;&nbsp;About Us</i></a>
	<div class="sub-menu-1">
		<ul>
			<li><a id="myBtn">Our Story</a></li>
			<li><a href="Home.php#about-area">Who We Are</a></li>
			<li><a href="Home.php#why-choose-us">Why Choose Us</a></li>
			<li><a href="Home.php#service-area">Related Services</a></li>
		</ul>	
	</div>
	</li>

	<li><a href="#"><i class="fas fa-clone">&nbsp;&nbsp;Services</i></a>
	<div class="sub-menu-1">
		<ul>
				<li class="hover-me"><a href="foodmenu.php">Meals</a><i class="fas fa-angle-right"></i>
				<div class="sub-menu-2">
				<ul>
						<li><a href="foodmenu.php#tabs-1">Breakfast</a></li>
						<li><a href="foodmenu.php#tabs-2">Lunch</a></li>
						<li><a href="foodmenu.php#tabs-3">Dinner</a></li>
						<li><a href="foodmenu.php#tabs-4">Dessert</a></li>
						<li><a href="foodmenu.php#tabs-5">Drink</a></li>
				</ul>
				</div>
				</li>

				<li class="hover-me"><a href="#">Rooms</a><i class="fas fa-angle-right"></i>
				<div class="sub-menu-2">
				<ul>
						<li><a href="#">AC</a></li>
						<li><a href="#">Non-AC</a></li>
				</ul>
				</div>
				</li>

		</ul>	
	</div>
	</li>

	<li><a href="booking.php"><i class="fas fa-tags">&nbsp;&nbsp;Booking</i></a></li>
	<li><a href="contactUs.php"><i class="fas fa-phone-alt">&nbsp;&nbsp;Contact</i></a></li>
	<li><a href="news.php"><i class="fas fa-newspaper-o">&nbsp;&nbsp;News</i></a></li>

	<!--== When customer logged in, new "Feedback" button display and "LOG IN" button automatically change to "LOG OUT" button start ==-->
	<?php if (isset($_SESSION['email'])) {

	$useremail = $_SESSION['email'];
	$Result = mysqli_query($db,"SELECT * FROM users WHERE email='$useremail' ");
	while($row = mysqli_fetch_array($Result)){
	$utype = $row["usertype"];
	$prophoto = $row["propicture"];
	$id = $row['nic'];
	$proimg = $row["propicture"];
	}

	//Display Feedback button if usertype is 0
	if ($utype == '0') {
	echo "<li><a href='feedback.php'><i class='fas fa-comments'>&nbsp;&nbsp;Feedback</i></a></li>";
	}

	echo "<li><a onclick='openWin()'><i class='fas fa-question-circle'>&nbsp;&nbsp;Chat</i></a></li>";

	echo "<li><a href='UserHomePage.php'><i class='fas fa-user'>&nbsp;&nbsp;My Info</i></a>";
	echo "<div class='sub-menu-1'>";
	echo "<ul>";
	echo "<span style='color: yellow;'>";
	echo "Hi ".$_SESSION['email'];
	echo "</span>";
	echo "<img class='user-image' src='action_pages/$proimg' alt='No profile picture'>";
	echo "<li><a href='profile.php'><i class='fas fa-pencil-square-o'>&nbsp;&nbsp;Edit Profile</i></a></li>";

	
	/****** Display button for access to the dashboard if usertype is 1 or 2 start ******/
		if ($utype == '1') {
		echo "<li><a href='admindashbord.php'><i class='fas fa-cogs'>&nbsp;&nbsp;Dashboard</i></a></li>";
		}
		elseif($utype == '2'){
		echo "<li><a href='employeedashbord.php'><i class='fas fa-cogs'>&nbsp;&nbsp;Dashboard</i></a></li>";
		}
		elseif($utype == '0'){
		echo "<li><a href='UserHomePage.php'><i class='fas fa-cogs'>&nbsp;&nbsp;My Account</i></a></li>";
		}
	/****** Display button for access to the dashboard if usertype is 1 or 2 end ******/
	
	echo "<li><a href='action_pages/Logout.php'><i class='fas fa-sign-out-alt'>&nbsp;&nbsp;Log Out</i></a></li>";
	echo "<ul>";
	echo "</div>";
	echo "</li>";
  }

	else {
	echo "<li><a href='Login.php'><i class='fas fa-sign-in-alt'>&nbsp;&nbsp;Log In</i></a></li>
	</ul>";
	}
	?>
	<!--== When customer logged in, new "Feedback" button display and "LOG IN" button automatically change to "LOG OUT" button end ==-->

<!--== Ramifyo header button design end ==-->
</div>

<!-- The cocoModal -->
<div id="RamifyoModalBox" class="cocomodal">

<!--header include start-->
<?php
include_once("includes/ourstorybox.php");
?>
<!--header include end-->

<script>
// Get the cocomodal
var cocomodal = document.getElementById("RamifyoModalBox");

// Get the button that opens the cocomodal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the cocomodal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the cocomodal 
btn.onclick = function() {
  cocomodal.style.display = "block";
}

// When the user clicks on <span> (x), close the cocomodal
span.onclick = function() {
  cocomodal.style.display = "none";
}

// When the user clicks anywhere outside of the cocomodal, close it
window.onclick = function(event) {
  if (event.target == cocomodal) {
    cocomodal.style.display = "none";
  }
}
</script>