<?php   


?>

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
$myscene=$_SESSION['project_id']."scenes";
$status= $_GET['status'];
?>


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-0">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h3 class="content-header-title float-left mb-2">Obrazy</h3>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle mr-1" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                <a class="dropdown-item" href="scenes/scenes_add.php">Add new scene</a>
                                <a class="dropdown-item" href="pomocne/import_scenes.php">Import scenes from CSV</a>
                                <form class="form-horizontal" action="pomocne/functions.php" method="post" name="upload_excel"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div >
                                            <input type="submit" name="Export" class="dropdown-item" value="Export to CSV"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="table-responsive">
                    <?php
                   // include ("pomocne/connection.php");
                    $sql55="select * from $myscene where status='$status' order by scene ";
                    $run=mysqli_query($con,$sql55);




                    ?>
                    <table class="table data-thumb-view">
                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row=mysqli_fetch_assoc($run))
                        {
                            ?>
                            <tr>



                                <td>
                                    <div class="text-center">
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
                                        <span class="font-medium-1  text-100"><?php echo $row['cast_id']?></span>

                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="font-medium-1 text-bold-500 text-100"><?php echo $row['scriptday']?></span>
                                        <p class="mb-0 text-bold-200 "><?php echo $row['pagescount']?></p>
                                    </div>
                                </td>
                                <td lass="font-medium-1 text-bold-100 text-100" ><?php echo $row['notes']?></td>
                                <td class="product-action">
                                    <?php
                                    switch ($row['status']){
                                        case"new": $badgecolor="warning";$icon="icon-alert-circle ";break;
                                        case"incalendar": $badgecolor="primary";$icon="icon-check-circle ";break;
                                        case"booked": $badgecolor="success";$icon=" icon-calendar";break;
                                        case"done": $badgecolor="secondary";$icon="icon-film ";break;
                                        case"bad": $badgecolor="danger";$icon="icon-alert-circle ";break;
                                    };

                                    ?>
                                    <div class="badge badge-pill badge-<?php echo$badgecolor?> mr-1 mb-1">
                                        <i class="feather <?php echo$icon?>"></i>
                                    </div>
                                    <a href="scenes/scene_edit.php?id=<?php echo $id=$row['id']?>" class="feather icon-edit"></a>

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