@extends('base')
@section('conteudo')

<body style="background-color:rgb(228, 226, 149);" > </body>

   <h3> PIZZARIA ITALIA EXPRESS<i class="fa-solid fa-pizza-slice" style="color: #59ff00;"></i></h3> <br>
    <h4>Faça seu Pedido abaixo: </h4>
    <h9> Caso queira registrar-se clique no botão</h9>
    <a href="{{url('personalizado/create')}}" class="btn btn-outline-light  btn-sm text-dark" style="display: inline-block;"> Quero Personalizar </a>
    @php
        if (!empty($dado->id)) {
            $route = route('pedido.update', $dado->id);
        } else {
            $route = route('pedido.store');
        }
    @endphp
    <form action= "{{ $route }}" method="post">

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


        <label for="">Nome Completo</label> <br>
        <input type="text" name="nome" class="form-control"
            value="@if (!empty($dado->nome)) {{ $dado->nome }}
     @elseif (!empty(old('nome'))) {{ old('nome') }} else{{ '' }} @endif">
        <br>

        <label for="">Contato</label> <br>
        <input type="text" name="contato" class="form-control"
            value="@if (!empty($dado->contato)) {{ $dado->contato }}
     @elseif (!empty(old('contato'))) {{ old('contato') }} else{{ '' }} @endif">
        <br>

        <label for=""> Quantidade de pizzas </label>
        <input type="text" name="qtn" class="form-control"
            value="@if (!empty($dado->qtn)) {{ $dado->qtn }}
     @elseif (!empty(old('qtn'))) {{ old('qtn') }} else{{ '' }} @endif">
        <br>

        <label for="">Horário de Retirada</label>
        <input type="text" name="horareti" class="form-control"
            value="@if (!empty($dado->"horareti")) {{ $dado->horareti }}
     @elseif (!empty(old('horareti'))) {{ old('horareti') }} else{{ '' }} @endif">
        <br>

        <label for="">Insira o tamanho: MÉDIA, GRANDE, PEQUENA:</label>
        <input type="text" name="tamanho" class="form-control"
            value="@if (!empty($dado->tamanho)) {{ $dado->tamanho }}
     @elseif (!empty(old('tamanho'))) {{ old('tamanho') }} else{{ '' }} @endif">
        <br>
        <label for=""> Escolha o Sabor</label><br>
        <select name="categoria_id" class="form-select">
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>


<br>
        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #89ffce;"></i>
Enviar</button>


        <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #89ffce;"></i><a href="{{ url('pedido') }} "></a>Voltar</a></button>

    </form>
@stop
