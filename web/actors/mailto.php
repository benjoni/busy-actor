<?php

include "../pomocne/start&style.php";
$id= $_GET['id'];
$myactors=$_SESSION['project_id']."actors";

$sql="select * from $myactors where id=$id";
$data=mysqli_fetch_assoc(mysqli_query($con,$sql));
$name=$data['name'];
$role=$data['role'];
$mail=$data['email'];
$phone=$data['phone'];

echo "posielam mail ".$name." ktory ma mail: ".$mail;

$to = $mail;
$subject = 'pozvanka';
$message = 'Ahoj '.$name.', Chceli by sme ta pozvat na cooperaciu';
$message =  ;
echo $headers = 'From: '.$_SESSION['user_email'] . "\r\n" .
  //  'Reply-To: reply@bencsik.sk' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

$success = mail('peter@bencsik.sk', 'My Subject', $message);
if (!$success) {
    $errorMessage = error_get_last()['message'];
}else
{
    echo "<script type=\"text/javascript\">
                    alert(\"Email uspesne odoslany\");
                    window.location = \"../actor.php\"
                  </script>";
}
header("location:../actor.php");
?>
