// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDI6o1eGUQoP8q0Ab3TTaG9WUTiAUSki0s",
    authDomain: "betterweb-99b09.firebaseapp.com",
    projectId: "betterweb-99b09",
    storageBucket: "betterweb-99b09.appspot.com",
    messagingSenderId: "66171088389",
    appId: "1:66171088389:web:72d320fa9484be75c4f66c",
    measurementId: "G-4P171N4BN5"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const appEnv = import.meta.env.VITE_APP_ENV || 'local';
if(appEnv == 'prod' || appEnv == 'production') {
    getAnalytics(app);
}