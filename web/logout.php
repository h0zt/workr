<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <script src="jquery-3.6.0.min.js"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-app.js";
        import { getAuth, signOut} from "https://www.gstatic.com/firebasejs/9.8.2/firebase-auth.js";
       
    
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
       

        signOut(authentication).then(() => {
            window.location ="index.php";
        }).catch((error) => {
        // An error happened.
        });

    </script>
</body>
</html>