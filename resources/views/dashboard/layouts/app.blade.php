<!DOCTYPE HTML>
{{-- <html lang="{{ app()->getLocale() }}"> --}}
<html lang="en">
@include('dashboard.layouts.header')

{{-- <body style="direction: @if (app()->getLocale() == 'ar')  rtl !important @else ltr !important; @endif"> --}}

{{-- <body style="background-color: #F3F7FA;"> --}}
<body >
    @include('dashboard.layouts.nav')

    @yield('content')

    @include('dashboard.layouts.footer')
    @livewireScripts

    @stack('scripts')

    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDk1vIQhFxTc5WuOT6ojmWekkpNA8iulEM",
            authDomain: "original-customer.firebaseapp.com",
            projectId: "original-customer",
            storageBucket: "original-customer.appspot.com",
            messagingSenderId: "161494308415",
            appId: "1:161494308415:web:41535ebbfb15dc68af4a8a",
            measurementId: "G-T2GGGQCWPM"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
</body>

</html>
