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

            <div class="mt-5 mb-3">
                <h5>Membros</h5>
            </div>

            <div class="d-flex">
                @foreach($membros as $membro)
                    <div class="card mx-2" style="width: 240px">
                        <img
                            src="{{asset('images/profile/default_profile_pic.png')}}"
                            class="card-img-top p-3" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$membro->pessoa->nome_completo}}</h5>
                            @foreach($membro->papeis as $papel)
                                <div class="mt-2">
                                    <p class="mb-0">{{$papel->funcao}}</p>
                                    <small>{{date("d/m/Y", strtotime($papel->data_inicio))}} Até {{date("m/d/Y", strtotime($papel->data_fim)) ?? 'atualmente'}}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
