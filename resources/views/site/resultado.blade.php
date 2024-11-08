@extends('layout.site')
@section('titulo','Resultado da Predição')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection 

@section('conteudo')
    <div class="content">
        <header class="codrops-header">
            <h1>Resultado da Predição <span></span></h1>
            <p>Veja abaixo o resultado da IA para a imagem enviada.</p>
            <br><br><br>

            <!-- Exibir a imagem que foi enviada -->
            <div class="image-preview">
                <h2>Imagem Enviada:</h2>
                <img src="{{ asset($imagePath) }}" alt="Imagem Enviada" style="max-width: 30em;">
            </div>

            <!-- Exibir o resultado da predição -->
            <div class="prediction-result">
                <h2>Resultado da IA:</h2> 
                @if(isset($predictions))
                    <!-- <h2>Predições:</h2> -->
                    <h3>{{$predictions}}</h3>
                @else
                    <p>Sem resultados.</p>
                @endif
            </div>

            <br><br><br>
            <a href="{{ url('/doc') }}" class="button">Enviar outra imagem</a>
        </header>
    </div>
@endsection