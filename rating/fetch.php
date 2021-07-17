<?php
//fetch.php

$db = new PDO('mysql:host=localhost;dbname=ramifyohotel', 'root', '');

//include_once("../includes/dbconnection.php");

$query = "SELECT * FROM foods ORDER BY mealplantype DESC";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';

foreach($result as $row){

 $rating = count_rating($row['foodid'], $db);
 $color = '';
 $output .= '<h4 class="text-primary text-center">'.$row['name'].'</h4>
 <ul class="list-inline text-center" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">';
 
 for($count=1; $count<=5; $count++){
  
  if($count <= $rating){
   $color = 'color:#ffcc00;';
  }

  else{
   $color = 'color:#ccc;';
  }

  $output .= '<li title="'.$count.'" foodid="'.$row['foodid'].'-'.$count.'" data-index="'.$count.'"  data-food_id="'.$row['foodid'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.'font-size:25px;">&#9733;</li>';
 }

  $output .= '</ul><hr style="color: white;">';
}

echo $output;

function count_rating($food_id, $db){

 $output = 0;
 $query = "SELECT AVG(rating) as rating FROM rating WHERE food_id = '".$food_id."'";
 $statement = $db->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();

 if($total_row > 0){
  foreach($result as $row){
   $output = round($row["rating"]);
  }

 }

 return $output;

}

?>