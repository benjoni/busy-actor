<?php
//----------------------------------------- localhost ---------------------------------------
//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "";
//$dbname = "skuska";
// $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// session_start();
// define('SITEURL','http://localhost/working-files/');
//if(!$con)
//{
//
//	die("failed to connect!");
//};

//----------------------------------------- localhost ---------------------------------------
//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "";
//$dbname = "skuska";
// $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//
//
//if(!$con)
//{
//    echo "<script type=\"text/javascript\">
//                    alert(\"failed to connect\");
//                    window.location = \"connection.php\"
//                     </script>";
//	die("failed to connect!");
//};


//------------------------------------------- websupport ---------------------------------------


$dbhost = "mariadb103.websupport.sk:3313";
$dbuser = "benjoni";
$dbpass = "Maxulak7606";
$dbname = "busyactor";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
session_start();

if(!$con) {

    die("failed to connect!");

}

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// define('SITEURL','http://localhost/working-files/');