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
                                <h3>Este usuário não tem roles associadas.</h3>
                            @else
                                <h3>Roles: </h3>
                                @foreach($roles as $role)
                                    <div id="role-div-{{$role->id}}">
                                        <div class="d-flex mb-3 list-group-item">
                                            <span class="role-name">{{$role->name}}</span>
                                            <span class="btn btn-primary btn-sm active ml-auto align-self-center"
                                                  role="button" aria-pressed="true"
                                                  onclick="removeRoleFromUser('{{ $user->id }}', '{{ $user->name }}', '{{$role->name}}', '{{$role->id}}');"><i
                                                    class="fas fa-trash"></i></span>
                                        </div>
                                        <h4>Permissões de {{$role->name}}: </h4>
                                        <ul class="list-group">
                                            @foreach($role->permissions()->get() as $permission)
                                                <li class="list-group-item">
                                                    <div class="d-flex">
                                                        <span>{{$permission->name}}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <hr>

                                    </div>
                                @endforeach
                            @endif

                            <h3>Adicionar Roles</h3>
                            <select class="form-control" id="select-roles" name="select-roles">
                                @foreach($all_roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="addRolesToUser('{{ $user->id }}', '{{ $user->name }}')"
                                    class="btn btn-primary mt-2">Adicionar roles ao usuário
                            </button>

                            <hr>

                            <div id="direct-permission-wrapper">
                                @if(!isset($direct_permissions))
                                    <h3 id="title-permissoes-diretas">Este usuário não tem permissões diretas
                                        associadas.</h3>
                                @else
                                    <h3 id="title-permissoes-diretas">Permissões concedidas diretamente ao
                                        usuário: </h3>
                                    @foreach($direct_permissions as $direct_permission)
                                        <div class="d-flex px-3 my-1 direct-permission-div"
                                             id="direct-permission-{{$direct_permission->id}}">
                                            <h4 class="my-auto">{{$direct_permission->name}}</h4>
                                            <span
                                                class="btn btn-primary btn-sm active ml-auto align-self-center"
                                                role="button" aria-pressed="true"
                                                onclick="removePermissionFromUser('{{ $user->id }}', '{{ $user->name }}', '{{$direct_permission->name}}', '{{$direct_permission->id}}');">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <hr>

                            <h3>Adicionar Permissões</h3>
                            <select class="form-control" id="select-permisao" name="select-permisao">
                                @if(isset($non_selected_user_direct_permissions))
                                    @foreach($non_selected_user_direct_permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach

                                @else
                                    <option disabled value="">O usuário ja tem todas as permissões concedidas a ele
                                    </option>
                                @endif
                            </select>
                            <button type="button" onclick="addPermissionToUser('{{ $user->id }}', '{{ $user->name }}')"
                                    class="btn btn-primary mt-2">Adicionar permissão ao usuário
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

