<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    </head>
    <body></body>
</html>

<?php

include('includes/dbconnection.php');

if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']){
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = md5($_POST['password']);

$query = mysqli_query($db,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);

if($row){
mysqli_query($db,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
    
    //echo '<p>Congratulations! Your password has been updated successfully.</p>';
    echo "<script type='text/javascript'>           
    swal({ title: 'Success!',text: 'Your password has been successfully updated.',icon: 'success'}).then(okay => {
    if (okay) {
    window.location.href = 'Login.php';}
    });
    </script>";
}

else{
    //echo "<p>Something goes wrong. Please try again</p>";
    echo "<script type='text/javascript'>           
    swal({ title: 'Opps!',text: 'An error occured. Try again.',icon: 'error'}).then(okay => {
    if (okay) {
    window.location.href = 'Login.php';}
    });
    </script>";
}

}
?>


