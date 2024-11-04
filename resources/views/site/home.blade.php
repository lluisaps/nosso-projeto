@extends('layout.site')
@section('titulo', 'Home')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection

@section('conteudo')
<div style="background-color:#1a294d">
    <div class="row text-center py-5" style="background-image: url('img/icons/fundoAzul.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="col-md-6" style="margin-top: 6em;">
            <h1 class="text-light"><span class="text-primary" style="font-size: 1.5em !important;">Descubra</span></h1>
            <h1 class="text-light"><span style="font-size: 1.5em;">Eficiência</span></h1>
            <p class="text-light">da inteligência artificial</p>
            <p class="text-light">na validação dos seus documentos pessoais</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="#sobre" class="btn btn-primary btn-lg mx-2">Saiba Mais!</a>
                <a href="{{route('site.doc')}}" class="btn btn-secondary btn-lg mx-2">Teste nossa IA</a>
            </div>
        </div>
        <div class="text-center my-5 col-md-6">
            <div class="floating-image">

                <img src="{{ asset('img/icons/dochome.png') }}" alt="Imagem relacionada à validação de documentos" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="row text-center py-5" style="background-color: #1a294d;">
        <div class="col">
            <h2 class="text-primary">O QUE FAZEMOS?</h2>
        </div>
    </div>
    <div class="row text-center py-4" style="background-color: #1a294d;">
        <div class="col-md-4">
            <div class="p-4">
                <i class="bi bi-camera" style="font-size: 3rem; color: #0e6efd;"></i>
                <img src="{{ asset('img/icons/escaneamento.png') }}" alt="img-scam" class="img-fluid" style="height: 92px;">
                <h3 class="text-light mt-3">ESCANEAMENTO</h3>
                <p class="text-light">Nós escaneamos seu documento anexado e avaliamos se a qualidade está apta para validação com nossa IA.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4">
                <i class="bi bi-cpu" style="font-size: 3rem; color: #0e6efd;"></i>
                <img src="{{ asset('img/icons/validacao.png') }}" alt="img-scam" class="img-fluid" style="height: 92px;">
                <h3 class="text-light mt-3">VALIDAÇÃO</h3>
                <p class="text-light">Processamos sua imagem com IA de forma rápida e eficiente, identificando os pontos chave para validação do documento.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4">
                <i class="bi bi-check2-square" style="font-size: 3rem; color: #0e6efd;"></i>
                <img src="{{ asset('img/icons/resultado.png') }}" alt="img-scam" class="img-fluid" style="height: 92px;">
                <h3 class="text-light mt-3">RESULTADO</h3>
                <p class="text-light">Nessa etapa já exibimos seu documento com o retorno validado pela nossa IA processado anteriormente!</p>
            </div>
        </div>
    </div>
    <div class="row py-5" style="background-image: url('img/icons/2fundo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="col-md-6 mx-auto">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/icons/grupo2.jpg') }}" class="d-block w-100" alt="Equipe Verifica AI">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/icons/grupo3.jpg') }}" class="d-block w-100" alt="Equipe Verifica AI">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col text-center" style="align-content: center"> <!--  class="col-md-10 mx-auto mt-5" -->
        <div class="col-md-10 mx-auto mt-5" style="align-content: center">
            <h2 class="text-light" id="sobre">UM POUCO SOBRE A <span class="text-primary">VERIFICA AI</span></h2>
        </div>
            <p class="text-light">Somos uma equipe de seis estudantes apaixonados por tecnologia e inovação, trabalhando juntos em um projeto que visa facilitar a vida das pessoas.</p>
            <p class="text-light">Nosso foco é o desenvolvimento de uma Inteligência Artificial (IA) capaz de validar documentos pessoais de forma rápida e precisa.</p>
            <p class="text-light">Combinando nossas habilidades em diferentes áreas, desde programação até análise de dados, estamos criando uma solução que torna o processo de verificação de documentos mais eficiente e seguro.</p>
            <p class="text-light">Nosso objetivo é oferecer uma ferramenta confiável, que possa ser utilizada por empresas e usuários individuais para garantir a autenticidade de documentos de forma simples e eficaz.</p>
            <p class="text-light">Acreditamos que nosso projeto tem o potencial de impactar positivamente o dia a dia das pessoas, e estamos animados para compartilhar essa inovação com o mundo.</p>
        </div>
    </div>
<div class="row text-center py-5" style="background-color: #1a294d;">
    <div class="col">
        <h2 class="text-primary">QUAIS DOCUMENTOS VALIDAMOS ATUALMENTE?</h2>
    </div>
</div>

<div class="row text-center py-4" style="background-color: #1a294d;">
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/titulo.png') }}" alt="Título de Eleitor" class="img-fluid mb-2">
            <h3 class="text-light">Título de Eleitor</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/rg.png') }}" alt="Registro Geral (RG)" class="img-fluid mb-2">
            <h3 class="text-light">Registro Geral (RG)</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/reservista.png') }}" alt="Declaração Reservista" class="img-fluid mb-2">
            <h3 class="text-light">Declaração Reservista</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/cpf.png') }}" alt="Cadastro de Pessoa Física (CPF)" class="img-fluid mb-2">
            <h3 class="text-light">Cadastro de Pessoa Física (CPF)</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/comprovante.png') }}" alt="Comprovante de Residência" class="img-fluid mb-2">
            <h3 class="text-light">Comprovante de Residência</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/certidao.png') }}" alt="Certidão de Nascimento" class="img-fluid mb-2">
            <h3 class="text-light">Certidão de Nascimento</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/cnh.png') }}" alt="Carteira Nacional de Habilitação (CNH)" class="img-fluid mb-2">
            <h3 class="text-light">Carteira Nacional de Habilitação (CNH)</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-4">
            <img style="height: 9em;" src="{{ asset('img/icons/carteiradetrabalho.png') }}" alt="Carteira de Trabalho" class="img-fluid mb-2">
            <h3 class="text-light">Carteira de Trabalho</h3>
        </div>
    </div>
</div>

@endsection
