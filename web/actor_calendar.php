<!DOCTYPE html>
<html>
<?php

session_start();



?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="assets/js/jquery-3.6.0.min.js"></script>
<link href='assets/fullcalendar/lib/main.css' rel='stylesheet' />
<script src='assets/fullcalendar/lib/main.js'></script>
<script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
<script src='assets/date-picker/picker.js'></script>
<script src='assets/date-picker/picker.date.js'></script>
<script src='assets/date-picker/picker.time.js'></script>
<script src='assets/date-picker/legacy.js'></script>
<link href='assets/date-picker/themes/classic.css' rel='stylesheet' />
<link href='assets/date-picker/themes/classic.time.css' rel='stylesheet' />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->


    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

<?php

require_once "pomocne/connection.php";
 $_SESSION['proj_id']= $_GET['pid'];
$pid= $_GET['pid'];

$_SESSION['proj_name']= $_GET['proj_name'];
$proj_name=$_SESSION['proj_name'];
 $user_id=$_GET['user_id'];
 $myactors=$_SESSION['proj_id']."actors";
$mybusy=$_SESSION['proj_id']."busy";
if(isset($_GET['date'])){

  if(isset($_GET['user_id'])){

    $date_init = date('Y-m-d', filter_var($_GET['date'], FILTER_SANITIZE_NUMBER_INT));
  // $user_id = filter_var($_GET['user_id'], FILTER_SANITIZE_NUMBER_INT);
      $_SESSION['usr_id']=$user_id;
    echo "
    <script>
      $( document ).ready(function() {
        $('#select_user').val(".$user_id.");
        open_events();
      });
    </script>
    ";
    unset($user_id);
  }else{
    $date_init = date('Y-m-d', filter_var($_GET['date'], FILTER_SANITIZE_NUMBER_INT));
  }
}else{
  $date_init = date('Y-m-d');
};

if(isset($_POST['select_user_filter'])){
  echo "
  <script>
    $( document ).ready(function() {
      $('#select_user_filter option:selected').map(function(){ ".implode(',', $_POST['select_user_filter'])." }).get()
    });
  </script>
  ";
}

?>


<style>
  #eventy_all{
    display: none;

  }
  #external-events {
    overflow: scroll;
  }

  #external-events .fc-event {
    cursor: move;
    margin: 3px 0;
  }

  #calendar {
    max-width: 85%;
      margin-top:  4%;
  }
 .medzera{
     margin-top:  2%;
 }
  .event_free{
      background-color: green;
  }

  .event_busy{
      background-color: red;
  }

  .event_dontknowyet{
      background-color: orange;
  }
    .btn-inline{
        margin: 5%;
    }
  .time_select{
    cursor: pointer;
  }
