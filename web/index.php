<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rock Security Services</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
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
                <a href="index.php">
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
                            <a href="index.php#help">
                                <span class=""><i class="fa fa-question-circle" title="help"> help</i></span>
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
                                        <li><a href="login.php"><i class="icon-key"></i> <span>Login</span></a></li>
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
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Guard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Application</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="
                        background-size:cover;
                        background-repeat:no-repeat;
                        background-image:url('resources/security.png')">
                    </div>
                    <div class="col-md-6">
                        <div id="step-form-horizontal" class="card">
                            <div class="card-body" >
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="FirstName" id="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="SurName" id="lastname" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" id="contact" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Height" id="height" required>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                 class="form-control" placeholder="National ID" id="identification" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="file" class="form-control" placeholder="Id Upload" id="file" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address" id="information" required>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Certificate" id="certificate" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Education" id="education" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-lg text-white" value="Apply As Guard" id="recruit_btn" type="submit">                                      
                                         </div>
                                    </div>
                                </div>
                                <!---RESULT CONFIRMATION-->

                            </div>
                        </div>
    
                    </div>
                </div>

                <div class="row mt-5" id="help">
                    <div class="col-md-6 mt-5  ">
                    <h1 class="text-primary mb-5">Talk To Us.</h1>
                        <div id="step-form-horizontal" class="card">
                            <div class="card-body">
                                <p>use these contacts for help</p>
                                <li>0382348834</li>  
                                <li>peter16matewere@gmail.com</li>  

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
    <!---sweetAlert-->
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>


    <script>
        (function($) {
            "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "horizontal", //2 options, "vertical" and "horizontal"
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


    <script type="text/javacript" src="resources/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $('#recruit_btn').click(function() {
            console.log("test");
            let firstname = $('#firstname').val();
            let lastname = $('#lastname').val();
            let contact = $('#contact').val();
            let education = $('#education').val();
            let height = $('#height').val();
            let certificate = $('#certificate').val();
            let identification = $('#identification').val();
            let information = $('#information').val();
            //image
            let files = $('#file')[0].files;
            // Check file selected or not(validate)
            if(files.length > 0 && firstname.length > 0 &&
                lastname.length > 0 && contact.length > 0 &&
                education.length > 0 && height.length > 0 &&
                certificate.length > 0 && identification.length > 0 &&
                information.length > 0){
                    
                //append to form data
                var formData = new FormData();
                formData.append('height',height);
                formData.append('education',education);
                formData.append('certificate',certificate);
                formData.append('file',files[0]);
                formData.append('firstname',firstname);
                formData.append('lastname',lastname);
                formData.append('contact',contact);
                formData.append('identification',identification);
                formData.append('information',information);
                formData.append('recruit','recruit');
                //send
                $.ajax({
                    url: 'includes/process.php',
                    type: 'post',
                    data:formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        let obj = JSON.parse(response);
                        //determine type of alert to show depeding on return message
                        sweetAlert({
                            title:"Successful !!",
                            text:`applied as ${obj[0].message} !!`,
                            type:"success",
                            timer:2e3,
                            showConfirmButton:!1
                        })
                    }
                });

            }else{
                sweetAlert({
                    title:"Incorrect !!",
                    text:"Make sure you fill all inputs !!",
                    type:"error",
                    timer:2e3,
                    showConfirmButton:!1
                })
            }
        });


    </script>--->
</body>

</html>