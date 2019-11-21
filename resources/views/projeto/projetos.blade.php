@extends('layouts.app_with_footer')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            @foreach($projetos as $projeto)
                <div class="col-md-4">
                    <a href="{{ url('projeto/'.$projeto->id) }}" class="text-decoration-none">
                        <h2 class="m-1">
                            {{$projeto->nome}}
                        </h2>
                        <img
                            src="https://artia.com/wp-content/uploads/2015/04/Entenda-a-importância-da-declaração-do-escopo-para-o-sucesso-do-seu-projeto-696x364.jpg"
                            alt="project image"
                            class="img-fluid">
                    </a>
                    <div class="flex-row">
                        <span>Inicio: {{date("d/m/Y", strtotime($projeto->data_inicio))}}</span>
                    </div>
                    <div class="flex-row">
                        <span>Fim: {{date("d/m/Y", strtotime($projeto->data_fim)) ?? ''}}</span>
                    </div>
                    <div class="mt-3">
                        <p>{{$projeto->descricao}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
