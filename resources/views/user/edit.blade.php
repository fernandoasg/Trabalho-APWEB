@extends('layouts.app_with_footer')

@push('scripts')
    <script src="{{ asset('js/admin/edit_user.js') }}" defer></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin/edit_user.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Permissões de Usuário</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <h1>Usuário: {{ $user->name }}</h1>
                            <hr>

                            @if(!isset($roles))
                                <h2>Este usuário não tem roles ou permissões associadas.</h2>
                            @else
                                <h2>Funções: </h2>
                                @foreach($roles as $role)
                                    <div id="role-div-{{$role->id}}">
                                        <div class="d-flex mb-5 list-group-item">
                                            <span class="role-name">{{$role->name}}</span>
                                            <span class="btn btn-primary btn-sm active ml-auto align-self-center"
                                                  role="button" aria-pressed="true"
                                                  onclick="removeRoleFromUser('{{ $user->id }}', '{{ $user->name }}', '{{$role->name}}', '{{$role->id}}');"><i
                                                    class="fas fa-trash"></i></span>
                                        </div>
                                        <h3>Permissões de {{$role->name}}: </h3>
                                        <ul class="list-group">
                                            @foreach($role->permissions()->get() as $permission)
                                                <li class="list-group-item">
                                                    <div class="d-flex">
                                                        <span>{{$permission->name}}</span>
                                                        {{--                                                    <span--}}
                                                        {{--                                                        class="btn btn-primary btn-sm active ml-auto align-self-center"--}}
                                                        {{--                                                        role="button" aria-pressed="true"--}}
                                                        {{--                                                        onclick="removePermissionFromUser('{{ $user->id }}', '{{ $user->name }}', '{{$permission->name}}', '{{$permission->id}}');"><i--}}
                                                        {{--                                                            class="fas fa-trash"></i></span>--}}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                            <input type='hidden' value='' name='id'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

