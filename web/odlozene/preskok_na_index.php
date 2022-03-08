<?php
session_start();
include("../pomocne/connection.php");
unset($_SESSION['project_name']);
unset($_SESSION['project_id']);
 $_SESSION['project_name']=$_GET['project_name'];
 $_SESSION['project_id']=$_GET['project_id'];
 $myscene=$_SESSION['project_id']."scenes";echo "<br>";
$myactors=$_SESSION['project_id']."actors";echo "<br>";

//$sql="select * from $myactors ";
//$run=mysqli_query($con,$sql);
//$_SESSION["pocet_hercov"] = mysqli_num_rows($run);echo "<br>";
//
//$sql2="select * from $myscene ";
//$run2=mysqli_query($con,$sql2);
// $_SESSION["pocet_obrazov"] = mysqli_num_rows($run2);echo "<br>";
//
//$sql3="select * from $myscene where status='new'";
//$run3=mysqli_query($con,$sql3);
//$_SESSION["pocet_nenaplanovanych_obrazov"] = mysqli_num_rows($run3);echo "<br>";
//

header("location:../home.php");


?>