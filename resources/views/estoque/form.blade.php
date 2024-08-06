@extends('base')
@section('conteudo')

<body style="background-color:rgb(207, 169, 241);">
    <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
        <h3> Cadastro de Estoque </h3>
        @php

           // dd($dado);
            if (!empty($dado->id)) {
                $route = route('estoque.update', $dado->id);
            } else {
                $route = route('estoque.store');
            }
        @endphp
        <form action="{{ $route }}" method="post" enctype="multipart/form-data">

            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


            <label for=""> Nome do Produto </label> <br>
            <input type="text" name="mprima" class="form-control"
                value="@if (!empty($dado->mprima)) {{ $dado->mprima }}
     @elseif (!empty(old('mprima'))) {{ old('mprima') }} else{{ '' }} @endif">
            <br>

            <label for="">Tipo do produto</label><br>
            <select name="tipo" class="form-select">
                @foreach ($categoria_estoque as $item)
                    <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                @endforeach
            </select>

            <label for="">Insira a Validade </label> <br>
            <input type="text" name="validade" class="form-control"
                value="@if (!empty($dado->validade)) {{ $dado->validade }}
     @elseif (!empty(old('validade'))) {{ old('validade') }} else{{ '' }} @endif">
            <br>

            <label for=""> Quantidade do estoque</label> <br>
            <input type="text" name="quantidade" class="form-control"
                value="@if (!empty($dado->quantidade)) {{ $dado->quantidade }}
     @elseif (!empty(old('quantidade'))) {{ old('quantidade') }} else{{ '' }} @endif">
            <br>

            @php
            $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
            //dd($nome_imagem);
        @endphp
        <label for=""></label><br>
        <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
        <input type="file" name="imagem" class="form-control"
            value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>


            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
                Salvar </button>
            <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a
                    href="{{ url('estoque') }} "></a> Voltar </a></button>


        </form>
    @stop
