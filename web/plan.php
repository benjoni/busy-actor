

<?php
include ("pomocne/connection.php");
session_start();
$myactors=$_SESSION['project_id']."actors";
$mybusy=$_SESSION['project_id']."busy";
$myvypocet=$_SESSION['project_id']."vypocet";
$myscenes=$_SESSION['project_id']."scenes";

$plan_date= $_GET['plan_date'];
$scene= $_GET['scene'];
$vyhybka= $_GET['vyhybka'];







switch ($vyhybka){
    case "1":
        $sql77 = "update $myvypocet  SET plan_date='0' where   scene='$scene'  ";
        mysqli_query($con,$sql77);



        $sql88 = "update $myscenes  SET plan_date='$plan_date',status='incalendar' where   scene='$scene'  ";
        mysqli_query($con,$sql88);

        break;
    case "0":
        $sql77 = "update $myvypocet  SET plan_date='2' where   scene='$scene'  ";
        mysqli_query($con,$sql77);

        $sql78 = "update $myvypocet  SET plan_date='$plan_date' where   scene='$scene' and date='$plan_date'";
        mysqli_query($con,$sql78);

        $sql88 = "update $myscenes  SET plan_date='$plan_date',status='booked' where   scene='$scene'  ";
        mysqli_query($con,$sql88);

        break;
}










header("Location:tabulka.php");

?>

