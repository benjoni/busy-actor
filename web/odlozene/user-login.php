
<?php

session_start();
include("../pomocne/connection.php");
include("../pomocne/functions2.php");




if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);


            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password)
                {

                    //zistime ci je to buddy alebo user podla toho nastavime user_id kvoli projektu
                    switch ($user_data['status']){
                        case "buddy":$production_id=$user_data['boss_id'];
                        break;
                        case "user":$production_id=$user_data['user_id'];
                            break;
                        case "admin":$production_id=$user_data['user_id'];
                            break;
                    }


                    $_SESSION['production_id'] =$production_id;
                    $_SESSION['user_id'] =$user_data['user_id'];
                    $_SESSION['user_name'] = $user_data['user_name'];
                    $_SESSION['user_email'] = $user_data['user_email'];
                    $_SESSION['status'] = $user_data['status'];
                    $_SESSION['a1'] = $user_data['a1'];
                    $_SESSION['a2'] = $user_data['a2'];
                    $_SESSION['a3'] = $user_data['a3'];
                    $_SESSION['b1'] = $user_data['b1'];
                    $_SESSION['b2'] = $user_data['b2'];
                    $_SESSION['b3'] = $user_data['b3'];
                    $_SESSION['c1'] = $user_data['c1'];
                    $_SESSION['c2'] = $user_data['c2'];
                    $_SESSION['c3'] = $user_data['c3'];
                    $_SESSION['d1'] = $user_data['d1'];
                    $_SESSION['d2'] = $user_data['d2'];
                    $_SESSION['d3'] = $user_data['d3'];





//                    if ($stat=="admin"){
//                        $_SESSION['user_status'] = "admin";
//                    }elseif ($stat=="user"){
//                        $_SESSION['user_status'] = "hidden";
//                    }


                   header("Location: ../project.php");
                    die;
                }else{
                    echo "<script type=\"text/javascript\">
                    alert(\"Wrong Password\");
                    window.location = \"user-login.php\"
                     </script>";
                       }
            }else{
                        echo "<script type=\"text/javascript\">
                    alert(\"Wrong Name or Password\");
                    window.location = \"user-login.php\"
                  </script>";
                  }
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
benjoni.busy-actor.com
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<!-- END: Custom CSS-->



<!-- BEGIN: Body-->
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
                    <div class="col-xl-12 col-12 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="../app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="user_name" placeholder="Name" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="register.php" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class=" login-footer">
                                            <div class="divider">
                                                <div class="hidden divider-text">OR</div>
                                            </div>
                                            <div class="hidden footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
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


<?php include("end.php") ?>

</body>
<!-- END: Body-->

</html>