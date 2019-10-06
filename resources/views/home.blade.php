@extends('layouts.app_with_footer')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-md-8">
               <a href="#">
                    <img src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg" alt="Explicação sobre a imagem" class="img-fluid">
                    <div class="mb-5 d-inline p-1 bg-primary news-info zindex-1">
                         <span class="text-white">04 de setembro de 2019</span>
                    </div>
                    <div class="pl-1 pt-1 pr-1 bg-secondary news-info">
                         <h3 class="pt-3 text-white">Relógio Biológico, não quebre o seu!</h3>
                    </div>
               </a>
          </div>

          <div class="col-md-4">
               <div class="m-1">
                    <a href="#">
                         <img src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg" alt="Explicação sobre a imagem" class="img-fluid">
                         <div class="mb-5 d-inline p-1 bg-primary news-info-mid zindex-1">
                              <small class="text-white">04 de setembro de 2019</small>
                         </div>
                         <div class="pl-1 pt-1 pr-1 bg-secondary news-info-mid">
                              <h6 class="pt-2 text-white">Relógio Biológico, não quebre o seu!</h6>
                         </div>
                    </a>
               </div>
               <div  class="m-1">
                    <a href="#">
                         <img src="https://drauziovarella.uol.com.br/wp-content/uploads/2017/07/drauzio-thumb-comenta-relogio-biologico-invertido-1000x563.jpg" alt="Explicação sobre a imagem" class="img-fluid">
                         <div class="mb-5 d-inline p-1 bg-primary news-info zindex-1">
                              <small class="text-white">04 de setembro de 2019</small>
                         </div>
                         <div class="pl-1 pt-1 pr-1 bg-secondary news-info">
                              <h6 class="pt-2 text-white">Relógio Biológico, não quebre o seu!</h6>
                         </div>
                    </a>
               </div>
          </div>
     </div>

     <div class="row mt-5">
          <div class="col-md-4">
               <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
          </div>
          <div class="col-md-8">
               <div class="mt-3">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
               </div>
          </div>
     </div>

     <div class="row mt-3">
          <div class="col-md-4">
               <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
          </div>
          <div class="col-md-8">
               <div class="mt-3">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
               </div>
          </div>
     </div>

     <div class="row mt-3">
          <div class="col-md-4">
               <img src="https://siai.ufms.br/img/logoLedes.png" class="img-fluid">
          </div>
          <div class="col-md-8">
               <div class="mt-3">
                    <h5>Edital de Bolsistas para o LEDES - Classificação</h5>
                    <h6>01 de setembro de 2019</h6>
                    <h6>
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                    </h6>
               </div>
          </div>
     </div>

     <div class="col-md-12 text-center mt-4">
     <a href="{{ url('/noticias') }}" class="btn btn-primary center-block">Ver mais notícias</a>
     </div>
</div>
@endsection
