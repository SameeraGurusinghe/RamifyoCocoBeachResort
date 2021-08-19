<?php
include('includes/dbconnection.php');
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
	<meta name="description" content="">
	<meta name="author" content="">
	<title>User Forgot Password</title>
	<link rel="stylesheet" href="css/ForgotStyle.css">
	<link rel="stylesheet" href="styles.css" >
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
	
<div class="login-page bk-img" style="background-image: url(images/login.jpg);">
	<div class="form-content">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
					<div class="col-md-6">
						<h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1>

						<div class="well row pt-2x pb-2x bg-light">
							<div class="col-md-12">

								<form action="mailtest/index.php" method="post">
									<div class="form-group text-center">
										<h6 class="text-center text-bold text-dark">Enter your email below to reset your password</h6>
										<input type="email" name="email" class="form-control" id="email">
										<small>We'll never share your email with anyone else.</small><br><br>
										<input type="submit" name="password-reset-token" class="btn btn-primary" value="Reset Password">
									</div>
									<br><a href="Login.php" style="text-decoration:none;">Sign Up</a>
									<a href="Login.php" style="float:right;text-decoration:none;">Back to Login</a>
								</form>
							</div>
						</div>					
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>



