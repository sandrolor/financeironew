@extends('index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Atualizar Movimentos') }}</div >
                <div class="card-body">
                    <form action="{{ route('atualizar.movimento', $findMovimento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" class="form-control @error('data_mov') is-invalid @enderror" id="data_mov" name="data_mov" value="{{isset ($findMovimento->data_mov) ? $findMovimento->data_mov : old('data_mov')}}" autofocus>
                            @if ($errors->has('data_mov'))
                                <div class="invalid-feedback">{{ $errors->first('data_mov') }}</div>                
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{isset ($findMovimento->descricao) ? $findMovimento->descricao : old('descricao')}}">
                            @if ($errors->has('descricao'))
                                <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>                
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Conta</label>
                            <select class="form-select @error('conta_id') is-invalid @enderror" name="conta_id" id="conta_id">
                                <option selected value="{{isset ($findMovimento->conta->id) ? $findMovimento->conta->id : old('conta_id')}}">{{isset ($findMovimento->conta->nome) ? $findMovimento->conta->nome : old('conta_id')}}</option>
                                @foreach ($findConta as $Conta)
                                    <option value="{{$Conta->id}}">{{$Conta->nome}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('conta_id'))
                                <div class="invalid-feedback">{{ $errors->first('conta_id') }}</div>                
                            @endif
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <select class="form-select @error('categoria_id') is-invalid @enderror" aria-label="Default select example" name="categoria_id" id="categoria_id">
                                <option selected value="{{isset ($findMovimento->categoria->id) ? $findMovimento->categoria->id : old('categoria_id')}}">{{isset ($findMovimento->categoria->nome) ? $findMovimento->categoria->nome : old('categoria_id')}}</option>
                                @foreach ($findCategoria as $Categoria)
                                    <option value="{{$Categoria->id}}">{{$Categoria->nome}}</option>    
                                @endforeach
                            </select>
                            @if ($errors->has('categoria_id'))
                                <div class="invalid-feedback">{{ $errors->first('categoria_id') }}</div>                
                            @endif
                        </div>

                        <div class="form-check form-check-inline">
                            @if ($findMovimento->valor < 0)
                                <input checked class="form-check-input" type="radio" name="tipoMov" id="inlineRadio1" value="D">    
                            @else
                                <input class="form-check-input" type="radio" name="tipoMov" id="inlineRadio1" value="D">    
                            @endif
                            <label class="form-check-label" for="inlineRadio1">Despesa</label>
                          </div>
                          <div class="form-check form-check-inline">
                            @if ($findMovimento->valor > 0)
                                <input checked class="form-check-input" type="radio" name="tipoMov" id="inlineRadio2" value="R">
                            @else
                                <input class="form-check-input" type="radio" name="tipoMov" id="inlineRadio2" value="R">
                            @endif
                            <label class="form-check-label" for="inlineRadio2">Receita</label>
                          </div>

                        <div class="mb-3">
                            <label class="form-label">Valor</label>
                            <input type="text" class="form-control @error('valor') is-invalid @enderror" id="mascara_valor" name="valor" value="{{isset ($findMovimentoValor) ? $findMovimentoValor : old('valor')}}">
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