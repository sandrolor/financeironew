@extends('index')
@section('content')
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contas</h5>
                    <p class="card-text">Número de Contas registradas no sistema.</p>
                    <a href="{{ route('conta.index') }}" class="btn btn-primary">{{ $findConta }} - Contas</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <p class="card-text">Número de Categorias registradas no sistema.</p>
                    <a href="{{ route('categoria.index') }}" class="btn btn-primary">{{ $findCategoria }} - Categorias</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Movimentos</h5>
                    <p class="card-text">Número de Movimentos registrados no sistema.</p>
                    <a href="{{ route('movimento.index') }}" class="btn btn-primary">{{ $findMovimento }} - Movimentos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
