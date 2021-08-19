<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->

<!--database connection-->
<?php include_once("includes/dbconnection.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Rooms Gallery</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/hotel.png"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

<!--header start-->
<?php include_once("includes/header.php"); ?>
<!--header end-->

<div class="container-fluid">

<h1>Rooms</h1>

<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
    <span>Currently Ramifyo Coco Beach Resort has 30+ rooms. All the rooms have grate facilities. <a href="booking.php" class="btn btn-success">Reservation Now !</a></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Hide"></button>
</div>

<div class="alert alert-success alert-dismissible fade show" role="alert">
<marquee scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" style="font-weight:bold;">
Twin, double or single beds | En-suite bathrooms | Air conditioning or fan cooling system |  A telephone | 
Satellite Television | In-room safes | Tea and coffee making facilities | lounge area | Sleeping deck
</marquee>
</div>

<div class="row">

<div class="col-sm-2"></div>
<!-- Gallery start -->
<div class="row">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img src="images/rooms/gallery-Horizontal-1.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-success"/>

    <img src="images/rooms/gallery-Vertical-2.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-secondary"/>
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img src="images/rooms/gallery-Vertical-1.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-danger"/>

    <img src="images/rooms/gallery-Horizontal-2.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-info"/>
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img src="images/rooms/gallery-Horizontal-3.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-primary"/>

    <img src="images/rooms/gallery-Vertical-3.jpg" class="w-100 shadow-1-strong rounded mb-4 border border-2 border-warning"/>
  </div>
</div>
<!-- Gallery end -->

<div class="col-sm-2"></div>

<div class="alert alert-dark text-center">
    <a href="booking.php" class="btn btn-success text-center">Reservation a Room(s)</a>
</div>

<div class="row">

<div class="col-sm-2"></div>

<!-- Slideshow start -->
<div id="carouselExampleSlidesOnly" class="carousel slide col-sm-8" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/rooms/room1.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/rooms/room2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/rooms/room3.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/rooms/room4.jpg" class="d-block w-100">
    </div>
  </div>
</div>
<!-- Slideshow end -->

<div class="col-sm-2"></div>
</div><br>

</div><br>
</div>

<!--footer include start-->
<?php include_once("includes/footer.php"); ?>
<!--footer include end-->

</body>
</html>