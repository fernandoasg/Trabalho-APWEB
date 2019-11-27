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
                        @for($i = 0; $i < 3; $i++)
                            @if($i == 0) 
                                <div class="carousel-item active"> 
                            @else
                                <div class="carousel-item"> 
                             @endif
                            
                                    <a href="{{ url('/noticia/'.$posts[$i]->id) }}">
                                        <img
                                            src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg"
                                            alt="Explicação sobre a imagem" class="img-fluid">
                                    </a>
                                    <a href="{{ url('/noticia/'.$posts[$i]->id) }}">
                                        <div class="mt-3">
                                            <h2 class="text-dark">{{ $posts[$i]->title }}</h2>
                                        </div>
                                    </a>
                            </div>
                        @endfor
                        
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

        @for($i = 3; $i < 7; $i++)
            <div class="row mt-5">
                <div class="col-md-4">
                    <a href="{{ url('/noticia/'.$posts[$i]->id) }}">
                        <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8 mt-4">
                    <a href="{{ url('/noticia/'.$posts[$i]->id) }}">
                        <h5>{{ $posts[$i]->title }}</h5>
                        <h6>{{ $posts[$i]->updated_at }}</h6>
                        <h6>
                            {{ $posts[$i]->intro }}
                        </h6>
                    </a>
                </div>
            </div>
        @endfor

        <div class="col-md-12 text-center mt-5 mb-3">
            <a href="{{ url('/noticias') }}" class="btn btn-primary center-block">Ver mais notícias</a>
        </div>
    </div>
@endsection
