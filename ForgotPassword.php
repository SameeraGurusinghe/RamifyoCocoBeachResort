<?php
session_start();
include('includes/dbconnection.php');
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
			}
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
								<form class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Your Email</label>
									<input type="email" placeholder="Email" name="email" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Your user name</label>
									<input type="text" placeholder="User Name" name="username" class="form-control mb">
									

									<input type="submit" name="login" class="btn btn-primary btn-block" value="login" >
								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="Login.php" class="text-light">Sign in?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>