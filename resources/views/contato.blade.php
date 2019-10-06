@extends('layouts.app_with_footer')

@section('content')
<div class="container mt-2 mb-4">
     <div class="row">

          <div class="col-md-1 mt-1">
               <p class="mt-2">
                    <i style='font-size:24px' class='fas'>&#xf095;</i>
               </p> 
          </div>
          <div class="col-md-11 mt-1">
               <div>Telefone</div>
               <div>67 3345-7532</div>
          </div>

          <div class="col-md-1 mt-2">
               <p class="mt-2">
                    <i style='font-size:24px' class='fas'>&#xf3c5;</i>
               </p> 
          </div>
          <div class="col-md-11 mt-2">
               <div>Endereço</div>
               <div>Cidade Universitária, caixa postal 549, CEP: 79070-900. Campo Grande MS</div>
          </div>

          <div class="col-md-1 mt-2">
               <p class="mt-2">
                    <i style='font-size:24px' class='fas'>&#xf658;</i>
               </p> 
          </div>
          <div class="col-md-11 mt-2">
               <div>Email</div>
               <div>ledesfacomufms@gmail.com</div>
          </div>

          <div class="embed-responsive embed-responsive-16by9 mt-4">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14948.368916475332!2d-54.613378!3d-20.5024451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6d7d288192cb4db3!2sLaborat%C3%B3rio%20de%20Engenharia%20de%20Software%20-%20LEDES!5e0!3m2!1spt-BR!2sbr!4v1570375952642!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
     </div>
</div>
@endsection
