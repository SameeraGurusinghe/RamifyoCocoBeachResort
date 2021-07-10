<?php

include("db.php");


class model extends db{

    //Registration function
    function save($table,$arr){
        $res=mysqli_query($this->connect(),"insert into $table values('".implode("','",array_values($arr))."')");
    
        if($res){
            return true;
        }
        else{
            return false;
        }
    }


    //Login function
    function login($email,$password){
        //$password = md5($password);
        $res = mysqli_query($this->connect(),"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $c = false;

        while($row = mysqli_fetch_array($res)){
        $c = true;
        $utype = $row["usertype"];
        $_SESSION["email"] = $email;
        }

        if($c){

            if ($utype=='1') {
            return "1";
            }

            elseif ($utype=='2') {
            return "2";
            }

            elseif ($utype=='0') {
            return "0";
            }
        }

        else{
        return false;
        }
    }

}

$obj=new model;



?>