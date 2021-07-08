<?php

	include("dbconnection.php");
	mysqli_select_db($db,"ramifyohotel");
	
	if(isset($_POST['email'])){
			$email = $_POST['email'];
			$sql2 = "SELECT * FROM users WHERE email ='".$email ."'";
			$result2=mysqli_query($db,$sql2);
	
			if(mysqli_num_rows($result2)==0){
				
			echo "<span class='status-available'><h5><font color='green'><center>This email is available for your registration perpose.</center></font></h5></span>";
				
  }else{
			echo "<span class='status-not-available'><h5><font color='red'>This email is already existing our system. Select another email.</font></h5></span>";	
				
		}
	}
	
	?>