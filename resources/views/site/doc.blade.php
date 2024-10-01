@extends('layout.site')
@section('titulo','Home')
@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
    <script src="{{ asset('js/botaodoc.js') }}"></script> 
@endsection 

@section('conteudo')
    <div class="content">
        <a id="seta"></a>
        <header class="codrops-header">
            <br><br><br><br><br><br><br><br><br><br>
            <h1>Adicione seu arquivo abaixo <span></span></h1>
            <p>A leitura da IA pode demorar algum tempo. <br></p>
            <br><br><br><br><br><br>
            <div class="wrap">
                <button class="button">Documentos Aqui</a>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </header>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection