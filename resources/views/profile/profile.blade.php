@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container d-flex justify-content-center">
        <div class=" col-lg-8 col-md-10 col-sm-12 m-sm-0 bg-white p-3" id="#profile-container">

            <!-------------------------- PROFILE INTRO -------------------------->

            <div class="d-flex flex-wrap" id="profile-intro">
                <img src="{{ asset('/images/profile/profile_pic_not_avaliable.jpg') }}" alt="Profile Pic"
                     class="rounded-circle mr-3">
                <div class="">
                    <h1 class="mt-2">{{ $view_data['usuario']['username'] }}</h1>
                    <ul class="p-0">
                        <li>
                            <i class="fas fa-envelope fa-fw"></i>
                            <span>{{ $view_data['usuario']['email'] }}</span>
                        </li>
                        <li>
                            <i class="fas fa-user-tag fa-fw"></i>
                            <span>Administrador</span>
                        </li>
                        <li>
                            <i class="fas fa-graduation-cap fa-fw"></i>
                            @if(empty($view_data['pessoa']['curso']))
                                <span>Curso não informado</span>
                            @else
                                <span>{{$view_data['pessoa']['curso']}}</span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="align-self-end ml-auto">
                    @if($view_data['usuario']['id'] == Auth::user()->id)
                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary btn-lg active "
                           role="button" aria-pressed="true">Edit</a>
                    @endif
                </div>
            </div>
            <hr>

            <!-------------------------- PROFILE PESSOA -------------------------->

            <div class="" id="profile-pessoa">
                <h2>Pessoal:</h2>
                @if(!empty($view_data['pessoa']))
                    <ul class="pl-4">
                        <li><h3>{{ $view_data['pessoa']['nome'] }}</h3></li>
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            @if(empty($view_data['pessoa']['estado']))
                                <span>Endereço não informado</span>
                            @else
                                <span>{{ $view_data['pessoa']['cidade'] }}, {{ $view_data['pessoa']['estado'] }}</span>
                            @endif
                        </li>
                        <li>
                            <i class="fas fa-phone fa-fw"></i>
                            @if(empty($view_data['pessoa']['telefone']))
                                <span>Telefone não informado</span>
                            @else
                                <span>{{ $view_data['pessoa']['telefone'] }}</span>
                            @endif
                        </li>
                        <li>
                            <i class="fas fa-birthday-cake fa-fw"></i>
                            <span>{{ $view_data['pessoa']['data_nascimento_dmY'] }}</span>
                        </li>
                    </ul>
                @else
                    <p>O usuário não tem dados informados</p>
                @endif
            </div>
            <hr>

            <!-------------------------- PROFILE PROJETOS -------------------------->

            <div id="profile-projetos" class="">
                <h2 class="flex-row">Projetos: </h2>
                @if(count($view_data['projetos']) != 0)
                    @foreach($view_data['projetos'] as $projeto)
                        <div id="profile-projeto" class="d-flex flex-wrap">
                            <img src="{{ asset('/images/profile/project_pic_not_avaliable.png') }}" alt=""
                                 class="img-fluid">
                            <ul class="align-self-center p-0">
                                <li><h3>{{ $projeto['nome'] }}</h3></li>

                                @if(isset($projeto['papeis']))
                                    @foreach($projeto['papeis'] as $papel)
                                        <li>
                                            <div id="papel">
                                                <ul class="p-0">
                                                    <li>
                                                        <h5>{{ $papel['funcao'] }}</h5>
                                                    </li>
                                                    <li>
                                                        <span>{{ $papel['data_inicio'] }} Até {{ $papel['data_fim'] }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p>O usuário não é membro de nenhum projeto</p>
                @endif
            </div>
        </div>
    </div>
@endsection
