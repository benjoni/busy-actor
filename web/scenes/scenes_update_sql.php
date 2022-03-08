<?php
include("../pomocne/start&style.php");
include("../pomocne/connection.php");

$myscene=$_SESSION['project_id']."scenes";
$myactors=$_SESSION['project_id']."actors";

 $id = $_POST['id'];
$scene = $_POST['scene'];
$intext = $_POST['intext'];
$daynight = $_POST['daynight'];
$synopsis = $_POST['synopsis'];
$filmset = $_POST['filmset'];
$location = $_POST['location'];

//$ucink=$_POST['cast'];

//echo$poc=count($ucink);
//print_r($ucink);
//foreach ($ucink as $uci){
// echo   $sql="select * from $myactors where role='$uci' ";
//    $run=mysqli_query($con,$sql);
//    while ($row=mysqli_fetch_assoc($run)) {
//
//      $uciid[]= $row['id'];
//    }
//}


 $cast_id = implode(',',$_POST['cast']);echo"<br>";
// $cast_id = implode(',',$uciid);
$scriptday = $_POST['scriptday'];
$pagescount = $_POST['pagescount'];
 $notes = $_POST['notes'];


include ("../pomocne/start&style.php");

$myscene=$_SESSION['project_id']."scenes";





 echo $sql6 = "update $myscene set scene='$scene' ,
                                intext='$intext',
                                daynight='$daynight',
                                cast='',
                                  cast_id='$cast_id',
                                synopsis='$synopsis',
                                filmset='$filmset',
                                location='$location',
                                scriptday='$scriptday',
                                notes='$notes',
                                pagescount='$pagescount'
                    where id='$id'";

mysqli_query($con,$sql6);



header("location:../scenes.php");
die;

