
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
    * where to look for changes from clients in 
    * self run function only when the data changes
    * ----
    */
(function getCustomersDetails(){
    const fromDetail = doc(firestore,'detail/client');
    //real time changes
    onSnapshot(fromDetail, docSnapshot => {
        if(docSnapshot.exists()){
            const docData = docSnapshot.data();
            console.log(JSON.stringify(docData.name));
            //to mysql
            $(document).ready(function(){        
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'includes/process.php',
                    data: {
                        name: docData.name,
                        address: docData.address,
                        contact: docData.contact,
                        insertclient:"insertclient"
                    },
                    success: function (data){ 
                            //recived pushed data
                    }
                });
            });
            //--
        }
    })
    //--
})();






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
            console.log(JSON.stringify(docData.id));

            //to mysql
            $(document).ready(function(){   
                let identification = docData.name;         
                let id = docData.id;         
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'includes/process.php',
                    data: {
                        identity: identification,
                        fingerprint:"identity",
                        id:id
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
