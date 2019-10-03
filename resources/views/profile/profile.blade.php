@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container d-flex justify-content-center">
        <div class=" col-lg-8 col-md-10 col-sm-12 m-sm-0 bg-white p-3" id="#profile-container">
            <div class="d-flex flex-wrap" id="profile-intro">
                    <img src="{{ asset('/images/profile/profile_pic_not_avaliable.jpg') }}" alt="Profile Pic"
                         class="rounded-circle mr-3">
                <div class="">
                    <h1 class="mt-2">{{ $view_data['usuario']['username'] }}</h1>
                    <ul class="p-0">
                        <li>
                            <i class="fas fa-envelope fa-fw"></i><span
                                class="">{{ $view_data['usuario']['email'] }}</span>
                        </li>
                        <li>
                            <i class="fas fa-user-tag fa-fw"></i><span>Administrador</span>
                        </li>
                        <li>
                            <i class="fas fa-graduation-cap fa-fw"></i><!--
                            @if(empty($view_data['pessoa']['curso']))
                            !--><span>Curso não informado</span><!--
                            @else
                            !--><span>{{$view_data['pessoa']['curso']}}</span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="align-self-end ml-auto">
                    <a href="profile/{{ $view_data['usuario']['id'] }}/edit" class="btn btn-primary btn-lg active "
                       role="button" aria-pressed="true">Edit</a>
                </div>
            </div>

            <hr>

            {{--        SE NAO ENCONTRAR PESSOA P/ USUARIO MOSTRAR IMG DE DADOS NAO PREENCHIDOS                                 --}}
            <div class="" id="profile-pessoa">
                <h2>Pessoal:</h2>
                @if(!empty($view_data['pessoa']))
                    <ul class="pl-4">
                        <li><h3>{{ $view_data['pessoa']['nome'] }}</h3></li>
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>{{ $view_data['pessoa']['cidade'] }} {{ $view_data['pessoa']['estado'] }}
                        </li>
                        <li><i class="fas fa-phone fa-fw"></i>{{ $view_data['pessoa']['telefone'] }}</li>
                        <li><i class="fas fa-birthday-cake fa-fw"></i>{{ $view_data['pessoa']['data_nascimento'] }}</li>
                    </ul>
            </div>
            @else
                <p>O usuário não tem dados informados</p>
            @endif
            <hr>

            {{--            LOOP AQUI - IF PROJETOS VAZIOS MOSTRAR IMG DE SEM PROJETOS--}}
            <div id="profile-projetos" class="">
                <h2 class="flex-row">Projetos: </h2>
                @if(isset($view_data['projetos']))
                    @foreach($view_data['projetos'] as $projeto)
                        <div id="profile-projeto" class="d-flex flex-wrap">
                            <img src="{{ asset('/images/profile/no-img.png') }}" alt="" class="">
                            <div>
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
                        </div>
                        <hr>
                    @endforeach
            </div>

            @else
                <p>O usuário não é membro de nenhum projeto</p>
            @endif
        </div>
    </div>
@endsection
