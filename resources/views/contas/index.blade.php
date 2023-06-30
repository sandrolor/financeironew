@extends('index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contas') }}</div >
                    <div class="card-body">
                        <form action="{{ route('conta.index') }}" method="GET" class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form" name="pesquisar" id="pesquisar" placeholder="Digite o nome"/>
                                <button class="btn btn-secondary">Pesquisar</button>
                                <a href="{{ route('cadastrar.conta') }}" type="button" class="btn btn-success float-end">Nova Conta</a>
                            </div>
                        </form>
                        @if ($findConta->isEmpty())
                            <p>Não existem dados</p>
                        @else
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($findConta as $conta)
                                        <tr>
                                            <td>{{ $conta->nome}}</td>
                                            <td>
                                                <a href="{{ route('atualizar.conta', $conta->id) }}" class="btn btn-light btn-sm">Editar</a>
                                                <form method="POST" action="{{ route('conta.delete' , $conta->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                                                </form>
                                            </td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="py-4">
                                {{ $findConta->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection