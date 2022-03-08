

<?php
include("../pomocne/connection.php");
include ("../pomocne/start&style.php");
$myscene=$_SESSION['project_id']."scenes";
echo $id= $_GET['id'];


$sql4="delete from $myscene where id=$id";
$delete=mysqli_query($con,$sql4);

if($delete){





    header("location:../scenes.php");
    die;
}else
{
    echo "nepodarilo sa zmazat";
}
?>

