
<?php
require_once "connection.php";
include "functions.php";

$myinfo=$_SESSION['project_id']."info";

switch ($_SESSION['a1'] ){case "": $a1="hidden";break;default: $a1="";break;}
switch ($_SESSION['b1'] ){case "": $b1="hidden";break;default: $b1="";break;}
switch ($_SESSION['c1'] ){case "": $c1="hidden";break;default: $c1="";break;}
switch ($_SESSION['d1'] ){case "": $d1="hidden";break;default: $d1="";break;}
switch ($_SESSION['status'] ){case "admin": $stat="";break;default: $stat="hidden";break;}
?>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <h3 class="brand-text mb-0"><?php echo $_SESSION['project_name'] ?> </h3>

                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="<?php echo $stat?> nav-item d-none d-lg-block"><a class="nav-link" href="users.php" data-toggle="tooltip" data-placement="top" title="Users"><i class="ficon feather icon-users"></i></a></li>
                        <li class="<?php echo $b1?> nav-item d-none d-lg-block"><a class="nav-link" href="scenes.php" data-toggle="tooltip" data-placement="top" title="Obrazy"><i class="ficon feather icon-server"></i></a></li>
                        <li class="<?php echo $a1?> nav-item d-none d-lg-block"><a class="nav-link" href="actor.php" data-toggle="tooltip" data-placement="top" title="Herci"><i class="ficon feather icon-users"></i></a></li>
                        <li class=" nav-item d-none d-lg-block"><a class="nav-link" href="project.php" data-toggle="tooltip" data-placement="top" title="Projekty"><i class="ficon feather icon-grid"></i></a></li>
                        <li class="<?php echo $c1?> nav-item d-none d-lg-block"><a class="nav-link" href="admin_calendar.php" data-toggle="tooltip" data-placement="top" title="zaneprazdnenost"><i class="ficon feather icon-calendar"></i></a></li>
                        <li class="hidden nav-item d-none d-lg-block"><a class="nav-link" href="busy.php" data-toggle="tooltip" data-placement="top" title="Bussy"><i class="ficon feather icon-calendar"></i></a></li>

                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">
                    <?php

                    // zisti najnovsi click

                    $sql22="select * from $myinfo where status=0  order by id desc ";
                    $run22=mysqli_query($con,$sql22);
                    $row22=mysqli_fetch_assoc($run22);
                 $najnovsi= $row22['date'];

                   //najnovsie spravy ktore su novsie ako posledny click

                 $sql33="select * from $myinfo where date > $najnovsi and status between 1 and 10";echo"<br>";
                    $run33=mysqli_query($con,$sql33);


                     $pocet_info=mysqli_num_rows($run33);


                    ?>
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-sk"></i><span class="selected-language">SK</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-sk"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>


                    <li class=" dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class=" <?php switch ($pocet_info){
                                                                                                                                                                                                                            case "0":echo"hidden";break;
                                                                                                                                                                                                                            defauult:echo" ";break;
                                                                                                                                                                                                                            }?>
                        badge badge-pill badge-primary badge-up"><?php echo $pocet_info?></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white"><?php echo $pocet_info?> New</h3><span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <?php

                            // include ("pomocne/connection.php");
                            $sql="select * from $myinfo where status between 1 and 10 order by date desc ";
                            $run=mysqli_query($con,$sql);
                          //  $_SESSION["pocet_hercov"] = mysqli_num_rows($run);
                            ?>
                            <?php
                            while ($row=mysqli_fetch_assoc($run))
                            {
                            switch ($row['status']) {
                                case"1":
                                    $text = "Pridal zaneprazdnenost do svojho kalendara";
                                    $farba = "primary";
                                    break;
                                case"2":
                                    $text = "bol vymazany z naplanovaneho dna ";
                                    $farba = "danger";
                                    break;
                            }
                                    ?>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 <?php echo $farba?>"></i></div>
                                        <div class="media-body">

                                            <h6 class="<?php echo $farba?> media-heading"><?php echo $row['name']." ".$text." ".$row['hodnota']?></h6><small class="hidden notification-text"> <?php echo $text?></small>
                                        </div><small>
                                            <time class="media-meta" datetime="<?php echo $row['date']?>"><?php echo(date("H:i  d-m-Y",$row['date'])) ?></time></small>
                                    </div>
                               </li>
                            <li class="hidden dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a></li>
                            <?php };
                           info("click", "56","0");
                            ?>
                        </ul>
                    </li>


                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">



                                </span>
                            </div>
                            <span class="user-name text-bold-600"><?php echo $_SESSION['user_name']?></span>
                        </a>
                        <div class=" dropdown-menu dropdown-menu-right"><a class="dropdown-item hidden" href="#"><i class="feather icon-user"></i> Edit Profile</a><a class="hidden dropdown-item" href="#"><i class="feather icon-mail"></i> My Inbox</a><a class="hidden dropdown-item" href="#"><i class="feather icon-check-square"></i> Task</a><a class="hidden dropdown-item" href="#"><i class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="odlozene/logout.php"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->