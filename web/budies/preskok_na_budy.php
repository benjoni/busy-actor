<?php
session_start();
include("../pomocne/connection.php");
unset($_SESSION['budy_email']);
unset($_SESSION['budy_id']);
unset($_SESSION['budy_name']);
echo $_SESSION['budy_email']=$_GET['budy_email'];
echo  $_SESSION['budy_id']=$_GET['budy_id'];
echo $_SESSION['budy_name']=$_GET['budy_name'];




header("location:budy-register.php");


?>