<?php
include("../pomocne/start&style.php");
$myproject=$_SESSION['user_id']."project";
$project_name = $_POST['project_name'];
$production = $_POST['production'];
$kind = $_POST['kind'];
$info = $_POST['info'];
$id = $_POST['id'];


 $sql6 = "update $myproject set project_name='$project_name',
                                    production='$production',
                                    kind='$kind',
                                    info='$info'
                    where id='$id'";
include("../pomocne/connection.php");
mysqli_query($con,$sql6);



header("location:../project.php");
die;

