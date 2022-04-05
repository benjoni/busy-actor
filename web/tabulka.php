<?php   


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="assets/js/jquery-3.6.0.min.js"></script>
<link href='assets/fullcalendar/lib/main.css' rel='stylesheet' />
<script src='assets/fullcalendar/lib/main.js'></script>

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/file-uploaders/dropzone.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/data-list-view.css">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<?php
include ("pomocne/lista_horna.php");
include("pomocne/main-menu.php");
session_start();
$myscene=$_SESSION['project_id']."scenes";
$myvypocet=$_SESSION['project_id']."vypocet";
?>


<!-- BEGIN: Content-->
<div class="app-content content">

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
              url:"app/ajaxquery.php",
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
          url: 'app/api.php',
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


    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-0">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h3 class="content-header-title float-left mb-2">Obrazy v dni</h3>


                    </div>


                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="table-responsive ">
                    <?php
                   // include ("pomocne/connection.php");
                    $sql="select * from $myvypocet order by date";
                    $run=mysqli_query($con,$sql);




                    ?>
                    <table class=" data-thumb-view ">
                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row=mysqli_fetch_assoc($run)){
$p="";
                           switch ($row['intext']) {
                               case "INT":
                                   $dn = 'warning';
                                   break;
                               case "EXT":
                                   $dn = 'success';
                                   break;
                               case "ATELIER":
                                   $dn = 'primary ';
                                   break;
                               default:
                                   $dn = 'warning';
                                   break;
                                                     }

                        switch ($row['plan_date']) {
                            case "2":
                                $p = 'bg-lighten-5';
                                break;

                        }



                        switch ($row['daynight']){
                            case "DAY": $ie='white';
                                break;
                            case "NIGHT": $ie='dark';
                                break;
                            default:
                                $ie = 'white';
                                break;

                           }
                            ?>
                            <tr class="bg-<?php echo $dn?> <?php echo $p?> text-<?php echo $ie?>">

                                <td>

                                    <div class="text-center ">
                                        <span class=" font-medium-5 text-bold-500  colors-container"> <?php echo date('d-m',  $row['date'])?></span>
                                    </div>


                                </td>

                                <td>
                                    <div class="text-center  ">
                                        <span class="font-medium-5 text-bold-500"> <?php echo $row['scene']?></span>
                                    </div>



                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="font-medium-2 text-bold-500 "><?php echo $row['intext'] ?></span>
                                        <p class="font-medium-2 mb-0 text-bold-400 "><?php echo $row['daynight'] ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="font-medium-1 text-bold-500 text-100"><?php echo $row['filmset']?></span>
                                        <p class="mb-0 text-bold-200 "><?php echo $row['synopsis']?></p>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="font-medium-1  text-100"><?php echo $row['cast']?></span>

                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="font-medium-1 text-bold-500 text-100"><?php echo $row['scriptday']?></span>
                                        <p class="mb-0 text-bold-200 "><?php echo $row['pagescount']?></p>
                                    </div>
                                </td>
                                <td class="font-small-1  text-50" ><?php echo $row['zavazok']?></td>
                                <td>
                                    <?php
                                    switch ($row['plan_date']){
                                        case $row['date']:$vyhybka="1"; $button="zrus";break;
                                        case "0":$vyhybka="0"; $button="plan";break;
                                        case "2":$vyhybka="0"; $button="plan";break;
                                    }

                                    ?>
                                        <a href=" plan.php?plan_date=<?php echo $row['date']?>&scene=<?php echo $row['scene']?>&vyhybka=<?php echo $vyhybka?>" class=" btn btn-outline-dark d-none d-sm-block" ><?php echo $button?></a>
                                    </div>
                                </td>

                            </tr>



                            <?php
                        }
                        ?>



                        </tbody>
                    </table>
                </div>
                <!-- dataTable ends -->
                <!-- dataTable ends -->


            </section>
            <!-- Data list view end -->

        </div>
    </div>
 <div class="col">
        <div id='calendar'></div>
    </div>
</div>
<!-- END: Content-->



<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="app-assets/js/scripts/ui/data-list-view.js"></script>
<!-- END: Page JS-->

<script type="text/javascript">
    $(document).ready(function() {
        $('.category').select2();
    });
</script>

</body>
<!-- END: Body-->

</html>
