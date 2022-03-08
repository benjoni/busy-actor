<?php
session_start();
include("../pomocne/connection.php");
unset($_SESSION['budy_email']);
unset($_SESSION['budy_id']);
 $_SESSION['name']=$_GET['name'];
 $_SESSION['mail']=$_GET['mail'];




header("location:user-register.php");


?>