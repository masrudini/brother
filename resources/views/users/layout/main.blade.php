<!DOCTYPE HTML>
<!--
 Forty by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>{{ $title }} | Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('portal_template/assets/css/main.css') }}" />
    <link rel="icon" href="{{ url('images/icon.ico') }}">
    <noscript>
        <link rel="stylesheet" href="{{ url('portal_template/assets/css/noscript.css') }}" />
    </noscript>

</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        @include('users/includes/nav')

        <!-- Main -->
        <div id="main">
            <!-- One -->
            @yield('container')
            <!-- Two -->
        </div>


        <!-- Footer -->
        @include('users/includes/footer')

    </div>

    <!-- Scripts -->
    <script src="{{ url('portal_template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/browser.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/util.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/main.js') }}"></script>

</body>

</html>
