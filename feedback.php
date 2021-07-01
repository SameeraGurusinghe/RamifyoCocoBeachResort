<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
?>
<!--Session end-->


<!DOCTYPE html>
<html language="en">
    <head>
        <title>Feedback & Inquire</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
    </head>

<!--Database Connection include start-->	
<?php
include_once("includes/dbconnection.php");
?>
<!--Database Connection include end-->


<body>

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->

<div class="container-fluid">
    <h1>feedback & inquire</h1>

    <div class="row">
        <div class="col-sm-5 text-center">
            <h3>Notice</h3>
            <div class="feedback-info-us">
                <h5>Your feedback is important because it serves as a guiding resource for the growth of our Ramifyo Coco Beach Resort Hotel. We want to know what we’re getting right — and wrong — as a business in the eyes of our customers? Within the good and the bad, we can find gems that make it easier to adjust and adapt the our customer experience over time.</h5>

                <h5>In short, feedback is the way to keep our community at the heart of everything we do.</h5>
                <h5>Thank You !</h5>
            </div><br>
            
        </div>

        <div class="col-sm-7 text-center">
            <h3>Leave You feedback or Inquire Here</h3>

            <form action="action_pages/CusFeedbackAction.php" method="post" class="form-out-border">

            <div class="feedback-send-us">
                <label class="lable-deco">Your Name</label><br><input type="text" class="form-control" name="fname" placeholder="Enter Your Name" required>
            </div><br>

            <div class="feedback-send-us">
                <label class="lable-deco">Your E-mail</label><br><input type="email" class="form-control" name="emailid" placeholder="Enter Your E-mail" value="<?php echo $_SESSION['email']; ?>" required>
            </div><br>

            <div class="feedback-send-us">
                <label class="lable-deco">Your Feedback or Inquire</label><br><textarea class="form-control" name="description" placeholder="Enter Your Feedback or Inquire" required></textarea>
            </div><br>

            <div class="feedback-send-us">
                <button type="reset" class="feedback-clear">Clear</button>
                <button type="submit" class="feedback-submit" name="sendfeedback">Submit</button>
            </div>

            </form><br>
            
        </div>
    </div>

</div>



<!--footer include start-->
<?php
include_once("includes/footer.php");
?>
<!--footer include end-->


</body>
</html>