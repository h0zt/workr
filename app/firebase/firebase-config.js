// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { createUserWithEmailAndPassword ,signInWithEmailAndPassword,
  getAuth } from "firebase/auth";
import { getFirestore } from 'firebase/firestore';

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
export const authentication = getAuth(app);
export const db = getFirestore(app);