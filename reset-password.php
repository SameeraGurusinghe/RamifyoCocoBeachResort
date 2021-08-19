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
	<title>Create New Password</title>
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
						<h1 class="text-center text-bold text-light mt-4x">Create New Password</h1>

						<div class="well row pt-2x pb-2x bg-light">
							<div class="col-md-12 text-center">

                            <?php
                                include('includes/dbconnection.php');
                                if($_GET['key'] && $_GET['token']){

                                $email = $_GET['key'];
                                $token = $_GET['token'];
                                $query = mysqli_query($db,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';");
                                $curDate = date("Y-m-d H:i:s");

                                if (mysqli_num_rows($query) > 0) {
                                $row= mysqli_fetch_array($query);

                                if($row['exp_date'] >= $curDate){
                                ?>

                                <form action="update-forget-password.php" method="post">
                                    <input type="hidden" name="email" value="<?php echo $email;?>">
                                    <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">

                                    <div class="form-group text-center">
                                        <h6 class="text-center text-bold text-dark">Password</h6>
                                        <input type="password" name='password' class="form-control">
                                    </div>

                                    <div class="form-group text-center">
                                        <h6 class="text-center text-bold text-dark">Confirm Password</h6>
                                        <input type="password" name='cpassword' class="form-control">
                                    </div>

                                    <br><input type="submit" name="new-password" class="btn btn-primary">
                                </form>

                                <?php } }

                                else{}

                                }
                                ?>

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

