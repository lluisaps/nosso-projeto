@extends('layout.site')
@section('titulo','Home')
@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
@endsection

@section('conteudo')
    <div class="content">
        <header class="codrops-header">
            <h1>Seja bem-vindo! <span></span></h1>
            <p>Caso queira saber mais sobre nosso projeto acesse:</p> <br> <a href="{{ route('site.sobre') }}">projeto de conclusão (TCC).</a></p>
        </header>
        <section class="related">
                <p>A criação desse modelo foi muito importante para nós:</p>
                <a href="img/verificamos1.png">
                <img src="img/verificamos1.png" alt="Descrição da imagem">
                </a>
                    <h3>naoseioque naoseioque naoseioque</h3>
                </a>
                <a href="">
                    <img src="" />
                    <h4>sjiqudjiuwdj</h4>
                    <h3>naoseioque naoseioque naoseioque</h3>
                </a>
            </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection