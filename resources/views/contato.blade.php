@extends('layouts.app_with_footer')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/contato/contato.css')}}">
@endpush

@section('content')
    <div class="container my-4">
        <div >
            <h1>Entre em Contato: </h1>
        </div>
        <hr>
        <div id="container-geral" class="d-flex flex-wrap">
            <div>
                <ul class="list-unstyled">
                    <li class="my-3">
                        <i class="fas fa-map-marker-alt fa-fw mr-1"></i>
                        <span>{{ $dados_ledes->endereco }}</span>
                    </li>
                    <li class="my-3">
                        <i class="fas fa-inbox fa-fw mr-1"></i>
                        <span>CEP: {{ $dados_ledes->cep }}</span>
                    </li>
                    <li class="my-3">
                        <i class="fas fa-phone-alt fa-fw mr-1"></i>
                        <span>{{ $dados_ledes->telefone }}</span>
                    </li>
                    <li class="my-3">
                        <i class="fas fa-envelope fa-fw mr-1"></i>
                        <span>{{ $dados_ledes->email }}</span>
                    </li>
                </ul>
                <iframe id="map" class="w-100"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14948.368916475332!2d-54.613378!3d-20.5024451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6d7d288192cb4db3!2sLaborat%C3%B3rio%20de%20Engenharia%20de%20Software%20-%20LEDES!5e0!3m2!1spt-BR!2sbr!4v1570375952642!5m2!1spt-BR!2sbr"
                    style="border:0;" allowfullscreen="">
                </iframe>
            </div>
{{--            <div class="col-sm-12 col-md-7 my-3">--}}
{{--                <form method="POST" action="{{ route('atualizar_ledes') }}">--}}
{{--                    @csrf--}}
{{--                    @method('post')--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="nome"--}}
{{--                               class="col-md-4 col-form-label text-md-right">Nome</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="nome" type="text"--}}
{{--                                   class="form-control @error('nome') is-invalid @enderror" name="nome"--}}
{{--                                   value="{{ old('nome') }}" required autofocus>--}}

{{--                            @error('nome')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="email" type="email"--}}
{{--                                   class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--                                   value="{{ old('email') }}" required autofocus>--}}

{{--                            @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="empresa" type="text"--}}
{{--                                   class="form-control @error('empresa') is-invalid @enderror" name="empresa"--}}
{{--                                   value="{{ old('empresa') }}" autofocus>--}}

{{--                            @error('empresa')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="telefone" type="text"--}}
{{--                                   class="form-control @error('telefone') is-invalid @enderror" name="telefone"--}}
{{--                                   value="{{ old('telefone') }}" autofocus>--}}

{{--                            @error('telefone')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="mensagem" class="col-md-4 col-form-label text-md-right">Mensagem</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <textarea class="col-12 p-2" rows="4" id="mensagem" name="mensagem" style="resize:none"></textarea>--}}

{{--                            @error('mensagem')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row mb-0">--}}
{{--                        <div class="col-md-6 offset-md-4">--}}
{{--                            <button type="submit" class="btn btn-primary">--}}
{{--                                Enviar Mensagem--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
