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
                    
                        

                        <span class="btn btn-primary btn-sm active">
                            
                        <form action="/projetos/edit" method="POST">
                                @method('GET')
                                @csrf
                                <input type='hidden' name='id' value='{{$projeto->id}}'>
                                <button class="btn btn-primary btn-sm active fas fa-cog" type='submit' 
                                aria-pressed="true">
                                
                                </button>
                            </form>

                           <form action="/projetos/destroy" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type='hidden' name='id' value='{{$projeto->id}}'>
                                <button class="btn btn-primary btn-sm active fas fa-trash" type='submit' 
                                aria-pressed="true">
                                
                                </button>
                            </form>
                        </span>
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
