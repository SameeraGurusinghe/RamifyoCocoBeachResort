<?php

include("db.php");


class model extends db{
    function save($table,$arr){
        $res=mysqli_query($this->connect(),"insert into $table values('".implode("','",array_values($arr))."')");
    
        if($res){
            return true;
        }else{
            return false;
        }
    
    }
}

$obj=new model;



?>