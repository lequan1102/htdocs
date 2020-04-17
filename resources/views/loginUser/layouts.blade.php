<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/public/templates/libs/authenlicate/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/templates/libs/authenlicate/css/style.css') }}">
    <style>
        @media screen and (max-width: 540px) {
            .main {
                padding: 20px 0;
            }
            .signin-content {
                padding: 20px 0 !important;
            }
            #signin {
                margin-top: 0px;
            }
            .signup-content {
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>

    <div class="main">
        @yield('layout')
    </div>

    <script src="{{ asset('/public/templates/libs/authenlicate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/public/templates/libs/authenlicate/js/main.js') }}"></script>
</html>
