@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-10 bg-white p-3" id="#profile-container">
            <div id="profile-intro" class="d-flex">
                <img src="{{ asset('/images/profile/profile_pic_not_avaliable.jpg') }}" alt="Profile Pic"
                     class="rounded-circle">
                <div class="">
                    <h1 class="">{{ $view_data['username'] }}</h1>
                    <ul class="align-self-center">
                        <li>
                            <span class="">{{ $view_data['email'] }}</span>
                        </li>
                        <li>
                            <span>Administrador</span>
                        </li>
                        <li>
                            <span>{{ $view_data['curso'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>

            {{--        SE NAO ENCONTRAR PESSOA P/ USUARIO MOSTRAR IMG DE DADOS NAO PREENCHIDOS                                 --}}
            @if(isset(Auth::user()->pessoa))
                <div id="profile-pessoa" class="">
                    <h2>Pessoal:</h2>

                    <ul>
                        <li><h3>{{ $view_data['nome'] }}</h3></li>
                        <li><i class="fas fa-map-marker-alt"></i>
                            {{ $view_data['cidade'] }}, {{ $view_data['estado'] }}
                        </li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-phone"></i>{{ $view_data['telefone'] }}</li>
                    </ul>
                    <ul>
                        <li><i class="fas fa-birthday-cake"></i>{{ $view_data['data_nascimento'] }}</li>
                    </ul>
                </div>
            @endif
            <hr>

            {{--            LOOP AQUI - IF PROJETOS VAZIOS MOSTRAR IMG DE SEM PROJETOS--}}
            @if(isset($view_data['projetos']))
                <div id="profile-projetos">
                    <h2>Projetos: </h2>
                    @foreach($view_data['projetos'] as $projeto)
                        <div id="profile-projeto" class="d-flex">
                            <img src="{{ asset('/images/profile/no-img.png') }}" alt="">
                            <div>
                                <ul class="align-self-center">
                                    <li><h3>{{ $projeto->nome }}</h3></li>
                                    <li>
                                        <span>Analista de Requisitos</span>
                                    </li>
                                    <li>
                                        <span>23/10/2018 Até o Momento</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