</style>
</head>
<body>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        if(eventEl.dataset.status == 0){var color = "red";}else if(eventEl.dataset.status == 1){var color = "green";}else if(eventEl.dataset.status == 2){var color = "#3788d8";}else if(eventEl.dataset.status == 3){var color = "orange";};
        return {
          title: $("#select_user option:selected").text(),
          backgroundColor: color
        };
      }
    });

    // initialize the calendar
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,today,next',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,listWeek'
      },
      buttonText: {
        today:    'Dnes',
        month:    'Mesiac',
        week:     'Týždeň',
        list:     'List'
      },
      themeSystem: 'bootstrap',
      locale: 'sk',
      firstDay: '1',
      nowIndicator: true,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      initialDate: "<?php echo $date_init; ?>",
      drop: function(info) {
        var status = info.draggedEl.dataset.status;

        if(status == 1){
          $.ajax({
              url:"app/ajaxquery_actor.php",
              method:"POST",
              data:{
                  return:'add_event',
                  user_id:$("#select_user").val(),
                  date:info.dateStr,
                  status:info.draggedEl.dataset.status
              }
          });
        }else if(status == 0){
          $("#modalonlydovod").modal("show");
          $("#only_user_id").val($("#select_user").val());
          $("#only_date").val(info.dateStr);
          $("#only_status").val(info.draggedEl.dataset.status);
        }else if(status == 2){
          $("#modaldovodaterminy").modal("show");
          $("#only_user_id2").val($("#select_user").val());
          $("#only_date2").val(info.dateStr);
          $("#only_status2").val(info.draggedEl.dataset.status);
        }else if(status == 3){
          $("#modalonlydovod").modal("show");
          $("#only_user_id").val($("#select_user").val());
          $("#only_date").val(info.dateStr);
          $("#only_status").val(info.draggedEl.dataset.status);
        }
      },
      eventClick: function(info){
        /* Po kliknutý na event otvorí modal a vloži do neho na sledujúce hodnoty */
        if(info.event._def.extendedProps.status == 'Free'){
          $("#info-name_all").val(info.event._def.title);
          $("#info-date_all").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#remove_event_date_item").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#info-status_all").val(info.event._def.extendedProps.status);
          $("#remove_event_id_item").val(info.event._def.publicId);
          $("#modalinfobox_all").modal("show");
        }else if(info.event._def.extendedProps.status == 'Busy'){
          $("#info-name_all").val(info.event._def.title);
          $("#info-dovod_all").val(info.event._def.extendedProps.description);
          $("#info-date_all").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#remove_event_date_item").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#info-status_all").val(info.event._def.extendedProps.status);
          $("#remove_event_id_item").val(info.event._def.publicId);
          $("#modalinfobox_all").modal("show");
        }else if(info.event._def.extendedProps.status == 'Maybe'){
          $("#info-name_all").val(info.event._def.title);
          $("#info-dovod_all").val(info.event._def.extendedProps.description);
          $("#info-date_all").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#remove_event_date_item").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#info-event_odkedy1_all").val(info.event._def.extendedProps.event_odkedy1);
          $("#info-event_dokedy1_all").val(info.event._def.extendedProps.event_dokedy1);
          $("#info-event_odkedy2_all").val(info.event._def.extendedProps.event_odkedy2);
          $("#info-event_dokedy2_all").val(info.event._def.extendedProps.event_dokedy2);
          $("#info-status_all").val(info.event._def.extendedProps.status);
          $("#remove_event_id_item").val(info.event._def.publicId);
          $("#modalinfobox_all").modal("show");
        }else if(info.event._def.extendedProps.status == 'Dontknowyet'){
          $("#info-name_all").val(info.event._def.title);
          $("#info-dovod_all").val(info.event._def.extendedProps.description);
          $("#info-date_all").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#remove_event_date_item").val(moment(info.event._instance.range.start).format("DD.MM.YYYY"));
          $("#info-status_all").val(info.event._def.extendedProps.status);
          $("#remove_event_id_item").val(info.event._def.publicId);
          $("#modalinfobox_all").modal("show");
        };
      },
      eventSources: [{
          url: 'app/api_actor.php',
          method: 'GET',
          extraParams: {
            users: [<?php if(isset($_POST['select_user_filter'])){echo ''.implode(',', $_POST['select_user_filter']).'';}else{echo 0;} ?>],
            api: '1',
            api_type: 'get_calendar_data_admin',
          }
      }]
    });
    calendar.render();
  });
</script>
<div class="container-fluid">
    <?php

  $user_id=$_GET['user_id'];

    ?>

<div class="row">

    <div class="col-lg-2 medzera">
<h5><?php echo $_SESSION['proj_name'] ?></h5>
      <strong>Označ svoje meno</strong>
        <select name="select_user" id="select_user" class="form-control" onchange="open_events();">
            <option value="0">Actors</option>

            <?php
            $users_list_arr = $con->query("SELECT `id`, `name` FROM `$myactors`where id=$user_id;");
            if(mysqli_num_rows($users_list_arr)){
                foreach($users_list_arr as $user){
                    echo '<option value='.$user['id'].'>'.$user['name'].'</option>';
                };
            };
            ?>
        </select>
        <div id="eventy_all" class="card">
            <div class="card-body">
                <div id="external-events">
                    <strong>Zvol možnosť</strong>
                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event event_free" data-status="1">
                        <div data-status="1" class="fc-event-main">mám voľno</div>
                    </div>
                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event event_busy" data-status="0">
                        <div data-status="0" class="fc-event-main">som zaneprazdnený</div>
                    </div>
                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event" data-status="2">
                        <div data-status="2" class="fc-event-main">môžem obmedzene</div>
                    </div>
                    <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event event_dontknowyet" data-status="3">
                        <div data-status="3" class="fc-event-main">ešte neviem</div>
                    </div>
                </div>

            </div>
        </div>

        <form hidden action="" method="POST">
          <select name="select_user_filter[]" id="select_user_filter" class="form-control" multiple>
              <?php
                  $users_list_arr = $con->query("SELECT `id`, `name` FROM `$myactors` ;");
                  if(mysqli_num_rows($users_list_arr)){
                      foreach($users_list_arr as $user){
                          echo '<option selected value='.$user['id'].'>'.$user['name'].'</option>';
                      };
                  };
              ?>
          </select>
          <button type="submit" class="btn btn-info btn-sm btn-block">Voľba</button>
        </form>
        <div>
            <a href="actors/thanks.php?id=<?php echo $user_id?>&pid=<?php echo $pid?>" class=" btn btn-outline-primary  btn-inline">Nahrat a ukoncit</a>
        </div>



    </div>
    <div class="col">
        <div id='calendar'></div>
    </div>
</div>
</div>

