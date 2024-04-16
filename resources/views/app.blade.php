<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        
        @inertia

        @if (env('APP_ENV') == 'prod' || env('APP_ENV') == 'production')
            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/656f1fa3ff45ca7d478707ec/1hgt1763b';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
            <!--End of Tawk.to Script-->
            <script type="module">
                // Import the functions you need from the SDKs you need
                import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
                import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-analytics.js";
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
                const analytics = getAnalytics(app);
            </script>
        @endif
    </body>
</html>
