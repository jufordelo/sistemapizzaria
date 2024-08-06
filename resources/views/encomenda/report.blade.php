<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> RELATÓRIO DE ENCOMENDAS </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h3>{{ $titulo }}</h3>

    <table class="table table-striped">

        <thead>

            <tr>
                <th scope="col"> ID </th>
                <th scope="col"> Nome </th>
                <th scope="col"> Contato </th>
                <th scope="col"> Quantidade </th>
                <th scope="col"> Categoria </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($encomenda as $encomenda)
                <tr>
                    <th scope="row">{{ $encomenda->id }}</th>
                    <td>{{ $encomenda->nome }}</td>
                    <td>{{ $encomenda->contato}}</td>
                    <td>{{ $encomenda->qtn}}</td>
                    <td>{{ $encomenda->categoria->nome ?? '' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6"> Sem registro </td>
                </tr>
            @endforelse
        </tbody>
    </table>


</body>

</html>
