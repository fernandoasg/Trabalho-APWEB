@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/users.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1>Gerenciar Projetos</h1>
        </div>
        <table class="table table-striped table-bordered w-100" id="tabela_users">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projetos as $projeto)
                <tr id="{{ 'tr_projeto_'.$projeto->id }}">
                    <td>{{ $projeto->id }}</td>
                    <td>{{ $projeto->nome }}</td>
                    <td>{{ $projeto->descricao }}</td>
                    <td id="buttons-collumn">
                    
                        <a href="" class="btn btn-primary btn-sm active my-1"
                           role="button" aria-pressed="true"><i class="fas fa-cog"></i></a>

                        <span class="btn btn-primary btn-sm active"
                              role="button" aria-pressed="true"
                              onclick="deleteProjeto('{{ $projeto->id }});"><i
                                class="fas fa-trash"></i></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('projetos_create') }}"
           class="btn btn-primary btn-lg active"
           role="button" aria-pressed="true">Criar Projeto</a>
    </div>
@endsection
