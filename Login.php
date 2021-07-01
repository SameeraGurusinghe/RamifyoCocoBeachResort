<!DOCTYPE html>
<html>
<head>
	<title>Login or Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">


<!--Script for form validation start-->
<script>
function validateForm() {
  var f = document.forms["myForm"]["fullname"].value;
  var n = document.forms["myForm"]["nic"].value;
  var p = document.forms["myForm"]["phoneno"].value;
  var e = document.forms["myForm"]["email"].value;
  var p1 = document.forms["myForm"]["password_1"].value;
  var p2 = document.forms["myForm"]["password_2"].value;
  if (f == "") {
    alert("Full name must be filled out");
    return false;
  }
  else if (n == "") {
    alert("Government-issued ID Number must be filled out");
    return false;
  }
  else if (e == "") {
    alert("Email must be filled out");
    return false;
  }
  else if (p == "") {
    alert("Phone Number must be filled out");
    return false;
  }
  
}
</script>
<!--Script for form validation end-->



<!--Style for form password validation box start-->
<style>
	select { background: white !important; }
	
	.form-control{ background: white !important;}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background:#1e2228;
  color: #000;
  position: relative;
  padding: 5px;
  margin-top: 5px;
}

#message p {
  /*padding: 1px 1px;*/
  font-size: 14px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: #00FF7F;
}

.valid:before {
  position: relative;
  left: -5px;
  content: "\2714";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -5px;
  content: "\2613";
}
</style>
<!--Style for form password validation box end-->



<!--Style & Script for form email validation box start-->
<style>
#frmCheckemail {border-top:#F0F0F0 1px solid;background:#FAF8F8;padding:10px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();	
	jQuery.ajax({
	url: "includes/useravailability.php",
	data: {email: $("#email").val()},
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
<!--Style & Script for form email validation box end-->

</head>



<body>

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->

<div class="log">
	<div class="form-box">
		<div class="button-box">
			<div id="btn"></div>
			<button type="button" class="toggle-btn" onclick="login()">Log In</button>
			<button type="button" class="toggle-btn" onclick="register()">Register</button>
		</div>

	<form action="action_pages/LogRegAction.php" method="POST" id="login" class="input-group">
		<input type="text" class="input-field" name="email" placeholder="Email" required>
		<input type="password" class="input-field" name="password" placeholder="Password" required><br><br>
		<button type="submit" class="submit-btn" name="login_user">Log In</button><br>
		<p class="forgot-pass"><a href="ForgotPassword.php">Forgot Password?</a></p>
	</form>

	<form action="action_pages/LogRegAction.php" method="POST" id="register" class="input-group" name="myForm" onsubmit="return validateForm()">
		<input type="text" class="input-field" name="fullname" placeholder="Full Name">
		<input type="text" class="input-field" name="nic" placeholder="Government-issued ID Number">
    <input type="number" class="input-field" name="phoneno" placeholder="Phone Number">
		<input type="email" class="input-field" id="email" name="email" placeholder="Email" onBlur="checkAvailability()">
		<input type="password" class="input-field" id="password_1" name="password_1" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		<input type="password" class="input-field" id="password_2" name="password_2" placeholder="Conform Password">
		<input type="checkbox" required>&nbsp;&nbsp;&nbsp;<lable style="font-size: 12px;">I agree to terms & conditions</lable>
		<button type="submit" class="submit-btn" name="reg_user">Register</button><br>
		
		<!--Display user availability message start-->
		<div id="frmCheckemail">
			<p style="text-align: center;"><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none;"/></p>
		<span id="user-availability-status"></span>
		</div>
		<!--Display user availability message end-->

		<!--Password validation message start-->
		<div id="message" style="text-align: center;">
  			<font size="2px" color="yellow">Password must contain the following:</font>
 			<table>
  			<tr><td><p id="letter" class="invalid" align="left">A lowercase letter</p></td></tr>
  			<tr><td><p id="capital" class="invalid" align="left">A capital (uppercase) letter</p></td></tr>
  			<tr><td><p id="number" class="invalid" align="left">A number</p></td></tr>
  			<tr><td><p id="length" class="invalid" align="left">Minimum 8 characters</p></td></tr>
  			</table>
		</div>
		<!--Password validation message end-->


<!--Script for password validation start-->
<script>
var myInput = document.getElementById("password_1");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
  

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<!--Script for password validation end-->
	

	</form>
	</div>

</div>


<!--Script for form box handle start-->
<script>
	var x = document.getElementById("login");
	var y = document.getElementById("register");
	var z = document.getElementById("btn");

	function register(){
		x.style.left = "-470px";
		y.style.left = "100px";
		z.style.left = "160px";
	}
	function login(){
		x.style.left = "100px";
		y.style.left = "500px";
		z.style.left = "0";
	}
</script>
<!--Script for form box handle end-->


<!--footer start-->
<?php
include_once("includes/footer.php");
?>
<!--footer end-->
</body>
</html>