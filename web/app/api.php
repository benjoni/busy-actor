<?php
session_start();
$myactors=$_SESSION['project_id']."actors";
$mybusy=$_SESSION['project_id']."busy";
if(isset($_GET['api']) && isset($_GET['api_type']) ){
    if($_GET['api'] == 1){
        require_once "../pomocne/connection.php";
    
        $query_status = false;
        if($_GET['api_type'] == 'get_calendar_data_admin'){

            if(isset($_GET['users']) && $_GET['users'] > 0){
                $users = $_GET['users'];
                $events_all_admin_array = $con->query("SELECT * FROM `$mybusy` WHERE `user_id` IN ($users);");
            }else{
                $events_all_admin_array = $con->query("SELECT * FROM `$mybusy`;");
            };

            if(mysqli_num_rows($events_all_admin_array)){
                $data_array_json_output = array();
                foreach($events_all_admin_array as $events_all_admin_item){
                    if($events_all_admin_item['status'] == 0){$bcolor = "red"; $status_text = "Busy";}elseif($events_all_admin_item['status'] == 1){$bcolor = "green"; $status_text = "Free";}elseif ($events_all_admin_item['status'] == 2) {$bcolor = "#3788d8"; $status_text = "Maybe";}elseif ($events_all_admin_item['status'] == 3) {$bcolor = "orange"; $status_text = "Dontknowyet";};
                    $user = $events_all_admin_item['user_id'];
                    $user = $con->query("SELECT `id`, `role` FROM `$myactors`  WHERE `id` = '$user';");
                    $user = mysqli_fetch_row($user);

                    array_push($data_array_json_output, [
                        'id' => $events_all_admin_item['id'],
                        'title' => $user[1],
                        'description' => $events_all_admin_item['dovod'],
                        'status' => $status_text,
                        'event_odkedy1' => $events_all_admin_item['event_odkedy1'],
                        'event_dokedy1' => $events_all_admin_item['event_dokedy1'],
                        'event_odkedy2' => $events_all_admin_item['event_odkedy2'],
                        'event_dokedy2' => $events_all_admin_item['event_dokedy2'],
                        'start' => date('Y-m-d', $events_all_admin_item['date']),
                        'end' => date('Y-m-d', $events_all_admin_item['date']),
                        'backgroundColor' => $bcolor,
                        'allDay' => 1
                    ]);
                };
                $data_array_json_output = json_encode($data_array_json_output);
                header("Content-Type: application/json; charset=UTF-8");
                echo $data_array_json_output;
            };
        }
    }
}


if(isset($_GET['api']) && isset($_GET['api_type']) ){
    if($_GET['api'] == 1){
        require_once "../pomocne/connection.php";

        $query_status = false;
        if ($_GET['api_type'] == 'get_calendar_data_user'){

         //   $user_id = $_SESSION['logged_user']['id'];

            $events_all_admin_array = $con->query("SELECT * FROM `$mybusy` WHERE `user_id` = '$user_id';");

            if(mysqli_num_rows($events_all_admin_array)){
                $data_array_json_output = array();
                foreach($events_all_admin_array as $events_all_admin_item){
                    if($events_all_admin_item['status'] == 0){$bcolor = "red"; $status_text = "Busy";}elseif($events_all_admin_item['status'] == 1){$bcolor = "green"; $status_text = "Free";}elseif ($events_all_admin_item['status'] == 2) {$bcolor = "#3788d8"; $status_text = "Maybe";}elseif ($events_all_admin_item['status'] == 3) {$bcolor = "orange"; $status_text = "Dontknowyet";};
                    $user = $events_all_admin_item['user_id'];
                    $user = $con->query("SELECT `id`, `role` FROM `$myactors`  WHERE `id` = '$user';");
                    $user = mysqli_fetch_row($user);

                    array_push($data_array_json_output, [
                        'id' => $events_all_admin_item['id'],
                        'title' => $user[0].' '.$user[1],
                        'description' => $events_all_admin_item['dovod'],
                        'status' => $status_text,
                        'event_odkedy1' => $events_all_admin_item['event_odkedy1'],
                        'event_dokedy1' => $events_all_admin_item['event_dokedy1'],
                        'event_odkedy2' => $events_all_admin_item['event_odkedy2'],
                        'event_dokedy2' => $events_all_admin_item['event_dokedy2'],
                        'start' => date('Y-m-d', $events_all_admin_item['date']),
                        'end' => date('Y-m-d', $events_all_admin_item['date']),
                        'backgroundColor' => $bcolor,
                        'allDay' => 1
                    ]);
                };
                $data_array_json_output = json_encode($data_array_json_output);
                header("Content-Type: application/json; charset=UTF-8");
                echo $data_array_json_output;
            };
        };
    };
};