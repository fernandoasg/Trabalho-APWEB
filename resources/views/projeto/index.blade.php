@extends('layouts.app_with_footer')

@section('content')
    <div class="container my-4">
        <div class="">
            <h1>{{$projeto->nome}}</h1>
            <hr>

            <div class="">
                <img
                    src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg"
                    alt="Explicação sobre a imagem" class="img-fluid">
            </div>
            <div class=""></div>

            <div class="mt-3">
                <p class="text-justify">{{ $projeto->descricao }}</p>
            </div>

            <div class="mt-5">
                <h5>AUTORES</h5>
            </div>

            <div class="">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Marcelo Augusto Santos Turine</li>
                    <li class="list-group-item">Camilo Carromeu</li>
                    <li class="list-group-item">Márcio Aparecido Inacio da Silva</li>
                    <li class="list-group-item">Vitor Mesaque Alves de Lima</li>
                </ul>
            </div>
            <div class="mt-5">
                <ul class="list-unstyled">
                    <li><h5>PROPRIEDADE INTELECTUAL</h5></li>
                    <li class="ml-3"><span class="text-justify"> BR 51 2017 000290-8</span></li>
                    <li class="ml-3"><span class="text-justify">COD UFMS 26</span></li>
                    <li class="ml-3"><span class="text-justify">Certificado de Registro</span></li>
                    <li class="mt-3"><h5>TITULARIDADE</h5></li>
                    <li class="ml-3"><span class="text-justify">UFMS - Universidade Federal de Mato Grosso do Sul</span>
                    </li>
                </ul>
            </div>
            <div class="my-5">
                <h4><strong>Membros</strong></h4>
            </div>

            <div class="d-flex">
                @foreach($membros as $membro)
                    <div class="card mx-1 p-2">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm7TzNAEPNDgeNNBZBiyYaVK34kpXYBV6CjgIHUtCkpyL6oyqW"
                            class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$membro->pessoa->nome_completo}}</h5>
                            @foreach($membro->papeis as $papel)
                                <div class="mt-3">
                                    <p class="mb-0">{{$papel->funcao}}</p>
                                    <small>{{date("m/d/Y", strtotime($papel->data_inicio))}} Até {{date("m/d/Y", strtotime($papel->data_fim)) ?? 'atualmente'}}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
