<?php
    include('includes/process.php');
    $output = new OutPut();
    $inventories = $output->countTable('inventory');
    $attendance = $output->countTable('attendance');
    $posting = $output->countTable('posting');
    $applications = $output->countTable('guard');
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rock Security Services</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
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
                            <a href="dashboard.php">
                                <span class=""><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                   
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="resources/profile.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
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

            <div class="container-fluid mt-3">
                <div class="row">
                    <a href="recruitments_report.php" class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Applications</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$applications?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fad-users"></i></span>
                            </div>
                        </div>
                    </a>
                    <a href="inventory_report.php" class="col-lg-3 col-sm-6">
                        <div class="card gradient-6">
                            <div class="card-body">
                                <h3 class="card-title text-white">Inventory</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$inventories?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fad-money"></i></span>
                            </div>
                        </div>
                    </a>
                    <a href="attendance_report.php" class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Attendance</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$attendance?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fad-shopping-cart"></i></span>
                            </div>
                        </div>
                    </a>
                    <a class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Posting</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$posting?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fad-users"></i></span>
                            </div>
                        </div>
                    </a>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    
                                    <div class="chart-wrapper">
                                        <canvas id="chart"></canvas>
                                    </div>
                                    
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

    <!-- Chartjs -->
    <script type="text/javascript" src="./resources/chart.min.js"></script>
    <script type="text/javascript" src="./resources/graph.js"></script>





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