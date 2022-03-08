


<?php

include("../pomocne/start&style.php");
include("../pomocne/connection.php");
include("../pomocne/functions2.php");
echo $budy_mail=$_SESSION['budy_email'];
echo $budy_id= $_SESSION['budy_id'];
echo $budy_name=$_SESSION['budy_name'];


if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
  // $user_email = $_POST['user_email'];
    $password = md5($_POST['password']);
    $confpassword = md5($_POST['confpassword']);



    if (!empty($user_name)  && !empty($password) && $password === $confpassword) {


        //save to database
echo $sql8 = "update users set user_name='$user_name',password='$password' 
where user_id='$budy_id'";
include("../pomocne/connection.php");
mysqli_query($con,$sql8);







        session_destroy();


       header("Location: ../odlozene/user-login.php");
      die;
   } else {

     header("Location: budy-register.php");
    }
}
?>

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<!-- END: Custom CSS-->

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="../app-assets/images/pages/register.jpg" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>

                                        </div>
                                        <p class="px-2">Fill the below form to create a new buddy account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                    <div class="form-label-group">
                                                        <input type="text" name="user_name" class="form-control" value="<?php echo $budy_name;?>" required>
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" name="user_email" class="form-control" value="<?php echo $budy_mail;?>" disabled>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" required>
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked disabled>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                                                </form>
                                            </div>
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
    <!-- END: Content-->


    <?php include("end.php")


    ?>

</body>
<!-- END: Body-->

</html>