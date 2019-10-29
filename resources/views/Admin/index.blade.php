@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/admin/index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="">Área do Administrador</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab  item">
                <a href="{{route('gerenciar_users')}}">
                    <div class="folded-corner service_tab_1">
                        <div class="text">
                            <i class="fas fa-users-cog fa-5x fa-icon-image"></i>
                            <h3>Gerenciar Usuários</h3>
                            <p>
                                Adicionar, Editar, Alterar Permissões e Remover Usuários.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
                <a href="{{route('gerenciar_projetos')}}">
                    <div class="folded-corner service_tab_1">
                        <div class="text">
                            <i class="fas fa-tasks fa-5x fa-icon-image"></i>
                            <h3>Gerenciar Projetos</h3>
                            <p>
                                Adicionar, Editar e Remover Projetos, seus membros e os papeis de tais membros.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fas fa-newspaper fa-5x fa-icon-image"></i>
                        <h3>Gerenciar Posts e Notícias</h3>
                        <p>
                            Adicionar, Editar e Remover Notícias, seus anexos e atributos
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
                <a href="{{ route('gerenciar_ledes') }}">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fas fa-info-circle fa-5x fa-icon-image"></i>
                        <h3>Informações do LEDES</h3>
                        <p>
                            Alterar as informações do laboratório LEDES, exibidas na página de contato.
                        </p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
@endsection
