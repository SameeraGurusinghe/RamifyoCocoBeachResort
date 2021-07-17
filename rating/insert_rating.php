<?php
//fetch.php

$db = new PDO('mysql:host=localhost;dbname=ramifyohotel', 'root', '');
//include_once("../includes/dbconnection.php");

if(isset($_POST["index"], $_POST["food_id"])){

 $query = "INSERT INTO rating(food_id, rating) VALUES (:food_id, :rating)";
 
 $statement = $db->prepare($query);
 $statement->execute(array(':food_id'  => $_POST["food_id"],':rating'   => $_POST["index"]));
 $result = $statement->fetchAll();
 
 if(isset($result)){
  echo 'done';
 }

}

?>