

<?php

include("../pomocne/start&style.php");

 $project_id= $_GET['project_id'];echo" <br>";
 $myproject=$_SESSION['user_id']."project";
$myscene=$project_id."scenes";
$myactor=$project_id."actors";
$myinfo=$project_id."info";
$mybusy=$project_id."busy";
$myvypocet=$project_id."vypocet";

 $sqldropactors=      "drop table $myactor";echo" <br>";
$deleteactors=mysqli_query($con,$sqldropactors);

$sqldropinfo=      "drop table $myinfo";echo" <br>";
$deleteinfo=mysqli_query($con,$sqldropinfo);

 $sqldropscene=      "drop table $myscene";echo" <br>";
$deletescene=mysqli_query($con,$sqldropscene);

$sqldropbusy=      "drop table $mybusy";echo" <br>";
$deletebusy=mysqli_query($con,$sqldropbusy);

$sqldropvypocet=      "drop table $myvypocet";echo" <br>";
$deletevypocet=mysqli_query($con,$sqldropvypocet);

$sql4="delete from $myproject where project_id=$project_id";
$delete4=mysqli_query($con,$sql4);

    header("location:../project.php");
    die;

?>

