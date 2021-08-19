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
	<title>Password Reset Link Sent</title>
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
					<h1 class="text-center text-bold text-success mt-5x"></h1>
					
                    <div class="well row pt-1x pb-3x bk-light">
						<div class="col-md-12 col-md-offset-2">
                            <div class="form-group text-center">
                                <h1 class="text-center text-bold text-success mt-3x">SUCCESS <i class="fa fa-check-circle"></i></h1>
                                <h5 class="text-center text-dark mt-1x">The password reset link has been send to the email that you have provided.</h5>
								<br><h6 class="text-center text-danger mt-1x">Note that, Password reset link expired after 24 hours.</h6>
                                <br><h6 class="text-center text-dark mt-1x"><i class="fa fa-spinner"></i>&nbsp;  Close this window and check your mailbox</h6>
                            </div>
			            </div>
			        </div>		
		        </div>
                <div class="col-md-3"></div>
		    </div>
		</div>
	</div>
</div>

</body>
</html>



