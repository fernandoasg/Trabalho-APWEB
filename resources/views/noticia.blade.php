@extends('layouts.app_with_footer')

@section('content')
<div class="container mt-2 mb-4">
     <div class="row">
          <div class="col-md-12">    
               <p>
                    <h3>
                         {{$nomeNoticia}}
                    </h3>
               </p>
          </div>
          <div class="col-md-3">
               <small>Postado por: {{ $nomeEditor }}</small>
          </div>
          <div class="col-md-3">
               <small>{{ $data }}</small>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3 mt-1">
               <a class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
               <a class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
          </div>

          <div class="col-md-12 mt-n2">
               <hr>
          </div>
          <div class="col-md-4 mt-3 mb-3">
               <img src="{{$imgPath}}" alt="Explicação sobre a imagem" class="img-fluid">
          </div>
          <div class="col-md-8">
               <p class="text-justify">{{ $conteudoNoticia }}</p>
          </div>
     </div>

     <div class="row mt-5">
          <div class="col-md-12 mb-3">
               <h6>Veja também:</h6>
          </div>
          <div class="col-md-4">
               <a href="{{ url('/noticia/7') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                    <h6 class="mt-3 text-center">Outra notícia</h6>         
               </a>
          </div>
          <div class="col-md-4">
               <a href="{{ url('/noticia/8') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                    <h6 class="mt-3 text-center">Outra notícia</h6>         
               </a>
          </div>
          <div class="col-md-4">
               <a href="{{ url('/noticia/9') }}">
                    <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
                    <h6 class="mt-3 text-center">Outra notícia</h6>         
               </a>
          </div>
     </div>
</div>
@endsection
