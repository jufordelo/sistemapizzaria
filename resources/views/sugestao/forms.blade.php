@extends('base')
@section('conteudo')

    <body style="background-color:rgb(172, 232, 255);">
        <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
        <h3>Faça sua Sugestão abaixo:</h3>
        @php

           // dd($dado);
            if (!empty($dado->id)) {
                $route = route('sugestao.update', $dado->id);
            } else {
                $route = route('sugestao.store');
            }
        @endphp
        <form action="{{ $route }}" method="post">

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


            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
                Enviar</button>
            <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a
                    href="{{ url('sugestao') }} "></a>Voltar</a></button>


        </form>
    @stop
