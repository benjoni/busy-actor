
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
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
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END: Custom CSS-->

<?php
include ("pomocne/lista_horna.php");
include("pomocne/main-menu.php");

?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Users</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">



<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th># Projects</th>
                                    <th># Buddies</th>
                                    <th>User ID</th>
                                    <th>Registration</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                             <?php   $query = "select * from users where status='admin'or status='user' " ;
                                $run = mysqli_query($con, $query);
                                ?>
                                <tbody>
                                <?php
                                while($user_data = mysqli_fetch_assoc($run)){
                                    ?>
                                    <tr>

                                        <td><?php echo $user_data['user_name']?> </td>
                                        <td><?php echo $user_data['user_email']?> </td>

                                        <td>
                                           <?php
                                           $data_project=$user_data['user_id']."project";
                                           $projekty= "select * from $data_project";
                                                   $run2 = mysqli_query($con, $projekty);
                                                   $pocet_proj = mysqli_num_rows($run2);



                                                echo $pocet_proj?>
                                        </td>
                                        <td>
                                            <?php
                                            $boss=$user_data['user_id'];
                                            $budd= "select * from users where boss_id=$boss ";
                                            $run3 = mysqli_query($con, $budd);
                                            $pocet_buddy = mysqli_num_rows($run3);



                                            echo $pocet_buddy?>
                                        </td>
                                        <td><?php echo $user_data['user_id']?> </td>
                                        <td><?php echo $user_data['reg_date']?> </td>
                                        <td class="product-action">
                                            <a href="project/user_delete_sql.php?user_id=<?php echo $user_data['user_id']?>" class="feather icon-x"></a>
                                        </td>
                                    </tr>
                                <?php }

                               ?>




                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
    </div>
</div>

<?php
include("footer.php")
?>

<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>




