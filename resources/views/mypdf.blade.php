<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrapmin.css" integrity="">
    <title>PDF</title>
</head>

<body>
    <h3>Movimento</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Sd Dia</th>
                <th>Descrição</th>
                <th>Conta</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Saldo</th>
            </tr>
            <tr>
        </thead>
        <tbody>
            {{ $total = 0 }}
            {{ $subtotal = 0 }}
            {{ $data_soma = '' }}
            {{ $saldo = 0 }}
            @foreach ($findMovimento as $movimento)
                <tr>
                    @if ($data_soma == $movimento->data_mov)
                        <td>{{ \Carbon\Carbon::parse($movimento->data_mov)->format('d/m/Y') }}</td>
                        {{ $subtotal += $movimento->valor }}
                        <td>{{ 'R$' . ' ' . number_format($subtotal, 2, ',', '.') }}</td>
                    @else
                        <td>{{ \Carbon\Carbon::parse($movimento->data_mov)->format('d/m/Y') }}</td>
                        {{ $subtotal = 0 }}
                        {{ $subtotal += $movimento->valor }}
                        <td>{{ 'R$' . ' ' . number_format($subtotal, 2, ',', '.') }}</td>
                    @endif
                    {{ $total += $movimento->valor }}

                    <td>{{ $movimento->descricao }}</td>
                    <td>{{ $movimento->conta->nome }}</td>
                    <td>{{ $movimento->categoria->nome }}</td>
                    <td>{{ 'R$' . ' ' . number_format($movimento->valor, 2, ',', '.') }}</td>
                    <td>{{ 'R$' . ' ' . number_format($saldo += $movimento->valor, 2, ',', '.') }}</td>
                </tr>
                {{ $data_soma = $movimento->data_mov }}
            @endforeach
        </tbody>
        </tr>
    </table>
    Total Geral: {{ 'R$' . ' ' . number_format($total, 2, ',', '.') }}
</body>

</html>
