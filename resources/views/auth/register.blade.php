<?php

/*
 * Por mais que seja feio tem lógica aqui porque não quero dor de cabeça com
 * ovveride das classes do laravel
 */
$estados = App\Models\Endereco\Estado::orderBy('nome', 'ASC')->get();
$cidades = App\Models\Endereco\Cidade::orderBy('nome', 'ASC')->get();

?>

@extends('layouts.app_with_footer')

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() !== ''){
                    let select = $(this).attr("id");
                    let value = $(this).val();
                    let dependent = $(this).data('dependent');
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"/ajax_cidade",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            })
        })
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Novo Usuário</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <h3>Usuário: </h3>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome de Usuário</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar
                                    Senha</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <hr>

                            <h3>Pessoal: </h3>

                            <div class="form-group row">
                                <label for="nome-completo" class="col-md-4 col-form-label text-md-right">Nome
                                    Completo</label>

                                <div class="col-md-6">
                                    <input id="nome-completo" type="text"
                                           class="form-control @error('nome-completo') is-invalid @enderror"
                                           name="nome_completo" required autocomplete="nome-completo">

                                    @error('nome-completo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data-nascimento" class="col-md-4 col-form-label text-md-right">Data de
                                    Nascimento</label>

                                <div class="col-md-6">
                                    <input id="data-nascimento" type="date"
                                           class="form-control @error('data-nascimento') is-invalid @enderror"
                                           name="data_nascimento" required autocomplete="data-nascimento">

                                    @error('data-nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sexo" class="col-md-4 col-form-label text-md-right">Gênero</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text"
                                           class="form-control @error('telefone') is-invalid @enderror" name="telefone"
                                           required autocomplete="telefone">

                                    @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="curso" class="col-md-4 col-form-label text-md-right">Curso</label>

                                <div class="col-md-6">
                                    <input id="curso" type="text"
                                           class="form-control @error('curso') is-invalid @enderror" name="curso"
                                           required autocomplete="curso">

                                    @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <h3>Endereco: </h3>

                            <div class="form-group row">
                                <label for="cep" class="col-md-4 col-form-label text-md-right">CEP</label>

                                <div class="col-md-6">
                                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                           name="cep" required autocomplete="cep">

                                    @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                                <div class="col-md-6">
                                    <select name="estado" id="estado" class="form-control dynamic"
                                            data-dependent="cidade">
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cidade" class="col-md-4 col-form-label text-md-right dynamic">Cidade</label>

                                <div class="col-md-6">
                                    <select name="cidade" id="cidade" class="form-control input-lg">
                                        <option value="">Select City</option>
                                    </select>
                                    @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rua" class="col-md-4 col-form-label text-md-right">Rua</label>

                                <div class="col-md-6">
                                    <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"
                                           name="rua" required autocomplete="rua">

                                    @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="numero-rua" class="col-md-4 col-form-label text-md-right">Numero</label>

                                <div class="col-md-6">
                                    <input id="numero-rua" type="text"
                                           class="form-control @error('numero-rua') is-invalid @enderror"
                                           name="numero_rua" required autocomplete="numero-rua">

                                    @error('numero-rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


