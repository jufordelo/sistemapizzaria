@extends('base')
@section('conteudo')

<body style="background-color:rgb(151, 248, 183);">

   <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
    <h4> Personalize seu Bolo Abaixo: </h4>
    <h9>Caso queira realizar somente uma encomenda clique no botão abaixo:</h9>
    <a href="{{url('encomenda/create')}}" class="btn btn-dark" style="display: inline-block; margin-right: 10px;"><i class="fa-solid fa-pen-to-square" style="color: #76f0e6;"></i> Encomende Aqui</a>

    @php
        if (!empty($dado->id)) {
            $route = route('personalizado.update', $dado->id);
        } else {
            $route = route('personalizado.store');
        }
    @endphp
<<<<<<< HEAD
        
        <form action="{{ $route }}" method="post" enctype="multipart/form-data">

=======
    <form action= "{{ $route }}" method="post" enctype="multipart/form-data">
 
>>>>>>> fe6bda3a8df4851796172c345e3f47d1356f9183
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id"
            value="@if (!empty($dado->id)) {{ $dado->id }} @else{{ '' }} @endif"><br>


        <label for=""> Nome Completo </label> <br>
        <input type="text" name="nomec" class="form-control"
            value="@if (!empty($dado->nomec)) {{ $dado->nomec }}
     @elseif (!empty(old('nomec'))) {{ old('nomec') }} else{{ '' }} @endif">
        <br>

        <label for=""> Contato </label> <br>
        <input type="text" name="tel" class="form-control"
            value="@if (!empty($dado->tel)) {{ $dado->tel }}
     @elseif (!empty(old('tel'))) {{ old('tel') }} else{{ '' }} @endif">
        <br>


        <label for=""> Insira o Kilograma (KG) </label>
        <input type="text" name="kg" class="form-control"
            value="@if (!empty($dado->kg)) {{ $dado->kg }}
     @elseif (!empty(old('kg'))) {{ old('kg') }} else{{ '' }} @endif">
        <br>

        <label for=""> Dia da retirada </label>
        <input type="text" name="datareti" class="form-control"
            value="@if (!empty($dado->datareti)) {{ $dado->datareti }}
     @elseif (!empty(old('datareti'))) {{ old('datareti') }} else{{ '' }} @endif">
        <br>

        <label for=""> Hora da retirada </label>
        <input type="text" name="horareti" class="form-control"
            value="@if (!empty($dado->horareti)) {{ $dado->horareti }}
     @elseif (!empty(old('horareti'))) {{ old('horareti') }} else{{ '' }} @endif">
        <br>
        <label for=""> Observações </label>
        <input type="text" name="obs" class="form-control"
            value="@if (!empty($dado->obs)) {{ $dado->obs }}
     @elseif (!empty(old('obs'))) {{ old('obs') }} else{{ '' }} @endif">
        <br>
        <label for=""> Escolha uma opção de Sabor </label><br>
        <select name="categoria_personalizado_id" class="form-select">
            @foreach ($categoria_personalizados as $item)
                <option value="{{ $item->id }}">{{ $item->nome }}</option>
            @endforeach
        </select>
        @php

        $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
        //dd($nome_imagem);
    @endphp
    <label for=""></label><br>
    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
    <input type="file" name="imagem" class="form-control"
        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>



<br>
        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
Enviar</button>


        <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a href="{{ url('personalizado') }} "></a>Voltar</a></button>

    </form>
@stop
