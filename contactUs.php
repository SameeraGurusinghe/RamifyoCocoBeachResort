<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->

<!DOCTYPE html>
<html language="en">
    <head>
        <title>CONTACT US</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
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
    <h1>contact us</h1>

<div class="row">

<div class="col-sm-6 text-center">
    <h3>Find Us On Google Map</h3>
    <div class="social text-center">
        <i class="fa fa-map-marker"></i>
        <i class="fa fa-location-arrow"></i>

    </div><br>

    <div class="social">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494.7412181080462!2d79.84208433397164!3d7.248836633433262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e947bbf12da5%3A0x6fff3dc667ec95e5!2sSEA%20BEACH%20RESORT!5e0!3m2!1sen!2slk!4v1622913836549!5m2!1sen!2slk" width="640" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>


<!--***PHP code for retrive data from database - Contact us details*** START-->
<?php

$Result = mysqli_query($db,"SELECT * FROM contact_us");
while($row=mysqli_fetch_array($Result)){
$phone = $row["telephone"];
$emailid = $row["email"];
$address = $row["address"];
$website = $row["website"];
}

?>
<!--***PHP code for retrive data from database - Contact us details*** END-->

<div class="col-sm-6 text-center">
    <h3>Direct Contact</h3>
    <div class="social text-center">
        <i class="fa fa-calendar-check-o"></i>
        <i class="fa fa-phone"></i>
        <i class="fa fa-envelope"></i>
        <i class="fa fa-globe"></i>
        <i class="fa fa-address-card"></i>
       
    </div><br>
    <div class="social">
    <h5>Operating Hours</h5>
    <h6>MON - SAT - 8AM TO 6PM</h6>
    <h6>SUN - 8AM TO 2PM</h6>
    <h6>PUBLIC HOLIDAYS - 9AM TO 2PM</h6><br>

    <h5>Contact Details</h5>
    <h6>TELEPHONE: <a href="tel: <?php echo "$phone"; ?>"><?php echo "$phone"; ?></a></h6>
    <h6>EMAIL: <a href="mailto: <?php echo "$emailid"; ?>"><?php echo "$emailid"; ?></a></h6>
    <h6>WEBSITE: <a href="<?php echo "$website"; ?>"><?php echo "$website"; ?></a></h6>
    <h6>ADDRESS: <a href="https://goo.gl/maps/fA7EjF9uKgm27NCu9"><?php echo "$address"; ?><a></h6>

    <a href="https://www.facebook.com/Sea-Beach-Resort-Negombo-106715187809659/"><i class="fa fa-facebook-square"></i></a>
    <a href="#"><i class="fa fa-youtube-square"></i></a>
    <a href="#"><i class="fa fa-twitter-square"></i></a>
    </div>
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