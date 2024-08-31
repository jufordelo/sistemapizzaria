@extends('base')
@section('conteudo')
@section('titulo', 'Formulario Sugestao')

<body style="background-color:rgb(182, 234, 255);">

    <h3> Listagem de Sugestões </h3>

    <header>
        <!-- Aqui vai o cabeçalho com logo, navegação principal, etc. -->
        <nav>
            <ul>
     
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
                    @php
                        $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                    @endphp
                    <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="imagem" /></td>
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
