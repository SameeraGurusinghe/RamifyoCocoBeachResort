<!--Session start-->
<?php
session_start();
if(!isset($_SESSION['email'])){
}
?>
<!--Session end-->

<!--database connection-->
<?php
include_once("includes/dbconnection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Main Food Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/foodmenustyle.css">

<script>
function clicked(e)
{
    if(!confirm('Please conform your food order.\nOnce ordered, you will not be able to change this order')) {
        e.preventDefault();
    }
}
</script>

</head>

<body>

<!--header start-->
<?php
include_once("includes/header.php");
?>
<!--header end-->

<div class="container-fluid">

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Sea Food Restaurant</h6>
                        <h2 id="uppercase">Meals & Prices</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12 heading-tabs-border">
                            <div class="heading-tabs">
                                <div class="row">
                                        <ul>
                                          <li><a href='#tabs-1'><img src="images/foodmenu/tab-icon-01.png" alt="">Breakfast</a></li>
                                          <li><a href='#tabs-2'><img src="images/foodmenu/tab-icon-02.png" alt="">Lunch</a></a></li>
                                          <li><a href='#tabs-3'><img src="images/foodmenu/tab-icon-03.png" alt="">Dinner</a></a></li>
                                          <li><a href='#tabs-4'><img src="images/foodmenu/tab-icon-03.png" alt="">Dessert</a></a></li>
                                          <li><a href='#tabs-5'><img src="images/foodmenu/tab-icon-03.png" alt="">Drink</a></a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"><br>

                        <?php
                        if(!isset($_SESSION['email'])){
                        echo "<div class='alert alert-info text-center' role='alert'>";
                        echo "<h5>It seems you aren't log in...</h5>";
                        echo "<h6>Notice: To order meals you must <a href='Login.php'>Log In</a> to your account.</h6>";
                        echo "<p>Meal Order button will be desabled untill you log into your account.</p>";
                        echo "</div>";
                        }
                        ?>
                            <section class='tabs-content'>

                                <!--Main Breakfast area start (Article tabs 01)-->
                                <article id='tabs-1'>
                                    <h2>Available breakfast meals are showing here..</h2><br>
                                    <div class="row">

                                        <!--Breakfast area left side start-->
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='breakfast'");
                                                    /*while($row=mysqli_fetch_array($Result))*/

                                                    include_once("includes/orderinfo.php");
                                                ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Breakfast area left side end-->


                                        <!--Breakfast area right side start-->
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='curry'");
                                                    include("includes/orderinfo.php");

                                                ?>                                                          
                                                </div>
                                            </div>
                                        </div>
                                        <!--Breakfast area right side end-->
                                    </div>
                                </article>
                                <!--Main Breakfast area end (Article tabs 01)-->


                                <!--Main Lunch area start (Article tabs 02)-->
                                <article id='tabs-2'>
                                    <h2>Available Lunch meals are showing here..</h2>
                                    <div class="row">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='all'");
                                                    include("includes/orderinfo.php");
                                                ?>
                                    </div>
                                </article>
                                <!--Main Lunch area end (Article tabs 02)-->
                                

                                <!--Main Dinner area start (Article tabs 03)-->
                                <article id='tabs-3'>
                                    <h2>Available Dinner meals are showing here..</h2>
                                    <div class="row">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='all' OR mealplantype='dinner'");
                                                    include("includes/orderinfo.php");
                                                ?>
                                    </div>
                                </article>
                                <!--Main Dinner area end (Article tabs 03)-->


                                <!--Main Dessert area start (Article tabs 04)-->
                                <article id='tabs-4'>
                                    <h2>Available Dessert are showing here..</h2>
                                    <div class="row">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='dessert'");
                                                    include("includes/orderinfo.php");
                                                ?>
                                    </div>
                                </article>
                                <!--Main Dessert area end (Article tabs 04)-->


                                <!--Main Drink area start (Article tabs 05)-->
                                <article id='tabs-5'>
                                    <h2>Available Drinks are showing here..</h2>
                                    <div class="row">

                                                <?php
                                                    $Result = mysqli_query($db,"SELECT * FROM foods WHERE mealplantype='drink'");
                                                    include("includes/orderinfo.php");
                                                ?>
                                    </div>
                                </article>
                                <!--Main Drink area end (Article tabs 05)-->
     
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->

</div>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>


<!--footer start-->
<?php
include_once("includes/footer.php");
?>
<!--footer end-->
	
</body>
</html>