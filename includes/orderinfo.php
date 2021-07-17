<?php

while($row=mysqli_fetch_array($Result)){
    $id = $row['foodid'];
    $fname = $row["name"];
    $fprice = $row["price"];
    $fdescription = $row["fdescription"];
    $fimage = $row["fimage"];

    echo "<div class='col-lg-12'>";
    echo "<div class='tab-item'>";
        echo "<img src='$fimage'>";
        echo "<h4>$fname</h4>";
        echo "<p>$fdescription</p>";
            echo "<div class='price'>";
                echo "<h6>LKR $fprice</h6>";
            echo "</div>";
                                                    
    echo "<form action='action_pages/orderaction.php' method='post'>";
        if(isset($_SESSION['email'])){
            $ifuser = $_SESSION['email'];
        echo "<input type='hidden' name='emailid' value='$ifuser'>";
        }
        echo "<input type='hidden' name='fid' value='$id'>";
        echo "<input type='hidden' name='fname' value='$fname'>";
        echo "<input type='hidden' name='fprice' value='$fprice'>";
        if(isset($_SESSION['email'])){
        echo "<p>First enter amount you wish to order: <input type='number' class='col-sm-1' name='mealcount' value='1' min='1' max='10'></p>";
        echo "<br>";
        echo "<div class='buttonart'>";
            echo "<button type='submit' onclick='clicked(event)' class='btn btn-success' style='float: right;'>Place a Order</button>";
        echo "</div>";
        }
        /*if(!isset($_SESSION['email'])){
        echo "<div class='pleaselogh'>";
            echo "<h6>Notice: To order <i>$fname</i> you must <a href='Login.php'>Log In</a> to your account.</h6>";
        echo "</div>";
        }*/
        echo "</form>";

        echo "</div>";
        echo "</div>";
        echo "<hr>";
        }
?>