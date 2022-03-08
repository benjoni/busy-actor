<?php
include("../pomocne/connection.php");
include("../pomocne/start&style.php");
$myactors=$_SESSION['project_id']."actors";



   $actor_name = $_POST['actor_name'];
    $actor_email = $_POST['actor_email'];
 $actor_role = $_POST['actor_role'];
  $actor_phone = $_POST['actor_phone'];



echo  $sql = "INSERT INTO $myactors  SET 
name='$actor_name',
role='$actor_role',
email='$actor_email',
phone='$actor_phone' ";

        mysqli_query($con,$sql);

    header("location:../actor.php");
 die;
mysqli_close($conn);

?>
