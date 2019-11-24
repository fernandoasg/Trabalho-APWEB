@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                                <a href="{{ url('/noticia/1') }}">
                                    <img
                                        src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg"
                                        alt="Explicação sobre a imagem" class="img-fluid">
                                </a>
                                <a href="{{ url('/noticia/1') }}">
                                    <div class="mt-3">
                                        <h2 class="text-dark">Relógio Biológico, não quebre o seu!</h2>
                                    </div>
                                </a>
                        </div>
                        <div class="carousel-item">
                                <a href="{{ url('/noticia/2') }}">
                                    <img
                                        src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg"
                                        alt="Explicação sobre a imagem" class="img-fluid">
                                </a>
                                <a href="{{ url('/noticia/2') }}">
                                    <div class="mt-3">
                                        <h2 class="text-dark">Relógio Biológico, não quebre o seu!</h2>
                                    </div>
                                </a>
                        </div>
                        <div class="carousel-item">
                                <a href="{{ url('/noticia/3') }}">
                                    <img
                                        src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg"
                                        alt="Explicação sobre a imagem" class="img-fluid">
                                </a>
                                <a href="{{ url('/noticia/3') }}">
                                    <div class="mt-3">
                                        <h2 class="text-dark">Relógio Biológico, não quebre o seu!</h2>
                                    </div>
                                </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>    
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{ url('/noticia/4') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8 mt-4">
                <a href="{{ url('/noticia/4') }}">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ url('/noticia/5') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8 mt-4">
                <a href="{{ url('/noticia/5') }}">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ url('/noticia/6') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8 mt-4">
                <a href="{{ url('/noticia/6') }}">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
                </a>
            </div>
        </div>

        <div class="col-md-12 text-center mt-4">
            <a href="{{ url('/noticias') }}" class="btn btn-primary center-block">Ver mais notícias</a>
        </div>
    </div>
@endsection
