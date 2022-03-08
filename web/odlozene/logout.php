<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
    session_destroy();
    header("Location: odlozene/user-login.php");
}
session_destroy();
header("Location: user-login.php");
die;

?>
