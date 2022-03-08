

<?php

include("../pomocne/start&style.php");

 $user_id= $_GET['user_id'];echo "<br>";
$usermy=$user_id."project";echo "<br>";




$sqlproject="select project_id from $usermy";echo "<br>";

$run = mysqli_query($con, $sqlproject);

while($user_data = mysqli_fetch_assoc($run)) {

    $my=$user_data['project_id'];
     $myscene=$my."scenes";echo "<br>";
    $sqldropscene=  "drop table $myscene";echo "<br>";
    mysqli_query($con,$sqldropscene);


   $myactors=$my."actors";echo "<br>";
    $sqldropactor=  "drop table $myactors";echo "<br>";
    mysqli_query($con,$sqldropactor);

    $mybusy=$my."busy";echo "<br>";
    $sqldropbusy=  "drop table $mybusy";echo "<br>";
    mysqli_query($con,$sqldropbusy);

    $myinfo=$my."info";echo "<br>";
    $sqldropinfo=  "drop table $myinfo";echo "<br>";
    mysqli_query($con,$sqldropinfo);

    $myvyp=$my."vypocet";echo "<br>";
    $sqldropvyp=  "drop table $myinfo";echo "<br>";
    mysqli_query($con,$sqldropvyp);

}



$sqldropproject=  "drop table $usermy";echo "<br>";
mysqli_query($con,$sqldropproject);

$sql55="delete from users where boss_id=$user_id";echo "<br>";
mysqli_query($con,$sql55);

 $sql4="delete from users where user_id=$user_id";echo "<br>";
mysqli_query($con,$sql4);

    header("location:../users.php");
mysqli_close($conn);
    die;

?>

