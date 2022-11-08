<?php $identification =$_GET['id']; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>rock security services | Attendance</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="resources/fullcalendar.min.css">
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
                            <a href="attendance_report.php">
                                <span class=""><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Guard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Attendance</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div>attended for<span id="report"></span><b>day(s)</b></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box m-b-50">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>

                                    <!-- end col -->
                                    <!-- BEGIN MODAL -->
                                    <div class="modal fade none-border" id="event-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                                </div>
                                                <div class="modal-body"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Add Category -->
                                    <div class="modal fade none-border" id="add-category">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><strong>Add a category</strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="control-label">Category Name</label>
                                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="control-label">Choose Category Color</label>
                                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                                    <option value="success">Success</option>
                                                                    <option value="danger">Danger</option>
                                                                    <option value="info">Info</option>
                                                                    <option value="pink">Pink</option>
                                                                    <option value="primary">Primary</option>
                                                                    <option value="warning">Warning</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL -->
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
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
    <!--scripts for attendance calendar-->
    <script src="resources/jquery-ui.min.js"></script>
    <script src="resources/moment.min.js"></script>
    <script src="resources/fullcalendar.min.js"></script>
    <!--start-my-js module includes firebase-->
    <!--end-my-js-->
    <script>
        /**use the selected national id from php to find attendance */
        let identification = '<?=$identification?>';
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable:true,
                initialView: 'dayGridMonth',
                events: `includes/load.php?id="${identification}"`,
                selectable: true,
                selectHelper: true,
            });
        });
        /**report display */
        $(document).ready(function(){        
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'includes/report.php',
                data: {
                    id:`${identification}`
                },
                success: function (response){ 
                    $('#report').append(" "+response[0].count+" ");
                    //give response and send to firebase
                }
            });
        });
    </script>
    <style> .fc-day-grid-event .fc-content{ color: black !important; } </style>



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


    <script type="module">
        /** main firebase code **/
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
        import { getFirestore, doc, getDoc, onSnapshot, setDoc} from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js'
        const firebaseConfig = {
            apiKey: "AIzaSyDnwb8Zqry_Ws9BqeeDU-uApQOhWhjETVA",
            authDomain: "rocksec-system.firebaseapp.com",
            databaseURL: "https://rocksec-system-default-rtdb.firebaseio.com",
            projectId: "rocksec-system",
            storageBucket: "rocksec-system.appspot.com",
            messagingSenderId: "724397207839",
            appId: "1:724397207839:web:52c36983e70b5c1aa7c02a",
            measurementId: "G-6ZLPFX7ZJ9"
        };
        const app = initializeApp(firebaseConfig);
        const firestore = getFirestore();

        /**
         * FIRESTORE
         * where to look for changes from guards attendance
         * ----
         */
        (function getAttendedGuard(){
            const fromFirestore = doc(firestore,'attendance/biometrics');
            //real time changes
            onSnapshot(fromFirestore, docSnapshot => {
                if(docSnapshot.exists()){
                    const docData = docSnapshot.data();
                    console.log(JSON.stringify(docData.name));

                    //to mysql
                    $(document).ready(function(){   
                        let identification = docData.name;         
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: 'includes/process.php',
                            data: {
                                identity: identification,
                                fingerprint:"identity"
                            },
                            success: function (data){ 
                                    //recived pushed data
                            }
                        });
                    });

                }
            })
            //--
        })();

    </script>

</body>

</html>