

<?php
include("../pomocne/connection.php");
include("../pomocne/start&style.php");
$myactors=$_SESSION['project_id']."actors";
echo $id= $_GET['id'];


$sql4="delete from $myactors where id=$id";
$delete=mysqli_query($con,$sql4);

if($delete){





    header("location:../actor.php");
    die;
}else
{
    echo "nepodarilo sa zmazat";
}
?>

