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
                <th>Descrição</th>
                <th>Conta</th>
                <th>Categoria</th>
                <th>Valor</th>
            </tr>
            <tr>
        </thead>
        <tbody>
            @foreach ($findMovimento as $movimento)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($movimento->data_mov)->format('d/m/Y') }} - </td>
                    <td>{{ $movimento->descricao }} - </td>
                    <td>{{ $movimento->conta->nome }} - </td>
                    <td>{{ $movimento->categoria->nome }} - </td>
                    <td>{{ 'R$' . ' ' . number_format($movimento->valor, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        </tr>
    </table>
</body>
</html>
