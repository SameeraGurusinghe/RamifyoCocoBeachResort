<?php
while($row=mysqli_fetch_array($Result)){
    
    $room_no = $row["room_no"];
    $email = $row["email"];
    $checkin = $row["check_in"];
    $checkout = $row['check_out'];
    $nights = $row["nights"];
    $adults = $row["adults"];
    $childs = $row["childs"];
    $res_status = $row["res_status"];
    ?> 

    <?php
    if($res_status == 1){
        echo "<td style='color:green;font-weight:bold;'>$room_no</td>";
        echo "<td style='color:green;font-weight:bold;'>$email</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$checkin/=</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$checkout/=</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$nights/=</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$adults/=</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$childs/=</td>";
        
    }
                      
    else if($res_status == 0){
        echo "<td style='color:red;font-weight:bold;'>$room_no</td>";
        echo "<td style='color:red;font-weight:bold;'>$email</td>";
        echo "<td style='color:red;font-weight:bold;'>Rs.$checkin/=</td>";
        echo "<td style='color:red;font-weight:bold;'>Rs.$checkout/=</td>"; 
        echo "<td style='color:red;font-weight:bold;'>Rs.$nights/=</td>"; 
        echo "<td style='color:red;font-weight:bold;'>Rs.$adults/=</td>"; 
        echo "<td style='color:red;font-weight:bold;'>Rs.$childs/=</td>";  
    }
                      
    echo "</tr>";
    ?>
<?php
}