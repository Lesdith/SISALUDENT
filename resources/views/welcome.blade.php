<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SISALUDENT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* color: #636b6f; */
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                background-color:#b1faf8;
                border-radius: 15px;
                color: #000000;
                padding: 14px 25px;
                font-size: 20px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }
                a:hover, a:active {
                    background-color: #ffb3c0;
                }

               .m-b-md {
                margin-bottom: -06%;
                font-size: 75px;
                text-shadow: 3px 3px 5px #F6D8CE, 6px 6px 5px #2E9AFE , 9px 9px 5px #58FAD0;
            }
            h1{
                margin-bottom: -22%;
               text-shadow: 1px 1px 2px #000000 , 2px 2px 4px #F8E6E0;
            }
            b{
                margin-bottom: -22%;
               text-shadow: 1px 1px 2px #000000 , 2px 2px 4px #F8E6E0;
            }
            /* .fondo{
            background: url('../images/fondo.png') no-repeat center center fixed;
            /* background-repeat: no-repeat;
            background-size: 50%; 
            }*/

        </style>
    </head>
    <body class="fondo" >
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a role="button" class="btn btn-primary" href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a role="button" class="btn btn-primary" href="{{ route('login') }}">Iniciar sesión</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <b>SISALUDENT</b>
                </div>
                <h1> Sistema de Salud Dental</h1>
            </div>
        </div>
    </body>
</html>
