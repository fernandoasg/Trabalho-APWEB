@extends('layouts.app_with_footer')

@push('styles')
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-10 bg-white p-3" id="#profile-container">
            <div id="profile-intro" class="row">
                <img src="{{ asset('/images/profile/profile_pic_not_avaliable.jpg') }}" alt="Profile Pic"
                     class="rounded-circle">
                <div>
                    <h1 class="">{{ Auth::user()->name }}</h1>
                    <ul class="align-self-center">
                        <li>
                            <span class="">{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <span>{{ $userRole }}</span>
                        </li>
                        <li>
                            <span>
                                @if(isset(Auth::user()->pessoa))
                                    Curso da Silva
                                @else
                                    Nenhum Curso Registrado
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div id="profile-pessoa" class="">
                <h2>Pessoal:</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Rua Dr Oswaldo Arantes Filho</li>
                </ul>
                <ul>
                    <li><i class="fas fa-phone"></i> (67) 99880-1996</li>
                </ul>
                <ul>
                    <li><i class="fas fa-birthday-cake"></i> 23/10/1996</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
