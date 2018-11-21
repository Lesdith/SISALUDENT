<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SiSaluDent</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                background-color: #057deb;
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
               text-shadow: 4px 4px 5px #000;
            }
            h1{
                margin-bottom: -22%;
               text-shadow: 1px 1px 2px #000000 , 2px 2px 4px #F8E6E0;
            }

            .fondo{
            background: url('../images/candado.png') no-repeat  center fixed;
            -webkit-background-size: 20%;
            -moz-background-size: 20%;
            -o-background-size: 20%;
            background-size: cover;
           background-position: 680px 110px;
           /* background-size: 10% 17%; */
            }

        </style>
    </head>
    <body class="fondo">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a role="button" class="btn btn-primary" href="{{ url('/home') }}">Regresar</a>
                    @else
                        <a role="button" class="btn btn-primary" href="{{ route('login') }}">Iniciar sesión</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                     <center><b>No tienes permisos,</b></center>
                     <center><b>para acceder a esta sección.</b></center>
                </div>

            </div>
        </div>
    </body>
</html>
