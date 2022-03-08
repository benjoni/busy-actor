<!-- BEGIN: Main Menu-->
<div class="main-menu  menu-fixed  menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="home.php">

                    <h3 class=" mb-0">Busy Actor</h3>
                </a></li>
            <li class=" nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Vstupy</span>
            </li>

            <li class=" hidden nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Tables</span></a>
                <ul class="menu-content">
                    <li class="hidden"><a href="users.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Users</span></a>
                    </li>
                    <li><a href="actor.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Actors</span></a>
                    </li>
                    <li><a href="scenes.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Scenes</span></a>
                    </li>
                    <li><a href="project.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Project</span></a>
                    </li>
                    <li><a href="budies.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Spolupracovnici</span></a>
                    </li>

                </ul>

                // nastavenie permissions
                <?php
                session_start();
                switch ($_SESSION['a1'] ){case "": $a1="hidden";break;default: $a1="";break;}
                switch ($_SESSION['b1'] ){case "": $b1="hidden";break;default: $b1="";break;}
                switch ($_SESSION['c1'] ){case "": $c1="hidden";break;default: $c1="";break;}
                switch ($_SESSION['d1'] ){case "": $d1="hidden";break;default: $d1="";break;}
                switch ($_SESSION['status'] ){case "admin": $stat="";break;default: $stat="hidden";break;}
                ?>

            <li class=" <?php echo $stat?> nav-item"><a href="users.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Users</span></a>
            </li>
            <li class=" <?php echo $a1?> nav-item"><a href="actor.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Herci</span></a>
            </li>
            <li class=" <?php echo $b1?> nav-item"><a href="scenes.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Obrazy</span></a>
            </li> <li class=" <?php echo $c1?> nav-item"><a href="admin_calendar.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Zaneprázdnenosť</span></a>
            </li>
            <li class=" nav-item"><a href="project.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Projekty</span></a></li>
            <li class=" <?php echo $d1?> nav-item"><a href="tabulka.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">vypocet</span></a></li>
            <li class=" <?php echo $stat?> nav-item"><a href="budies.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">spolupracovnici</span></a></li>
            <li class="  nav-item"><a href="odlozene/logout.php"><i class="feather icon-droplet"></i><span class="menu-title" data-i18n="Colors">Log out</span></a></li>
            <li class="  hidden navigation-header"><span>Forms &amp; Tables</span>
            </li>


            <li class="disabled hidden nav-item"><a href="#"><i class="feather icon-eye-off"></i><span class="menu-title" data-i18n="Disabled Menu">Disabled Menu</span></a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
