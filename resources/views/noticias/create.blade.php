@extends('layouts.app_with_footer')

@section('content')
    <div class="container d-flex flex-wrap justify-content-center col-12 col-sm-8 col-md-7">
        <div class="align-self-center" id="post-wrapper">
            <div class="mb-2" id="tipo-post">
                <span>Nóticias . </span>
                <span>{{ $post->created_at->format('d F Y') }}</span>
            </div>
            <h1 class="font-weight-bold">{{ $post->title }}</h1>
            <div class="">
                <span>Postado por: {{ $autor->nome_completo }}</span>
                <a href="#" class="fb-ic ml-5" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
                <a href="#" class="tw-ic ml-2" role="button"><i class="fab fa-lg fa-twitter"></i></a>

            </div>
            <div class="mt-4">
                <p class="text-justify">{{ $post->intro }}</p>
            </div>
            <div class="mt-4">
                <p class="text-justify">{{ $post->body }}</p>
            </div>
            <div class="mt-4">
                <p class="text-justify">{{ $post->conclusion }}</p>
            </div>

        </div>

        <div class="mt-5" id="veja-tambem-wrapper">
            <div class="">
                <h6>Veja também:</h6>
            </div>
            <div class="d-flex flex-row">
                <div class="">
                    <a href="{{ url('/noticia/7') }}">
                        <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                        <h6 class="mt-3 text-center">Outra notícia</h6>
                    </a>
                </div>
                <div class="">
                    <a href="{{ url('/noticia/8') }}">
                        <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                        <h6 class="mt-3 text-center">Outra notícia</h6>
                    </a>
                </div>
                <div class="">
                    <a href="{{ url('/noticia/9') }}">
                        <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                        <h6 class="mt-3 text-center">Outra notícia</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
