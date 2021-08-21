<!--Session-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}

//Database Connection include end
include_once("includes/dbconnection.php");

//retrive customer's info
$email = $_SESSION['email'];
$Result = mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
while($row=mysqli_fetch_array($Result)){
$_SESSION['fullname'] = $row["fullname"];
}
?>

<!DOCTYPE html>
<html language="en">
    <head>
        <title>Feedback & Inquire</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
		<link href="css/style.css" type="text/css" rel="stylesheet">
    </head>

<body>

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->

<div class="container-fluid">
    <h1>feedback & inquire</h1>

    <div class="row">
        <div class="col-sm-5 text-center bg-dark">
            <h3 class="text-light">Notice</h3>
            <div class="feedback-info-us">
                <h5>Your feedback is important because it serves as a guiding resource for the growth of our Ramifyo Coco Beach Resort Hotel. We want to know what we’re getting right — and wrong — as a business in the eyes of our customers? Within the good and the bad, we can find gems that make it easier to adjust and adapt the our customer experience over time.</h5>

                <h5>In short, feedback is the way to keep our community at the heart of everything we do.</h5>
                <h5>Thank You !</h5>
            </div><br>
            
        </div>

        <div class="col-sm-7 text-center bg-dark">
            <h3 class="text-light">Leave You Feedback or Inquire Here</h3>

            <form action="controller.php" method="POST">

            <div class="feedback-send-us">
                <label class="lable-deco">Your Name</label><br>
                <input type="text" class="form-control" name="feedname" placeholder="Enter Your Name" value="<?php echo $_SESSION['fullname']; ?>" required>
            </div><br>

            <div class="feedback-send-us">
                <label class="lable-deco">Your E-mail</label><br>
                <input type="email" class="form-control" name="feddemailid" placeholder="Enter Your E-mail" value="<?php echo $email; ?>" required>
            </div><br>

            <div class="feedback-send-us">
                <label class="lable-deco">Your Feedback or Inquire</label><br>
                <textarea class="form-control" name="feeddescription" placeholder="Enter Your Feedback or Inquire" required></textarea>
            </div><br>

            <div class="feedback-send-us">
                <button type="reset" class="btn btn-warning btn-sm" style="width:70px;">CLEAR</button>
                <button type="submit" class="btn btn-success btn-sm" style="width:70px;" name="sendfeedback">SUBMIT</button>
            </div>

            </form><br>
            
        </div>
    </div><br>

</div>


<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->

</body>
</html>