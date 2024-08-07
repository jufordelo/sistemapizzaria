@extends('base')
@section('conteudo')
@section('titulo', 'Formulario Sugestao')

<body style="background-color:rgb(182, 234, 255);">

    <h3> Listagem de Sugestões </h3>
    <h5> BREKIEE COFFEE<i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h5> <br>
    <header>
        <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
        <nav>
            <ul>
                <div class="col-4" style="">
                    <div style="white-space: nowrap;">
                        <h6>Menu de Páginas </h6>
                            <a href="{{url('encomenda/create')}}" class="btn btn-outline-light btn-sm text-dark" style="display: inline-block; margin-right: 5px;"> Encomenda</a>
                            <a href="{{url('reserva/create')}}" class="btn btn-outline-light btn-sm text-dark" style="display: inline-block; margin-right: 5px;"> Reserva</a>
                            <a href="{{url('sugestao/create')}}" class="btn btn-outline-light  btn-sm text-dark" style="display: inline-block;"> FeedBacks</a>
                            <a href="{{url('personalizado/create')}}" class="btn btn-outline-light  btn-sm text-dark" style="display: inline-block;"> Personalizados</a>
                            <a href="{{url('estoque/create')}}" class="btn btn-outline-light  btn-sm text-dark" style="display: inline-block;">Estoque</a>

                        </div>

                </div>
            </div>
            </ul>
        </nav>
    </header>

    <form action="{{ route('sugestao.search') }}" method="post">
        <div class="row">
            @csrf
            <div class="col-4">
                <label for=""> Assunto </label><br>
                <input type="text" name="assunto" class="form-control"><br>
            </div>
            <div class="col-4" style="">
                <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                    </i> Buscar </button>

                <a href="{{ url('sugestao/create') }}" class="btn btn-dark"> <i class="fa-solid fa-pen-to-square"
                        style="color: #a58eec;"></i> </i> Nova
                    Sugestão</a>
            </div>
        </div>
    </form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Assunto</th>
                <th>Grau de atendimento</th>
                <th>Comentário</th>
                <th colspan="2">EDITAR</th>
                <th colspan="2">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->assunto }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->comentario }}</td>
                    <td><a href="{{ route('sugestao.edit', $item->id) }}"class="btn btn-dark"><i
                                class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                    <td colspan="2">
                        <form action="{{ route('sugestao.destroy', $item) }}" method="post">
                            @method('DELETE')
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
