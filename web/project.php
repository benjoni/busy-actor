<?php
include ("pomocne/start&style.php");
unset($_SESSION['project_name']);
 $_SESSION['production_id'] ;echo"<br>";
  $_SESSION['user_id'];
 $_SESSION['user_name'];

 $myproject=$_SESSION['production_id']."project";
$status=$_SESSION['status'];
switch ($status){
    case "buddy":$stat="hidden";
    break;
    default:$stat="";
    break;
}

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
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/file-uploaders/dropzone.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/data-list-view.css">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-2">Projekty</h2>
                            <div class="col-12 d-flex mt-2 px-0">
                                <a href="project/project_add.php" class="<?php echo $stat?> btn btn-outline-primary d-none d-sm-block">Nový Projekt</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body ">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <?php
                   // include ("pomocne/connection.php");
                    $sql="select * from $myproject";
                    $run=mysqli_query($con,$sql);
                    ?>
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view ">

                            <tbody>
                            <?php
                            while ($row=mysqli_fetch_assoc($run))
                            {
                            ?>
                                <tr >

                                    <td>
                                        <h2 class=" font-medium-6 text-bold-600 text-100"><?php echo $row['project_name']?></h2>
                                        <h3 class="font-medium-1 text-bold-500 text-100"><?php echo $row['production']?></h3>
                                        <div class="progress progress-bar-secondary">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                        </div>


                                    </td>



                                    <td>

                                        <div class="avatar-content  ">
                                            <i class="feather icon-edit text-secondary  font-medium-5"></i>
                                        </div>
                                        <h3 class="font-medium-1 text-bold-500 text-100"><?php echo $row['date']?></h3>
                                        <div class="avatar-content  ">
                                            <i class="feather icon-film text-secondary  font-medium-5"></i>
                                        </div>
                                        <h3 class="font-medium-1 text-bold-500 text-100"><?php echo $row['kind']?></h3>


                                    </td>
                                    <td>
                                        <div class="col-12 d-flex mt-1 px-0">
                                            <h3 class="font-medium-1 text-bold-500 text-100"><?php echo $row['info']?></h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12 d-flex mt-2 px-0">
                                            <a href="odlozene/preskok_na_index.php?project_name=<?php echo $row['project_name']?>&&project_id=<?php echo $row['project_id']?>" class="btn btn-outline-dark d-none d-sm-block">Go</a>
                                        </div>
                                    </td>




                                    <td class="<?php echo $stat?> product-action">
                                        <a href="project/project_edit.php?id=<?php echo $id=$row['id']?>" class="feather icon-edit"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
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

</body>
<!-- END: Body-->

</html>