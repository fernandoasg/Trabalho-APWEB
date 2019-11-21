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
    <link href="{{ asset('css/layouts/app_with_footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

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

                                @can('criar usuarios')
                                    <a class="dropdown-item" href="{{ route('admin_area') }}">Area do administrador</a>
                                @endcan

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
