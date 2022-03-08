

<?php
include("../pomocne/connection.php");
include("../pomocne/start&style.php");
$myactors=$_SESSION['project_id']."actors";
echo $id= $_GET['id'];


echo $sql4="delete from users where id=$id";
$delete=mysqli_query($con,$sql4);

if($delete){





  header("location:../budies.php");
    die;
}else
{
    echo "nepodarilo sa zmazat";
}
?>

