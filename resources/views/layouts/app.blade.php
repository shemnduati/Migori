<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Baza</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .grad{
             background-image: linear-gradient(to right, #ffffe2 , #ffff9f, #ffffe2);
        }
        body{
            background-color: #ffffff;
        }
        .baza{
            color: #660033;
        }
        .a{
            color: #7030a0;
        }
        .b{
            color: #31849b;
        }
        .z{
            color: #e36c0a;
        }
        .x{
            color: #002060;
        }
        .grad {
            background-image: linear-gradient(to right, #ffffe2 , #ffff9f, #ffffe2);
        }
        .big{
            font-size: 40px;
        }
        .logo1{
            color: #c00000;
            font-weight: 700;
            font-size: 25px;

        }
        .logo2{
            color: #7030a0;
            font-weight: 700;
            font-size: 18px;
        }
        .logo img{
            padding-top: 40px;
            width: 100px;
            height: 120px;
        }
        .btn{
            background-color: #31849b;
            color: #fff;
            font-weight: 700;
        }
        .state{
            color: #1db5b5;
            font-size: 20px;
        }
        .bb{
            margin: 0 240px 0 210px;
        }
    </style>
</head>
<body class="grad">
    <div id="app">

        <main class="py-4">
            @yield('content')
            <router-view></router-view>
        </main>
    </div>
</body>
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" type="text/javascript" charset="utf-8" async defer></script>
</html>
