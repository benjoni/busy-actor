<?php
include ("connection.php");
session_start();
$myscene=$_SESSION['project_id']."scenes";
$myactor=$_SESSION['project_id']."actors";


function info($name,$hodnota,$status){

    $myinfo=$_SESSION['project_id']."info";
    $teraz=strtotime('now');
    $sql66 = "INSERT INTO $myinfo  SET
name='$name',
date='$teraz',
hodnota='$hodnota',
status='$status'
";
    include ("connection.php");
    mysqli_query($con,$sql66);
}




function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
// toto je button export from database to csv scenes
if(isset($_POST["Export"])){

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
  //  fputcsv($output, array( 'scene', 'intext', 'daynight', 'synopsis', 'filmset', 'location', 'cast', 'scriptday', 'pagescount', 'notes'));
    $query = "select scene,intext,daynight,synopsis,filmset,location,cast,scriptday,pagescount,notes from $myscene order by scene";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}

// funkcia na import csv do tabulky scenes
if(isset($_POST["Import"])){

    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql = "INSERT into $myscene (scene,intext,daynight,synopsis,filmset,location,cast,scriptday,pagescount,notes) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."')";
            $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"import_scenes.php\"
              </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"../scenes.php\"
          </script>";
            }
        }

        fclose($file);
    }
}

// funkcia na import csv do tabulky actors
if(isset($_POST["Import_actors"])){

    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql = "INSERT into $myactor (name,role,email,phone) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
            $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"import_scenes.php\"
              </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"../actor.php\"
          </script>";
            }
        }

        fclose($file);
    }
}

// toto je button export from database to csv actors
if(isset($_POST["Export_actors"])){

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
//    fputcsv($output, array( 'name', 'role', 'email', 'phone'));
    $query = "select name,role,email,phone from $myactor ";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}