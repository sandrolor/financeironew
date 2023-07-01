@extends('index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Movimentos') }}</div>
                    <div class="card-body">
                        <form action="{{ route('cadastrar.movimento') }}" method="POST">
                            @csrf
                            <div class="col-2 mb-3">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control col-2 @error('data_mov') is-invalid @enderror"
                                    id="data_mov" name="data_mov" value="{{ old('data_mov') }}" autofocus>
                                @if ($errors->has('data_mov'))
                                    <div class="invalid-feedback">{{ $errors->first('data_mov') }}</div>
                                @endif
                            </div>
                            <div class="col-8 mb-3">
                                <label class="form-label">Descrição</label>
                                <input type="text" class="form-control @error('descricao') is-invalid @enderror"
                                    id="descricao" name="descricao" value="{{ old('descricao') }}">
                                @if ($errors->has('descricao'))
                                    <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                @endif
                            </div>
                            <div class="row g-2 align-items-center">
                            <div class="col-4 mb-3">
                                <label class="form-label">Conta</label>
                                <select class="form-select @error('conta_id') is-invalid @enderror" name="conta_id"
                                    id="conta_id">
                                    <option selected></option>
                                    @foreach ($findConta as $Conta)
                                        <option value="{{ $Conta->id }}">{{ $Conta->nome }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('conta_id'))
                                    <div class="invalid-feedback">{{ $errors->first('conta_id') }}</div>
                                @endif
                            </div>

                            <div class="col-4 mb-3">
                                <label class="form-label">Categoria</label>
                                <select class="form-select @error('categoria_id') is-invalid @enderror"
                                    aria-label="Default select example" name="categoria_id" id="categoria_id">
                                    <option selected></option>
                                    @foreach ($findCategoria as $Categoria)
                                        <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categoria_id'))
                                    <div class="invalid-feedback">{{ $errors->first('categoria_id') }}</div>
                                @endif
                            </div>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input checked class="form-check-input" type="radio" name="tipoMov" id="inlineRadio1"
                                    value="D">
                                <label class="form-check-label" for="inlineRadio1">Despesa</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="tipoMov" id="inlineRadio2"
                                    value="R">
                                <label class="form-check-label" for="inlineRadio2">Receita</label>
                            </div>

                            <div class="col-2 mb-3">
                                <label class="form-label">Valor</label>
                                <input type="text" class="form-control @error('valor') is-invalid @enderror"
                                    id="mascara_valor" name="valor" value="{{ old('valor') }}">
                                @if ($errors->has('valor'))
                                    <div class="invalid-feedback">{{ $errors->first('valor') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
