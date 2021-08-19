<?php

if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
include('includes/dbconnection.php');
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = md5($_POST['password']);
$query = mysqli_query($db,"SELECT * FROM `user` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($db,"UPDATE user set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
echo '<p>Congratulations! Your password has been updated successfully.</p>';
}else{
echo "<p>Something goes wrong. Please try again</p>";
}
}
?>


