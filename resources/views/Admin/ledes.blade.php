@extends('layouts.app_with_footer')

@push('scripts')
    <script src="{{asset('js/admin/ledes.js')}}"></script>

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Informações do LEDES</div>

                    <div class="card-body">
                        <p>As informações definidas neste formulário estarão visiveis para todos os usuários na página
                            "sobre" e na página "contato", por favor certifique-se da
                            corretude das informações e de adesão com as normas gramáticais.</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('atualizar_ledes') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="nome"
                                       class="col-md-4 col-form-label text-md-right">Nome do laboratório</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control @error('nome') is-invalid @enderror" name="nome"
                                           value="{{ $dados_ledes->nome }}" required autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email do
                                    laboratório</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $dados_ledes->email }}" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="horario_abertura"
                                       class="col-md-4 col-form-label text-md-right">Horário de Abertura</label>

                                <div class="col-md-6">
                                    <input id="horario_abertura" type="time"
                                           class="form-control @error('horario_abertura') is-invalid @enderror"
                                           name="horario_abertura"
                                           value="{{ $dados_ledes->horario_abertura }}" required autofocus>

                                    @error('horario_abertura')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="horario_encerramento"
                                       class="col-md-4 col-form-label text-md-right">Horário de Encerramento</label>

                                <div class="col-md-6">
                                    <input id="horario_encerramento" type="time"
                                           class="form-control @error('horario_encerramento') is-invalid @enderror"
                                           name="horario_encerramento"
                                           value="{{ $dados_ledes->horario_encerramento }}" required autofocus>

                                    @error('horario_encerramento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar Informações
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
