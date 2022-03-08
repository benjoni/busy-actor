


<?php

include("../pomocne/start&style.php");
include("../pomocne/connection.php");
include("../pomocne/functions2.php");
 $mail=$_SESSION['mail'];
 $name= $_SESSION['name'];

// ci uz existuje s takym mailom


//read from database
$query11 = "select * from users where user_mail = '$mail' limit 1";
$result = mysqli_query($con, $query11);


if($result && mysqli_num_rows($result) > 0)
{
    echo "<script type=\"text/javascript\">
                    alert(\"User s takym mailom uz existuje\");
                    window.location = \"user-register.php\"
                  </script>";
echo "ttttttt";

}else{



//ci uz existuje end

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
   // $user_email = $_POST['user_email'];
    $password = md5($_POST['password']);
    $confpassword = md5($_POST['confpassword']);
    $newuser_id = random_num(10);
    $newproject=$newuser_id."project";




    if (!empty($user_name)  && !empty($password) && $password === $confpassword) {

// nastavi ci je admin alebo user
        if ($user_name=="benjoni") {
            $status="admin";}
        else{
            $status="user";}

        //save to database
      echo  $sql = "INSERT INTO users  SET
                user_id='$newuser_id',
                user_name='$user_name',
                password='$password',
                status='$status',
                user_email='$mail'";


        mysqli_query($con, $sql);

    echo    $sqlproject="CREATE TABLE $newproject (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    project_name VARCHAR(200)  NULL,
                    production VARCHAR(200)  NULL,
                    kind VARCHAR(50) null ,
                    info VARCHAR(5000)  NULL,
                   status VARCHAR(50) null ,
                    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    project_id VARCHAR(5000) null
                     
                     )";

       mysqli_query($con, $sqlproject);






        session_destroy();


       header("Location: user-login.php");
      die;
   } else {

     header("Location: user-register.php");
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
                                        <p class="px-2">Fill the below form to create a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                    <div class="form-label-group">
                                                        <input type="text" name="user_name" class="form-control"  value="<?php echo $name;?>" required>
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" name="user_email" class="form-control" value="<?php echo $mail;?>" disabled>
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
                                                    <a href="../nepotrebujem/auth-login.php" class=" hidden btn btn-outline-primary float-left btn-inline mb-50">Login</a>
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


    <?php include("end.php") ?>

</body>
<!-- END: Body-->

</html>