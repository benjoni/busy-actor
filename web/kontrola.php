

<?php
include ("pomocne/connection.php");
include "pomocne/functions.php";
session_start();
$myactors=$_SESSION['project_id']."actors";
$mybusy=$_SESSION['project_id']."busy";
$myvypocet=$_SESSION['project_id']."vypocet";
$myscenes=$_SESSION['project_id']."scenes";
$myinfo=$_SESSION['project_id']."info";

$sql22="select * from $myscenes order by scene";
$run22=mysqli_query($con,$sql22);

while($row22=mysqli_fetch_assoc($run22)) {



 echo   $obraz = $row22['scene'];echo "<br>";
    echo   $pd = $row22['plan_date'];echo "<br>";
    echo   $status = $row22['status'];echo "<br>";

    switch ($pd){
        case "5": $plan_date='0';
                           echo   $sql57 = "update $myvypocet
                                      SET plan_date=$plan_date
                                       WHERE scene='$obraz'   ";
                                         mysqli_query($con, $sql57);
            echo "<br>";
                                break;

        case $pd>5: $plan_date='2';
                               $sql57 = "update $myvypocet
                                      SET plan_date=$plan_date
                                       WHERE scene='$obraz'   ";
                                     mysqli_query($con, $sql57);

           echo $sql58 = "update $myvypocet
                                      SET plan_date=$pd
                                       WHERE scene='$obraz' and date='$pd'   ";
            mysqli_query($con, $sql58);
            echo "<br>";
        break;
    }
    switch ($status){
        case "bad":    $teraz=strtotime('now');
            $den= date('d-F-Y', $pd);
            info("$obraz", "$den","2");
    }



                                            }







header("Location:tabulka.php");

?>

