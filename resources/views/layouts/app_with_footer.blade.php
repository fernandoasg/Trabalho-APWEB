<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @stack('fonts')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')

    <style>
        /* Footer */
        section {
            padding: 40px 0;
        }

        #footer {
            background: #007b5e !important;
        }

        #footer h5 {
            padding-left: 10px;
            border-left: 3px solid #eeeeee;
            padding-bottom: 6px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        #footer a {
            color: #ffffff;
            text-decoration: none !important;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        #footer ul.social li {
            padding: 3px 0;
        }

        #footer ul.social li a i {
            margin-right: 5px;
            font-size: 25px;
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }

        #footer ul.social li:hover a i {
            font-size: 30px;
            margin-top: -10px;
        }

        #footer ul.social li a,
        #footer ul.quick-links li a {
            color: #ffffff;
        }

        #footer ul.social li a:hover {
            color: #eeeeee;
        }

        #footer ul.quick-links li {
            padding: 3px 0;
            -webkit-transition: .3s all ease;
            -moz-transition: .3s all ease;
            transition: .3s all ease;
        }

        #footer ul.quick-links li:hover {
            padding: 3px 0;
            margin-left: 5px;
            font-weight: 700;
        }

        #footer ul.quick-links li a i {
            margin-right: 5px;
        }

        #footer ul.quick-links li:hover a i {
            font-weight: 700;
        }

        @media (max-width: 767px) {
            #footer h5 {
                padding-left: 0;
                border-left: transparent;
                padding-bottom: 0;
                margin-bottom: 10px;
            }
        }

        /* /footer */

        /* navbar */
        #navbar {
            background-color: #007b5e;
        }

        #navbar * {
            color: white !important;
        }

        #navbar .dropdown-item {
            color: black !important;
        }

        @media only screen and (min-width: 1100px) {
            .center-link {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                box-shadow: 0 0 1px transparent;
                position: relative;
                overflow: hidden;
                margin: 0 5px;
            }

            .center-link:before {
                content: "";
                position: absolute;
                z-index: -1;
                left: 50%;
                right: 50%;
                bottom: 0;
                background: white;
                height: 2px;
                -webkit-transition-property: left, right;
                transition-property: left, right;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-timing-function: ease-out;
                transition-timing-function: ease-out;
            }

            .center-link:hover:before, .center-link:focus:before, .center-link:active:before {
                left: 0;
                right: 0;
            }
        }

        /* /navbar */
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'ledes') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto col-xs-12 col-sm-6 offset-sm-2 col-md-6 offset-md-2">
                    <li class="nav-item center-link">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item center-link">
                        <a class="nav-link" href="#">Sigfap</a>
                    </li>
                    <li class="nav-item center-link">
                        <a class="nav-link" href="#">Redmine</a>
                    </li>
                    <li class="nav-item center-link">
                        <a class="nav-link" href="{{ url('/projetos') }}">Projetos</a>
                    </li>
                    <li class="nav-item center-link">
                        <a class="nav-link" href="{{ url('/sobre') }}">Sobre</a>
                    </li>
                    <li class="nav-item center-link">
                        <a class="nav-link" href="{{ url('/contato') }}">Contato</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Olá, {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a href="{{ route('profile.index') }}" class="dropdown-item">Meu Perfil</a>

                                {{--                        todo se usuário for adm mostrar dropdown de area do usuário --}}
                                <a class="dropdown-item" href="{{ route('register') }}">Area do administrador</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <section id="footer">
            <div class="container">
                <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Acesso Rápido</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Sobre</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Trabalhe Conosco</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Perguntas Frequentes</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Área do Administrador</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Nossos Parceiros</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>JERA</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>UFMS</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>FACOM</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>SIGFAP</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>REDMINE</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Notícias e Autores</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Recentes</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Populares</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Nossos Autores</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Artigos Científicos</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Artigos Recomendados</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-3">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                        <p><u><a href="#">LEDES</a></u> - Laboratório de engenharia de software é um ambiente de
                            desenvolvimento de soluções computacionais e
                            formação de pessoal qualificado, fomentando a transferência do conhecimento entre
                            universidade, governo e iniciativa privada.</p>
                        <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#" target="_blank">Facom,
                                UFMS</a></p>
                    </div>
                    <hr>
                </div>
            </div>
        </section>
    </footer>
</div>
</body>
</html>
