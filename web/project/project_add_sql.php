<?php
include("../pomocne/start&style.php");
include("../pomocne/functions.php");


echo $myproject=$_SESSION['user_id']."project";


 $project_name = $_POST['project_name'];
    $production = $_POST['production'];
 $kind = $_POST['kind'];
  $info = $_POST['info'];
$status = $_POST['status'];

 $project_id = random_num(10);
 $myactors=$project_id."actors";echo"<br>";
 $myscenes=$project_id."scenes";echo"<br>";
 $mybusy=$project_id."busy";echo"<br>";
$myinfo=$project_id."info";echo"<br>";
$myvypocet=$project_id."vypocet";echo"<br>";

 echo $sql = "INSERT INTO $myproject  SET
project_name='$project_name',
production='$production',
kind='$kind',
info='$info',
status='$status',
project_id='$project_id'";

if (mysqli_query($con,$sql) === TRUE) {
    echo "Table insert created successfully";
} else {
    echo "Error creating table: " . $con->error;echo"<br>";
}

//-----------------------------------------------------------------
$sqlactor="CREATE TABLE $myactors (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50)  NULL,
role VARCHAR(30)  NULL,
email VARCHAR(50) null ,
phone VARCHAR(50) null ,
password VARCHAR(255) null )";


if (mysqli_query($con,$sqlactor) === TRUE) {
    echo "Table $myactors created successfully";
} else {
    echo "Error creating table: " . $con->error;
}
//-----------------------------------------------------------------
$sqlinfo="CREATE TABLE $myinfo (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50)  NULL,
hodnota VARCHAR(500)  NULL,
status VARCHAR(50) null ,
date INT(50) null 
 )";


if (mysqli_query($con,$sqlinfo) === TRUE) {
    echo "Table $myinfo created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

$teraz=strtotime('now');
$sql66 = "INSERT INTO $myinfo  SET
name='click',
date='$teraz',
hodnota='0',
status='0'
";

mysqli_query($con,$sql66);


//-----------------------------------------------------------------
$sqlscene="CREATE TABLE $myscenes (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
scene VARCHAR(50)  NULL,
plan_date INT(50)  NULL DEFAULT 0,
intext VARCHAR(50)  NULL,
daynight VARCHAR(50) null ,
synopsis VARCHAR(500) null ,
filmset VARCHAR(50) null,
location VARCHAR(50)  NULL,
cast VARCHAR(500) null ,
cast_id VARCHAR(500) null ,
scriptday VARCHAR(50) null ,                   
pagescount VARCHAR(500) null ,
notes VARCHAR(5000) null ,
status VARCHAR(50) null   )";


if (mysqli_query($con,$sqlscene) === TRUE) {
    echo "Table $table_scene created successfully";
} else {
    echo "Error creating table: " . $con->error;
}

//-----------------------------------------------------------------
$sqlbusy="CREATE TABLE $mybusy (
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`user_id` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `dovod` varchar(255) DEFAULT NULL,
  `date` int(50) DEFAULT NULL,
  `event_odkedy1` varchar(5) DEFAULT NULL,
  `event_dokedy1` varchar(5) DEFAULT NULL,
  `event_odkedy2` varchar(5) DEFAULT NULL,
  `event_dokedy2` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `allday` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if (mysqli_query($con,$sqlbusy) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $con->error;
}


//--------------------------------nova tabulka ktora bude obsahovat vypocet--------------
$sqlvypocet="CREATE TABLE $myvypocet (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` int(50) DEFAULT NULL,
    `plan_date` int(50) DEFAULT 0,
scene VARCHAR(50)  NULL,
intext VARCHAR(50)  NULL,
daynight VARCHAR(50) null ,
synopsis VARCHAR(500) null ,
filmset VARCHAR(50) null,
location VARCHAR(50)  NULL,
cast VARCHAR(500) null ,
cast_id VARCHAR(500) null ,
scriptday VARCHAR(50) null ,                   
pagescount VARCHAR(500) null ,
notes VARCHAR(5000) null ,
zavazok VARCHAR(5000) null,
status VARCHAR(50) null   )";


if (mysqli_query($con,$sqlvypocet) === TRUE) {
    echo "Table $sqlvypocet created successfully";
} else {
    echo "Error creating table: " . $con->error;
}


    header("location:../project.php");
 die;
mysqli_close($conn);









?>
