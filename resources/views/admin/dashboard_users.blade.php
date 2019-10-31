@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/dashboard_users.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <tr id="{{ 'tr_user_'.$user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->getRoleNames() as $role)
                            @if($role === 'administrador')
                                <span class="py-1 px-2 rounded text-white"
                                      style="background-color: #007B5E;">{{ $role }}</span>
                            @else
                                <span class="py-1 px-2 rounded text-white"
                                      style="background-color: #5541c6;">{{ $role }}</span>
                            @endif
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

                        <span class="btn btn-primary btn-sm active"
                              role="button" aria-pressed="true"
                              onclick="deleteUser('{{ $user->id }}', '{{ $user->name }}');"><i
                                class="fas fa-trash"></i></span>
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
