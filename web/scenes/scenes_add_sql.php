<?php
include("../pomocne/connection.php");
include ("../pomocne/start&style.php");
$myscene=$_SESSION['project_id']."scenes";
$myactors=$_SESSION['project_id']."actors";

$uciid=array();



 $scene = $_POST['scene'];
    $intext = $_POST['intext'];
 $daynight = $_POST['daynight'];
  $synopsis = $_POST['synopsis'];
$filmset = $_POST['filmset'];
$location = $_POST['location'];
echo $cast_id = implode(',',$_POST['cast']);
$scriptday = $_POST['scriptday'];
$pagescount = $_POST['pagescount'];
 $notes = $_POST['notes'];
 $status = $_POST['status'];

//$ucink=$_POST['cast'] ;echo"<br>";
// $pocet=count($ucink);
//foreach ($ucink as $uci){
//    $sql22="select * from $myactors where role='$uci' ";
//    $run22=mysqli_query($con,$sql22);
//    $row=mysqli_fetch_assoc($run22);
// $row['role'];
//        $uciid[]= $row['id'];
//
//};
//
//$cast_id = implode(',',$uciid);



echo $sql = "INSERT INTO $myscene  SET
scene='$scene',
intext='$intext',
daynight='$daynight',
cast='',
cast_id='$cast_id',
synopsis='$synopsis',
filmset='$filmset',
location='$location',
scriptday='$scriptday',
status='$status',
notes='$notes',
pagescount='$pagescount'
";

        mysqli_query($con,$sql);

    header("location:../scenes.php");
 die;
mysqli_close($conn);

?>
