@extends('base')
@section('conteudo')
@section('titulo' , "Formulario Pedido")
<body style="background-color:rgb(183, 255, 201);">

<h2> Listagem de Pedidos </h2>
<h4> Pizzaria Itália Express 🍕</h4> <br>
<header>
    <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
    <nav>
        <ul>
            <div class="col-4" style="">
                <div style="white-space: nowrap;">
                    <h6>Menu de Páginas </h6>

                        <a href="{{url('encomenda/create')}}"class="btn btn-dark" style="display: inline-block; margin-right: 5px;"> Pedidos</a>
                        <a href="{{url('reserva/create')}}"class="btn btn-dark" style="display: inline-block; margin-right: 5px;"> Reservas </a>
                        <a href="{{url('sugestao/create')}}" class="btn btn-dark" style="display: inline-block;"> FeedBacks</a>
                    </div>

            </div>
        </div>
        </ul>
    </nav>
</header>

<form action="{{route('encomenda.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for=""> Nome </label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>

        <div class="col-4" style="">
            <div style="white-space: nowrap;">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                </i>Buscar</button>
                    <a href="{{url('encomenda/create')}}" class="btn btn-dark" style="display: inline-block; margin-right: 10px;"><i class="fa-solid fa-cart-shopping" style="color: #76f0e6;"></i> Novo Pedido</a>
                    <a href="{{ url('encomenda/report') }}" class="btn btn-dark"style="display: inline-block; margin-right: 10px;"><i class="fa-solid fa-file-pdf"style="color:#FF69B4 ;"></i> Relatório PDF</a>
                    <a href="{{url('encomenda/chart')}}" class="btn btn-dark" style="display: inline-block; margin-right: 10px;"><i class="fa-solid fa-layer-group" style="color: #7e71f8;"></i> Gráfico</a>
                </div>

        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th> ID</th>
                    <th> Nome</th>
                    <th> Contato </th>
                    <th> Tamanho </th>
                    <th> Sabor </th>
                    <th> Retirada </th>
                    <th colspan="2">EDITAR</th>
                    <th colspan="2">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($dados as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->contato}}</td>
                <td>{{$item->qtn}}</td>
                <td>{{$item->retirada}}</td>
                <td>{{$item->categoria->nome ?? ""}}</td>
                <td></td>
                <td><a href="{{route('encomenda.edit', $item->id)}}" class="btn btn-dark"><i class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                <td><form action="{{route('encomenda.destroy',$item)}}" method="post">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-outline-danger" title="Deletar"
                        onclick="return confirm('Deseja realmente deletar esse registro?')">
                        <i class="fa-solid fa-trash-can"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop







