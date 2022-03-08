<?php

include "../pomocne/start&style.php";
$id= $_GET['id'];
$myactors=$_SESSION['project_id']."actors";
$pid=$_SESSION['project_id'];
$user=$_SESSION['user_email'];
$myproject=$_SESSION['project_name'];

$sql="select * from $myactors where id=$id";
$data=mysqli_fetch_assoc(mysqli_query($con,$sql));
$name=$data['name'];
$role=$data['role'];
$mail=$data['email'];
$phone=$data['phone'];




$to = $mail;
$subject = 'Spolupraca na projekte '.$myproject;


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$message = 'Ahoj  '.$name.', chceme ta poprosit o vyplnenie tvojich zavazkov na projekte '.$myproject.' na tomto linku:';
$message = <<<EOF
<html>
<head>
<h3>Ahoj $name</h3>
</head>
<body>
<p>Chceme ta poprosit o vyplnenie tvojich zavazkov na projekte $myproject na tomto linku:</p>
<a href="http://www.busy-actor.com/actor_calendar.php?pid=$pid&user_id=$id&proj_name=$myproject">Click Here!!!</a>
</body>
</html>
EOF;

// More headers
$headers .= 'From: '. $user. "\r\n";


mail($to,$subject,$message,$headers);


// Sending email
if(mail($to, $subject, $message, $headers)){
    echo "<script type=\"text/javascript\">
                    alert(\"Email uspesne odoslany\");
                    window.location = \"../actor.php\"
                  </script>";
} else{
    echo 'Unable to send email. Please try again.';
}
header("location:../actor.php");
?>
