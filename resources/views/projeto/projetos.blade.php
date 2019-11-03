@extends('layouts.app_with_footer')

@section('content')
<div class="container mt-4 mb-4">
     <div class="row">
          <div class="col-md-4">
               <img src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg" alt="Explicação sobre a imagem" class="img-fluid">
               <p class="text-center m-1">
                    <a href="projeto/sigfap">
                    {{$projeto1}}
                    </a>
               </p>
          </div>

          <div class="col-md-4">
               <img src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg" alt="Explicação sobre a imagem" class="img-fluid">
               <p class="text-center m-1">
                    <a href="projeto/siai">
                         {{$projeto2}}
                    </a>
               </p>
          </div>

          <div class="col-md-4">
               <img src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg" alt="Explicação sobre a imagem" class="img-fluid">
               <p class="text-center m-1">
               <a href="projeto/ledes">
                    {{$projeto3}}
               </a>
               </p>
          </div>
     </div>
</div>
@endsection
