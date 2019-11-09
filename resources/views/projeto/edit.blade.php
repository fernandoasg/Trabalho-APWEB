@extends('layouts.app_with_footer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastrar Novo Projeto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projeto.update', $projeto->id) }}">
                             @csrf
                            @method('PATCH')

                            <input type='hidden' value='{{$projeto->id}}' name='id'>

                            <h3>Projeto: </h3>

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome de Projeto</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control @error('nome') is-invalid @enderror" name="nome"
                                           value="{{$projeto->nome}}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right" >Descrição</label>

                                <div class="col-md-6">
                                    <input id="descricao" 
                                           class="form-control @error('descricao') is-invalid @enderror" name="descricao"
                                           value="{{$projeto->descricao}}" rows="5" required autocomplete="descricao"></textarea>

                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_inicio" class="col-md-4 col-form-label text-md-right">Data de Inicio</label>

                                <div class="col-md-6">
                                    <input id="data_inicio" type="date"
                                           class="form-control @error('data_inicio') is-invalid @enderror" name="data_inicio"
                                           value="{{ $projeto->data_inicio }}" required autocomplete="data_inicio" autofocus>

                                    @error('data_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="data_fim" class="col-md-4 col-form-label text-md-right">Data de Fim</label>

                                <div class="col-md-6">
                                    <input id="data_fim" type="date"
                                           class="form-control @error('data_fim') is-invalid @enderror" name="data_fim"
                                           value="{{ $projeto->data_fim }}" autocomplete="data_fim" autofocus>

                                    @error('data_fim')
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

