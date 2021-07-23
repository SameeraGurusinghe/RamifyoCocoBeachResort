<?php
while($row=mysqli_fetch_array($Result)){
    
    $fname = $row["name"];
    $foodid = $row["foodid"];
    $fprice = $row["price"];
    $foodstatus = $row['foodstatus'];
    ?> 

    <?php
    if($foodstatus == 0){
        echo "<td style='color:green;font-weight:bold;'>$fname</td>";
        echo "<td style='color:green;font-weight:bold;'>$foodid</td>";
        echo "<td style='color:green;font-weight:bold;'>Rs.$fprice/=</td>";
    }
                      
    else if($foodstatus == 1){
        echo "<td style='color:red;font-weight:bold;'>$fname</td>";
        echo "<td style='color:red;font-weight:bold;'>$foodid</td>";
        echo "<td style='color:red;font-weight:bold;'>Rs.$fprice/=</td>"; 
    }
                      
    echo "</tr>";
    ?>
<?php
}