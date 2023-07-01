@extends('index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Movimentos') }}</div>
                    <div class="card-body">
                        <form action="{{ route('movimento.index') }}" method="GET" class="form-inline">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control-sm col-2 mb-3" name="pesquisar" id="pesquisar"
                                    placeholder="Digite o nome" />
                                <select name="conta_id" class="form-control-sm col-2 mb-3">
                                    <option selected></option>
                                    @foreach ($findConta as $Conta)
                                        <option value="{{ $Conta->id }}">{{ $Conta->nome }}</option>
                                    @endforeach
                                </select>
                                <input type="date" class="form-control-sm col-2 m-1" name="data_ini" />
                                <input type="date" class="form-control-sm col-2 m-1" name="data_fim" />
                                <button class="btn btn-secondary mb-3">Pesquisar</button>
                                <a href="{{ route('cadastrar.movimento') }}" type="button"
                                    class="btn btn-success float-end">Novo Movimento</a>
                            </div>
                        </form>

                        @if ($findMovimento->isEmpty())
                            <p>Não existem dados</p>
                        @else
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Data</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Conta</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($findMovimento as $movimento)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($movimento->data_mov)->format('d/m/Y') }}</td>
                                            <td>{{ $movimento->descricao }}</td>
                                            <td>{{ $movimento->conta->nome }}</td>
                                            <td>{{ $movimento->categoria->nome }}</td>
                                            <td>{{ 'R$' . ' ' . number_format($movimento->valor, 2, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('atualizar.movimento', $movimento->id) }}"
                                                    class="btn btn-light btn-sm">Editar</a>
                                                <form method="POST"
                                                    action="{{ route('movimento.delete', $movimento->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <div class="form-control">
                                    Total Pesquisado: {{ 'R$' . ' ' . number_format($totalFind, 2, ',', '.') }} - {{ $pesquisar }} - De: {{ \Carbon\Carbon::parse($dataIni)->format('d/m/Y') }} a: {{ \Carbon\Carbon::parse($dataFim)->format('d/m/Y') }} - Conta: {{ $ContaDesc }}  | Saldo Total: {{ 'R$' . ' ' . number_format($totalMov, 2, ',', '.') }}
                                </div>
                            </table>
                            <div class="py-4">
                                {{ $findMovimento->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
