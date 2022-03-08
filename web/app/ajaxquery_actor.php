<?php
session_start();
$pid=$_SESSION['proj_id'];
$myactors=$_SESSION['proj_id']."actors";
$mybusy=$_SESSION['proj_id']."busy";
$user_id=$_SESSION['usr_id'];
$proj_name=$_SESSION['proj_name'];
if( isset($_POST['return'])){

    require_once "../pomocne/connection.php";


        $query_status = false;
     //   $user = $_SESSION['logged_user']['id'];
        $return = $_POST['return'];
    
        if($return == 'add_event'){
    
            $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
    
            if(isset($status)){
                $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
                $date = strtotime($_POST['date']);
                $event_odkedy1 = $event_dokedy1 = $event_odkedy2 = $event_dokedy2 = $dovod = "";
                $dovod = filter_var($_POST['dovod'], FILTER_SANITIZE_STRING);
                $event_odkedy1 = filter_var($_POST['event_odkedy1'], FILTER_SANITIZE_STRING);
                $event_dokedy1 = filter_var($_POST['event_dokedy1'], FILTER_SANITIZE_STRING);
                $event_odkedy2 = filter_var($_POST['event_odkedy2'], FILTER_SANITIZE_STRING);
                $event_dokedy2 = filter_var($_POST['event_dokedy2'], FILTER_SANITIZE_STRING);
                if($status == 2){$allday = 0;}else{$allday = 1;};

                $sql="select * from $myactors where id=$user_id";
                $run=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($run);
                $role=$row['role'];
    
                if(isset($date)){
                    // zadefinuje len den , nie minuty alebo sekundy
                    $new_date=strtotime(date('Y-m-d',$date));

                    $con->query("INSERT INTO `$mybusy` (`user_id`, `status`, `dovod`, `date`, `event_odkedy1`, `event_dokedy1`, `event_odkedy2`, `event_dokedy2`, `allday`, `role`) VALUES ('$user_id', '$status', NULLIF('$dovod',''), '$new_date', NULLIF('$event_odkedy1',''), NULLIF('$event_dokedy1',''), NULLIF('$event_odkedy2',''), NULLIF('$event_dokedy2',''), '$allday', '$role');");

                    $query_status = true;
                }
            };

            if($query_status){
                header("Location: ../actor_calendar.php?date=".$date."&user_id=".$user_id."&pid=".$pid."&proj_name=".$proj_name."");
            }else{
                header("Location: ../actor_calendar.php");
            };
        }elseif($return == 'add_event_user'){
            $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
            $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
            $date = strtotime($_POST['date']);
            $event_odkedy1 = $event_dokedy1 = $event_odkedy2 = $event_dokedy2 = $dovod = "";
            $dovod = filter_var($_POST['dovod'], FILTER_SANITIZE_STRING);
            $event_odkedy1 = filter_var($_POST['event_odkedy1'], FILTER_SANITIZE_STRING);
            $event_dokedy1 = filter_var($_POST['event_dokedy1'], FILTER_SANITIZE_STRING);
            $event_odkedy2 = filter_var($_POST['event_odkedy2'], FILTER_SANITIZE_STRING);
            $event_dokedy2 = filter_var($_POST['event_dokedy2'], FILTER_SANITIZE_STRING);
            if($status == 2){$allday = 0;}else{$allday = 1;};

            if(isset($date)){
                $con->query("INSERT INTO `$mybusy` (`user_id`, `status`, `dovod`, `date`, `event_odkedy1`, `event_dokedy1`, `event_odkedy2`, `event_dokedy2`, `allday`) VALUES ('$user_id', '$status', NULLIF('$dovod',''), '$date', NULLIF('$event_odkedy1',''), NULLIF('$event_dokedy1',''), NULLIF('$event_odkedy2',''), NULLIF('$event_dokedy2',''), '$allday');");

                $query_status = true;
            };

            if($query_status){
                header("Location: user_calendar.php?date=".$date."");
            }else{
                header("Location: user_calendar.php");
            };
        }elseif($return == 'delete_event'){
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $date = strtotime($_POST['date']);

            if($id > 0){
                $con->query("DELETE FROM `$mybusy` WHERE `id` = '$id';");

                $query_status = true;
            };

            if($query_status){
                header("Location: ../actor_calendar.php?date=".$date."&user_id=".$user_id."&pid=".$pid."&proj_name=".$proj_name."");
              //  header("Location: ../actor_calendar.php");
            };
        }elseif($return == 'delete_event_user'){
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

            if($id > 0){
                $con->query("DELETE FROM `$mybusy` WHERE `id` = '$id';");

                $query_status = true;
            };

            if($query_status){
                header("Location: user_calendar.php");
            }else{
                header("Location: user_calendar.php");
            };
        };
}