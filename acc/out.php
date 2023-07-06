<?php

session_start();
session_destroy();
unset($_COOKIE['user_email']); 
setcookie('user_email', '', -1, '/'); 
header("location:../login.php");

?>