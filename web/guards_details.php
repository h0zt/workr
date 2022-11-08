<?php
    $guard_id =$_GET['id'];
    include('includes/process.php');
    $output = new OutPut();
    $guard = $output->oneGuardProfile($guard_id);

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rock Security Services | Details</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="dashboard.php">
                   <?php include('includes/logo.php'); ?>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">

                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <a href="guards.php">
                                <span class=""><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="resources/profile.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                       <a class="has-arrow" href="dashboard.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Reports</span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="schedule_approval.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Schedules</span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="customers.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Customers </span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="guards.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Guards</span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="inventory.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Equipments</span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="guards_salaries.php" >
                           <i class=" menu-icon"></i><span class="nav-text">Salaries</span>
                       </a>
                   </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Guards</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col"  >
                        <div class="card" style="position:sticky; top: 20vh;">
                            <div class="card-body">
                                <ul class="mt-4 list-group">
                                    <li class="list-group-item"><b><?=$guard['firstname']?> <?=$guard['lastname']?></b></li>
                                    <li class="list-group-item"><?=$guard['identification']?></li>
                                    <li class="list-group-item"><?=$guard['contact']?></li>
                                    <li class="list-group-item"><?=$guard['education']?></li>
                                    <li class="list-group-item"><?=$guard['certificate']?></li>
                                    <li class="list-group-item"><?=$guard['height']?></li>
                                    <li class="list-group-item"><?=$guard['information']?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <img style="width:100%"
                                src="uploads/<?=$guard['image']?>" alt="profile-picture">
                                <p><?=$guard['firstname']?> ~ <?=$guard['identification']?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="text/javascript" src="./resources/jquery-3.6.0.min.js"></script>
    <script type="module" src="./resources/initfirebase.js"></script>

    <script>
        (function($) {
        "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "fixed", //have two options, "static" and "fixed"
                headerPosition: "fixed", //have two options, "static" and "fixed"
                containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);
    </script>

</body>

</html>