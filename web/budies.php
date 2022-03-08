<?php



?>

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
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
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END: Custom CSS-->
<?php


include("pomocne/lista_horna.php");
include("pomocne/main-menu.php");
$myactors=$_SESSION['project_id']."actors";
$boss=$_SESSION['user_id'];
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">
            <div class="row">

            </div>
            <!-- Zero configuration table -->
            <section id="basic-datatable" >
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <?php
                               // include ("pomocne/connection.php");
                                $sql="select * from users where boss_id=$boss";
                                $run=mysqli_query($con,$sql);

                                ?>

                                    <h3 class="content-header-title float-left mb-0">Spolupracovnici</h3>


                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle mr-1" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                        <a class="dropdown-item" href="budies/budies_add.php">Add new Buddy</a>
                                        <a class="dropdown-item" href="pomocne/import_actors.php">Import buddy from CSV</a>
                                        <form class="form-horizontal" action="pomocne/functions.php" method="post" name="upload_excel_actors"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div >
                                                    <input type="submit" name="Export_actors" class="dropdown-item" value="Export Actors to CSV"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">



                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Meno</th>
                                                <th>Email</th>
                                                <th>Akcia</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($row=mysqli_fetch_assoc($run))
                                            {
                                                ?>
                                                <tr>

                                                    <td><h6 class=" float-left mb-0"><?php echo $row['id']?></h6></td>

                                                    <td><h6 class=" float-left mb-0"><?php echo $row['user_name']?></h6></td>
                                                    <td><?php echo $row['user_email']?></td>

                                                    <td class="product-action">
                                                        <a href="budies/mailto2buddy.php?id=<?php echo $row['id']?>&user_email=<?php echo $row['user_email']?>" class="feather icon-mail"></a>
                                                        <a href="budies/budies_edit.php?id=<?php echo $id=$row['id']?>" class="feather icon-edit"></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->

        </div>
    </div>
</div>
<!-- END: Content--><!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="app-assets/js/scripts/datatables/datatable.js"></script>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>