<?php

include("model.php");

if(isset($_POST["addfood"])){

    $ftype=$_POST["ftype"];
    $fname=$_POST["fname"];
    $fprice=$_POST["fprice"];
    $fid=0;
    
    
    $arr=array($fid,$fname,$fprice,$ftype);


    if($obj->save("foods",$arr)){
        echo "Success";
    }
    else{
        echo "Failed";
        }

}


?>
