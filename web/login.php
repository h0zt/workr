
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rock Security Services | Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="resources/security.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
</head>

<body class="h-100">
    

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Rock Security Service</h4></a>
        
                                <div  class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input id="input__email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input id="input__password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button id="submit__btn" class="btn login-form__btn submit w-100">Sign In</button>
                                </div>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="" class="text-primary">SignUp</a>on App</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <!--SENDING TO THE FIRESTORE---->
    
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>

    
    <script type="text/javascript" src="resources/jquery-3.6.0.min.js"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
        import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-auth.js";
       
    
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
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const authentication = getAuth();


        $('#submit__btn').click(function() {
            const email = $("#input__email").val();
            const password = $("#input__password").val();
            signInWithEmailAndPassword(authentication, email, password)
                .then((userCredential) => {
                    const name = userCredential.email;
                    sweetAlert({
                        title:"Successful !!",
                        text:`You are logged in as ${name}!!`,
                        type:"success",
                        timer:3e3,
                        showConfirmButton:!1
                    })
                    window.location ="dashboard.php";
                }).catch((error) => {
                    sweetAlert({
                        title:"Error !!",
                        text:`${error} !!`,
                        type:"error",
                        timer:2e3,
                        showConfirmButton:!1
                    })
                });
        });
    </script>
</body>
</html>





