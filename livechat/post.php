<?php
session_start();
if(isset($_SESSION['email'])){
    $text = $_POST['text'];


    date_default_timezone_set('Asia/Colombo');
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['email']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>