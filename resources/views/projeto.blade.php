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

          <div class="col-md-12 mt-4">
               <p class="text-justify">{{ $descricaoProjeto }}</p>
          </div>

          <div class="col-md-6 mt-3">
               <h5>AUTORES</h5>
          </div>
          <div class="col-md-12">
               <ul class="list-group list-group-flush">
                    <li class="list-group-item">Marcelo Augusto Santos Turine</li>
                    <li class="list-group-item">Camilo Carromeu</li>
                    <li class="list-group-item">Márcio Aparecido Inacio da Silva</li>
                    <li class="list-group-item">Vitor Mesaque Alves de Lima</li>
               </ul>
          </div>
          <div class="col-md-6 mt-5">
               <h5>VANTAGENS</h5>
          </div>
          <div class="col-md-12 mt-2">
               <p class="text-justify">{{ $vantagensProjeto }}</p>
          </div>

          <div class="col-md-12 mt-3">
               <h5>PROPRIEDADE INTELECTUAL</h5>
          </div>
          <div class="col-md-12 mt-1">
               <span class="text-justify"> BR 51 2017 000290-8</span>
          </div>
          <div class="col-md-12">
               <span class="text-justify">COD UFMS 26</span>
          </div>
          <div class="col-md-12">
               <span class="text-justify">Certificado de Registro</span>
          </div>

          <div class="col-md-12 mt-3">
               <h5>TITULARIDADE</h5>
          </div>
          <div class="col-md-12">
               <p class="text-justify">UFMS - Universidade Federal de Mato Grosso do Sul</p>
          </div>

          <div class="col-md-12 mt-4">
               <h4><strong>Membros</strong></h4>
          </div>
          <div class="col-md-12 scrolling-wrapper">
               <div class="card col-md-3 mb-2" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW" class="card-img-top mt-3" alt="...">
                    <div class="card-body text-center">
                         <h5 class="card-title">Carl Johnson</h5>
                         <p class="card-text">Documentador</p>
                    </div>
               </div>
               <div class="card col-md-3 mb-2" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW" class="card-img-top mt-3" alt="...">
                    <div class="card-body text-center">
                         <h5 class="card-title">Carl Johnson</h5>
                         <p class="card-text">Analista</p>
                    </div>
               </div>
               <div class="card col-md-3 mb-2" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW" class="card-img-top mt-3" alt="...">
                    <div class="card-body text-center">
                         <h5 class="card-title">Carl Johnson</h5>
                         <p class="card-text">Gerente de Projetos</p>
                    </div>
               </div>
               <div class="card col-md-3 mb-2" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW" class="card-img-top mt-3" alt="...">
                    <div class="card-body text-center">
                         <h5 class="card-title">Carl Johnson</h5>
                         <p class="card-text">Suporte</p>
                    </div>
               </div>
               <div class="card col-md-3 mb-2" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW" class="card-img-top mt-3" alt="...">
                    <div class="card-body text-center">
                         <h5 class="card-title">Carl Johnson</h5>
                         <p class="card-text">Desenvolvedor</p>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection
