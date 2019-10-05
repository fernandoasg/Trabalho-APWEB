@extends('layouts.app_with_footer')

@section('content')
<div class="container mt-2 mb-4">
     <div class="row">
          <div class="col-md-12">    
               <p>
                    <h3>
                         {{$nomeProjeto}}
                    </h3>
               </p>

               <hr>
          </div>

          <div class="col-md-4"></div>
          <div class="col-md-4">
               <img src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg" alt="Explicação sobre a imagem" class="img-fluid">
          </div>
          <div class="col-md-4"></div>

     </div>
</div>
@endsection
