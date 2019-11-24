@extends('layouts.app_with_footer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">Cadastrar Novo Projeto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projeto.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome do Projeto</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control @error('nome') is-invalid @enderror" name="nome"
                                           value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                                <div class="col-md-6">
                                    <textarea id="descricao"
                                              class="form-control"
                                              name="descricao"
                                              rows="5"
                                              required>{{ old('descricao') }}</textarea>

                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_inicio" class="col-md-4 col-form-label text-md-right">Data de
                                    Inicio</label>

                                <div class="col-md-6">
                                    <input id="data_inicio" type="date"
                                           class="form-control @error('data_inicio') is-invalid @enderror"
                                           name="data_inicio"
                                           value="{{ old('data_inicio') }}" required autocomplete="data_inicio"
                                           autofocus>

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
                                           value="{{ old('data_fim') }}" autocomplete="data_fim" autofocus>

                                    @error('data_fim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="membros" class="col-md-4 col-form-label text-md-right">Membros</label>

                                <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAddMembros">
                                                Adicionar membros
                                            </button>
                                </div>
                            </div>
                            <div id="lista-de-membros" class="form-group row mt-2">
                               
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

                <!-- Modal Add Membros -->
                <div class="modal fade" id="modalAddMembros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Membros</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @foreach($pessoas as $pessoa)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkBox{{$pessoa->id}}">
                                    <label id="nome{{$pessoa->id}}" class="custom-control-label" for="checkBox{{$pessoa->id}}">{{$pessoa->nome_completo}}</label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button id="saveMembersModal" type="button" class="btn btn-primary" onclick="deleteUser();">Salvar mudanças</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/admin/create_projeto.js') }}"></script>
@endpush

