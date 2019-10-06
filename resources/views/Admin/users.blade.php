@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/users.js') }}"></script>
@endpush

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1>Gerenciar Usuários</h1>
        </div>
        <table class="table table-striped table-bordered w-100" id="tabela_users">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Nome Pessoa</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    </td>
                    @if(isset($user->pessoa))
                        <td>{{ $user->pessoa->nome_completo }}</td>
                    @else
                        <td></td>
                    @endif
                    <td id="buttons-collumn">

                        <a href="{{ route('profile.show', $user->id) }}" class="btn btn-primary btn-sm active"
                           role="button" aria-pressed="true"><i class="fas fa-info-circle"></i></a>

                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary btn-sm active my-1"
                           role="button" aria-pressed="true"><i class="fas fa-cog"></i></a>

                        <a href="" class="btn btn-primary btn-sm active"
                           role="button" aria-pressed="true" onclick="deleteUser( {{ $user->id }} );"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('register') }}"
           class="btn btn-primary btn-lg active"
           role="button" aria-pressed="true">Criar Usuário</a>
    </div>
@endsection
