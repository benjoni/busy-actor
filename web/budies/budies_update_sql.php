<?php
include("../pomocne/start&style.php");

 $id = $_POST['user_id'];
$budy_name = $_POST['budy_name'];
$budy_email = $_POST['budy_email'];
$a1 = isset($_POST['A1']);
$a2 = isset($_POST['A2']);
$a3 = isset($_POST['A3']);
$b1 = isset($_POST['B1']);
$b2 = isset($_POST['B2']);
$b3 = isset($_POST['B3']);
$c1 = isset($_POST['C1']);
$c2 = isset($_POST['C2']);
$c3 = isset($_POST['C3']);
$d1 = isset($_POST['D1']);
$d2 = isset($_POST['D2']);
$d3 = isset($_POST['D3']);


 $sql6 = "update users set user_name='$budy_name',user_email='$budy_email',a1='$a1' ,a2='$a2',a3='$a3',b1='$b1',b2='$b2',b3='$b3',c1='$c1',c2='$c2',c3='$c3',d1='$d1',d2='$d2',d3='$d3'
where id='$id'";
include("../pomocne/connection.php");
mysqli_query($con,$sql6);



header("location:../budies.php");
die;








