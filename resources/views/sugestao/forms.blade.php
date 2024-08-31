@extends('base')
@section('conteudo')

<body style="background-color:rgb(154, 214, 127);">
    <h3>PIZZARIA ITÁLIA EXPRESS <i class="fa-solid fa-pizza-slice"></i>

    </h3>Faça sua Sugestão abaixo:</h3>
        @php

           // dd($dado);
            if (!empty($dado->id)) {
                $route = route('sugestao.update', $dado->id);
            } else {
                $route = route('sugestao.store');
            }
        @endphp
        <form action="{{ $route }}" method="post" enctype="multipart/form-data">

            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


            <label for="">Assunto:</label> <br>
            <input type="text" name="assunto" class="form-control"
                value="@if (!empty($dado->assunto)) {{ $dado->assunto }}
     @elseif (!empty(old('assunto'))) {{ old('assunto') }} else{{ '' }} @endif">
            <br>

            <label for="">Tipo de atendimento:</label><br>
            <select name="tipo" class="form-select">
                @foreach ($categoria_sugestao as $item)
                    <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                @endforeach
            </select>

            <label for="">Comentário:</label> <br>

            <textarea name="comentario" cols="100" rows="5">@if (!empty($dado->comentario)){{ $dado->comentario }}@elseif (!empty(old('comentario'))){{ old('comentario') }} @else{{ '' }}@endif
            </textarea>

            <br>

            @php
                $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
                //dd($nome_imagem);
            @endphp
                <label for="">Imagem</label><br>
                    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
                <input type="file" name="imagem" class="form-control"
                    value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>

            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #c40000;"></i>
                Enviar</button>
            <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #c40000;"></i><a
                    href="{{ url('sugestao') }} "></a>Voltar</a></button>


        </form>
    @stop
