<html>
	<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body></body>
</html>

<?php 
	session_start(); // starting the session, necessary for using session variables

	//DATABASE CONNECTION
  	include_once("../includes/dbconnection.php");
	
	// users code
	if (isset($_POST['reg_user'])) {

		// receiving the values entered and storing in the variables
		//data sanitization is done to prevent SQL injections
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
		$nic = mysqli_real_escape_string($db, $_POST['nic']);
		$phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// if the form is error free, then register the user
		if ($password_1 == $password_2) {
			$password = md5($password_1);//password encryption to increase data security

			date_default_timezone_set('Asia/Colombo');
			$date = date('y-m-d h.i.s');
			$Result = mysqli_query($db,"INSERT INTO users (fullname,nic,phoneno,email,password,regdate) 
					  VALUES('$fullname', '$nic', '$phoneno','$email', '$password', '$date')"); //inserting data into table

				echo "<script type='text/javascript'>			
				swal({ title: 'SUCCESS',text: 'Registration completed!',icon: 'success'}).then(okay => {
				if (okay) {
				window.location.href = '../Login.php';}
				});
				</script>";
				/*echo "Data added successfully.";
				echo ("<br>");*/
				}
			
			else{
				echo "<script type='text/javascript'>			
				swal({ title: 'Opps!',text: 'Passwords did not matched !',icon: 'error'}).then(okay => {
				if (okay) {
				window.location.href = '../Login.php';}
				});
				</script>";
				/*echo "Data added Faild.";
				echo ("<br>");*/
			}

	}

	// user login
	if (isset($_POST['login_user'])) {
		//data sanitization to prevent SQL injection
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

			$password = md5($password);
			$Result = mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password'");

			while($row = mysqli_fetch_array($Result)){
			$c = true;
			$utype = $row["usertype"];
			$_SESSION["email"] = $email;
			}
			
			//page on which the user is sent to after logging in start
			if($c){
				if ($utype=='1') {
            	header('location: ../admindashbord.php');
        		}
        		elseif ($utype=='2') {
            	header('location: ../employeedashbord.php');
        		}
        		elseif ($utype=='0'){
				header('location: ../UserHomePage.php');}
			}
			//page on which the user is sent to after logging in end
			
			else {
				echo "<script type='text/javascript'>			
				swal({ title: 'Opps!',text: 'Passwords did not matched !',icon: 'error'}).then(okay => {
				if (okay) {
				window.location.href = '../Login.php';}
				});
				</script>";
				/*echo "Data added Faild.";
				echo ("<br>");*/
			}
	}

?>