<!-- Modal na zadanie iba dôvodu -->
<div class="modal fade" id="modalonlydovod" tabindex="-1" aria-labelledby="modalonlydovodLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalonlydovodLabel">Pridanie eventu</h5>
        <button type="button" class="close" onclick="hide_modal();" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/ajaxquery_actor.php">
        <input type="hidden" name="user_id" id="only_user_id">
        <input type="hidden" name="return" value="add_event">
        <input type="hidden" name="date" id="only_date">
        <input type="hidden" name="status" id="only_status">
          <div class="form-group row">
            <label class="col-2 col-form-label" for="dovod">Dôvod</label>
            <div class="col-10">
              <input name="dovod" type="text" class="form-control">
            </div>
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="hide_modal();">Close</button>
            <button type="submit" class="btn btn-success">Odoslať</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal na zadanie dôvodu a dvoch termínov -->
<div class="modal fade" id="modaldovodaterminy" tabindex="-1" aria-labelledby="modaldovodaterminyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaldovodaterminyLabel">Pridanie eventu</h5>
        <button type="button" class="close" onclick="hide_modal();" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="app/ajaxquery_actor.php">
        <input type="hidden" name="user_id" id="only_user_id2">
        <input type="hidden" name="return" value="add_event">
        <input type="hidden" name="date" id="only_date2">
        <input type="hidden" name="status" id="only_status2">
          <div class="form-group row">
            <label class="col-2 col-form-label" for="dovod">Dôvod</label>
            <div class="col-10">
              <input name="dovod" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
            <label for="dovod">Termín 1 od</label>
              <input name="event_odkedy1" class="form-control time_select" type="text" placeholder="00:00" readonly="" aria-haspopup="true" aria-expanded="true" aria-readonly="false">
            </div>
            <div class="col-6">
              <label for="dovod">Termín 1 do</label>
              <input name="event_dokedy1" class="form-control time_select" type="text" placeholder="00:00" readonly="" aria-haspopup="true" aria-expanded="true" aria-readonly="false">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
            <label for="dovod">Termín 2 od</label>
              <input name="event_odkedy2" class="form-control time_select" type="text" placeholder="00:00" readonly="" aria-haspopup="true" aria-expanded="true" aria-readonly="false">
            </div>
            <div class="col-6">
              <label for="dovod">Termín 2 do</label>
              <input name="event_dokedy2" class="form-control time_select" type="text" placeholder="00:00" readonly="" aria-haspopup="true" aria-expanded="true" aria-readonly="false">
            </div>
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="hide_modal();">Close</button>
            <button type="submit" class="btn btn-success">Odoslať</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal info dôvod a aj časy -->
<div class="modal fade" id="modalinfobox_all" tabindex="-1" aria-labelledby="modalinfobox_allLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalinfobox_allLabel">Informácie o evente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group row">
            <div class="col-6">
              <label for="info-name">Meno</label>
              <input id="info-name_all" type="text" readonly class="form-control">
            </div>
            <div class="col-6">
              <label for="info-dovod">Dôvod</label>
              <input id="info-dovod_all" type="text" readonly class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
            <label for="dovod">Status</label>
              <input id="info-status_all" type="text" readonly class="form-control">
            </div>
            <div class="col-6">
            <label for="dovod">Dátum</label>
              <input id="info-date_all" type="text" readonly class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
            <label for="dovod">Termín 1 od</label>
              <input id="info-event_odkedy1_all" type="text" readonly class="form-control">
            </div>
            <div class="col-6">
              <label for="dovod">Termín 1 do</label>
              <input id="info-event_dokedy1_all" type="text" readonly class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
            <label for="dovod">Termín 2 od</label>
              <input id="info-event_odkedy2_all" type="text" readonly class="form-control">
            </div>
            <div class="col-6">
              <label for="dovod">Termín 2 do</label>
              <input id="info-event_dokedy2_all" type="text" readonly class="form-control">
            </div>
          </div>
      </div>
          <div class="modal-footer">
            <form action="app/ajaxquery_actor.php" method="POST">
              <input type="hidden" name="return" value="delete_event">
              <input type="hidden" id="remove_event_id_item" name="id">
              <input type="hidden" id="remove_event_date_item" name="date">
              <button type="submit" class="btn btn-danger" onclick="if(confirm('Naozaj chcete event vymazať?')){}else{return false;};">Vymazať</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
    </div>
  </div>
</div>

<script>

/* Otvoriť zoznam eventov po vybratí mena */
   function open_events() {
        var selected_user = $("#select_user").val();

        if(selected_user > 0){
            $("#eventy_all").show();
        }else{
            $("#eventy_all").hide();
        }
    };

    /* Schovanie modalov */

  function hide_modal(){
    $('#modalonlydovod').modal('hide');
    $('#modaldovodaterminy').modal('hide');
    location.reload();
  }

  /* vyberač dátumov v modale pri pridaný eventu Mayber */

  $('.time_select').pickatime({
    clear: 'vymazať',
    format: 'HH:i',
    formatLabel: 'HH:i',
    formatSubmit: 'HH:i',
    interval: 30
  });


</script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</body>
</html>
