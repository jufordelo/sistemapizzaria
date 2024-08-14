@extends('base')
@section('conteudo')

    <body style="background-color:rgba(255, 172, 199, 0.863);"> </body>

    <h4>Faça seu Pedido Abaixo:</h4>
    <em> Agora temos a opção de reserva em nosso local, clique e aproveite!</em>
    <br>
    <br>
    <a href="{{ url('reserva/create') }}" class="btn btn-outline-dark">Quero Reservar </a>

    @php
        if (!empty($dado->id)) {
            $route = route('encomenda.update', $dado->id);
        } else {
            $route = route('encomenda.store');
        }
    @endphp
    <form action="{{ $route }}" method="post">

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>

        <label for=""> Nome Completo </label> <br>
        <input type="text" name="nome" class="form-control"
            value="@if (!empty($dado->nome)) {{ $dado->nome }}
     @elseif (!empty(old('nome'))) {{ old('nome') }} else{{ '' }} @endif">

        <label for=""> Seu melhor contato </label> <br>
        <input type="text" name="contato" class="form-control"
            value="@if (!empty($dado->contato)) {{ $dado->contato }}
     @elseif (!empty(old('contato'))) {{ old('contato') }} else{{ '' }} @endif">

        <label for=""> Escolha o tamanho: P, M, G, F</label>
        <input type="text" name="qtn" class="form-control"
            value="@if (!empty($dado->qtn)) {{ $dado->qtn }}
     @elseif (!empty(old('qtn'))) {{ old('qtn') }} else{{ '' }} @endif">


        <label for=""> Escolha os Sabores </label><br>
        <select name="categoria_id" class="form-select">
            @foreach ($categorias as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>

        <label for="">Horário da retirada </label> <br>
        <input type="text" name="retirada" class="form-control"
            value="@if (!empty($dado->retirada)) {{ $dado->retirada }}
     @elseif (!empty(old('retirada'))) {{ old('retirada') }} else{{ '' }} @endif">
<br>
<div class="alert alert-warning" role="alert">
    Nossas pizzas normalmente estão prontas para a retirada após 40min do recebimento do seu pedido!
  </div>
        <br>
        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #17fc02;"></i>
            Concluir Pedido</button>

        <a class="btn btn-dark" href="{{ url('encomenda') }} "><i class="fa-solid fa-rotate-left"
            style="color: #ff3d3d;"></i> Voltar</a>

        <a href="{{ url('menu/create') }}"class="btn btn-dark"> Vizualizar Menu</a>

    </form>
@stop
