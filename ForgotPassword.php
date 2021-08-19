<?php

include('includes/dbconnection.php');
/*session_start();

if(isset($_POST['login']))
{
$email=$_POST['email'];
$username=$_POST['username'];

$Result = $db->prepare("SELECT username,email,password FROM registration WHERE (email=? && username=?) ");
				$Result->bind_param('ss',$email,$username);
				$Result->execute();
				$Result -> bind_result($username,$email,$password);
				$rs=$Result->fetch();
				if($rs)
				{
				$pwd=$password;				
				}

				else
				{
				echo "<script>alert('Invalid Email/Contact no or password');</script>";
				}
			}*/
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>User Forgot Password</title>

	<link rel="stylesheet" href="css/libraries/font-awesome.min.css">
	<link rel="stylesheet" href="css/libraries/bootstrap.min.css">
	<link rel="stylesheet" href="css/libraries/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/libraries/bootstrap-social.css">
	<link rel="stylesheet" href="css/libraries/bootstrap-select.css">
	<link rel="stylesheet" href="css/libraries/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/ForgotStyle.css">
    
    
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="login-page bk-img" style="background-image: url(images/login.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
							<?php if(isset($_POST['login']))
{ ?>
					<p>Your Password is <?php echo $pwd;?><br> Change the Password After login</p>
					<?php }  ?>
                    
                    
              <form action="mailtest/index.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
							</div>
						</div>
						<div class="text-center text-light">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<?php
/*if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($dbconnection, $_POST['email']);
	$sql = "SELECT * FROM `users` WHERE email = '$username'";
	$res = mysqli_query($dbconnectio, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}
*/



