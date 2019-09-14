<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba-XavierBasir</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600i" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #252440;
                font-family: 'Open Sans', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
                position: relative;
                background-image:url('{{ asset('images/welcome_b.JPG') }} ');
                background-repeat:no-repeat;
                background-size:100% 115vh;
                overflow: hidden;
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
                font-style: italic;
                font-weight: 600i;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .welcomeButton:hover {
                color: #ffffff;
                font-size: 14px;
                background-color: #000000;
                height: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @role('admin')
                            <a href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
                        @endrole

                        @role('user')
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @endrole
                        
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bienvenido
                </div>

                 @auth
                    
                @else
                <div class="links">
                    <a href="{{ route('login') }}" class="welcomeButton">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="welcomeButton">Registrarse</a>
                </div>
                @endauth
            </div>
        </div>
    </body>
</html>
