@extends('layout.site')
@section('titulo','Verifica AI')
@section('styles')
    <link rel="shortcut icon" href="{{ asset('img/icons/logoMundo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
@endsection

@section('conteudo')
    <div class="content">
        <header class="codrops-header">
            <h1>Sobre o grupo Verifica AI <span></span></h1>
            <p>Um trabalho de TCC bem sucedido. <br> Realizado em <a href="https://cti.feb.unesp.br/">Colégio Técnico Industrial Unesp.</a></p>
        </header>
        
        <section class="related">
            <p>A criação desse modelo foi muito importante para nós:</p>
            <li style="align-items:left;">Somos uma equipe de TCC e visamos entregar nosso projeto para concluir o curso de informática do CTI. 
            <br>
            Trabalhar em equipe é sempre um desafio! Procuramos estabelecer metas e cumprir cronogramas.
            <br>
                Em grande parte das atividades alguns de nós tiveram que se desdobrar para concluir o projeto.
            </li>
            <a href="img/fotogrupo.jpeg">
                <img src="img/fotogrupo.jpeg" alt="Foto grupo" width="540">
            </a>
            <br>
            <a href="img/fotodescontraida.jpeg">
                <img src="img/fotodescontraida.jpeg" alt="Foto descontraída"  width="540" align-items="right">
            </a>
            
            <!-- <h4>sjiqudjiuwdj</h4> -->
            <h3>Tudo vale a pena no final</h3>
            Além das dificuldades, o TCC nos auxiliou no desenvolvimento de nossas habilidades e nos ajudou a enfrentar nossos limites!
            Agora o mercado de trabalho nos espera! <br>
            <h4>Caso queira fazer parte desse time, verifica ai seus documentos no nosso site! =))</h4>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection