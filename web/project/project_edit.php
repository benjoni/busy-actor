<?php
include("../pomocne/start&style.php");

$myproject=$_SESSION['user_id']."project";
$id= $_GET['id'];
$sql3="select * from $myproject where id=$id";
$run2=mysqli_query($con,$sql3);
$data=mysqli_fetch_assoc($run2);

$project_name=$data['project_name'];
$production = $data['production'];
$kind = $data['kind'];
$info = $data['info'];
$project_id = $data['project_id'];



?>

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/pickers/pickadate/pickadate.css">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-user.css">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">


<?php
//include("../pomocne/lista_horna.php");
//include("../pomocne/main-menu.php");


?>
<!-- END: Custom CSS-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i class="feather icon-film mr-25"></i><span class="d-none d-sm-block">Project Info</span>
                                    </a>
                                </li>
                                <li class=" hidden nav-item">
                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Categories</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->

                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->

                                    <form action="project_update_sql.php" method="POST">
                                        <div class="row">

                                            <div class="col-6 ">

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="inputName">Project Name</label>
                                                        <input type="text" name="project_name" class="form-control" value="<?php echo $project_name?>"  >

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">Kind</label>
                                                    <select class="form-control" name="kind" id="basicSelect">
                                                        <option><?php echo $kind?></option>
                                                        <option>Fiction</option>
                                                        <option>Documentary</option>
                                                        <option>Cartoon</option>
                                                        <option>Series</option>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="col-6 ">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Production Company</label>
                                                        <input type="text" name="production" class="form-control" value="<?php echo $production?>" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Short Info</label>
                                                        <input type="text" name="info" class="form-control" value="<?php echo $info?>">
                                                    </div>
                                                </div>

                                                <div class="hidden form-group">
                                                    <div class="controls">
                                                        <label>id</label>
                                                        <input type="text" name="id" class="form-control" value="<?php echo $id?>" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class=" hidden Stable-responsive border rounded px-1 ">
                                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
                                                    <table class="table table-borderless">
                                                        <thead>
                                                        <tr>
                                                            <th>Module</th>
                                                            <th>Read</th>
                                                            <th>Write</th>
                                                            <th>Create</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Users</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox2" class="custom-control-input"><label class="custom-control-label" for="users-checkbox2"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox3" class="custom-control-input"><label class="custom-control-label" for="users-checkbox3"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox4" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox4"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Articles</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox5" class="custom-control-input"><label class="custom-control-label" for="users-checkbox5"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox6" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox6"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox7" class="custom-control-input"><label class="custom-control-label" for="users-checkbox7"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox8" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox8"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Staff</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox9" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox9"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox10" class="custom-control-input" checked>
                                                                    <label class="custom-control-label" for="users-checkbox10"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox11" class="custom-control-input"><label class="custom-control-label" for="users-checkbox11"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox12" class="custom-control-input"><label class="custom-control-label" for="users-checkbox12"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">

                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button>
                                                <a href="project_delete_sql.php?project_id=<?php echo $project_id?>" class="btn btn-outline-danger d-none d-sm-block" >Remove</a>

                                            </div>
                                        </div>
                                    </form>
                                    <?php

                                    ?>
                                    <!-- users edit account form ends -->
                                </div>
                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form novalidate>
                                        <div class="row mt-1">
                                            <div class="col-12 col-sm-6">
                                                <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Birth date</label>
                                                                <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" data-validation-required-message="This birthdate field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Mobile</label>
                                                        <input type="text" class="form-control" value="" placeholder="Mobile number here..." data-validation-required-message="This mobile number is required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" required placeholder="Website here..." value="" data-validation-required-message="This Website field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <select class="form-control" id="users-language-select2" multiple="multiple">
                                                        <option value="English" >English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French">French</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="German">German</option>
                                                        <option value="Arabic" >Arabic</option>
                                                        <option value="Sanskrit">Sanskrit</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio"  value="false">
                                                                    <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                    Male
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" value="false">
                                                                    <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                    Female
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" value="false">
                                                                    <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                    Other
                                                                </div>
                                                            </fieldset>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Options</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck1" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Email</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck2" id="customCheck2">
                                                                    <label class="custom-control-label" for="customCheck2">Message</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3">
                                                                    <label class="custom-control-label" for="customCheck3">Phone</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address Line 1</label>
                                                        <input type="text" class="form-control" value="" required placeholder="Address Line 1" data-validation-required-message="This Address field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address Line 2</label>
                                                        <input type="text" class="form-control" required placeholder="Address Line 2" data-validation-required-message="This Address field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Postcode</label>
                                                        <input type="text" class="form-control" required placeholder="postcode" value="" data-validation-required-message="This Postcode field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" required value="" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>State</label>
                                                        <input type="text" class="form-control" required value="" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" required value="" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

            <?php

            ?>

        </div>
    </div>
</div>



<!-- BEGIN: Vendor JS-->
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../app-assets/js/core/app-menu.js"></script>
<script src="../app-assets/js/core/app.js"></script>
<script src="../app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../app-assets/js/scripts/pages/app-user.js"></script>
<script src="../app-assets/js/scripts/navs/navs.js"></script>
<script src="../app-assets/js/scripts/modal/components-modal.js"></script>

<script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../app-assets/vendors/js/extensions/polyfill.min.js"></script>

<script src="../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
<!-- END: Page JS-->
<script type="text/javascript">
    $(document).ready(function() {
        $('.category').select2();
    });
</script>

</body>
<!-- END: Body-->

</html>
