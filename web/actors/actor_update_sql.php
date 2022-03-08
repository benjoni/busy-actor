<?php
include("../pomocne/start&style.php");
$actor_name = $_POST['actor_name'];
$actor_role = $_POST['actor_role'];
$actor_email = $_POST['actor_email'];
$actor_phone = $_POST['actor_phone'];
 $id = $_POST['actor_id'];
 $myactors=$_SESSION['project_id']."actors";


 $sql6 = "update $myactors set name='$actor_name' ,role='$actor_role',email='$actor_email',phone='$actor_phone' where id='$id'";
include("../pomocne/connection.php");
mysqli_query($con,$sql6);



header("location:../actor.php");
die;

