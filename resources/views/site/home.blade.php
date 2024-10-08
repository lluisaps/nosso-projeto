@extends('layout.site')

@section('styles')
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection

@section('conteudo')

<head>
    <style>
        .video-bg {
            position: absolute;
            top: 0;
            /* left: 0; */
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            padding: 0;
            margin: 0;
        }

        .background-video-container {
    /* height: 100vh; Força a ocupação da tela inteira */
    /* height: 83vh;
    margin-top: -24vh; */
}

.overlay-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
}


        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .content-wrap {
    width: 100%;
    height: 100vh; /* 100% da altura da viewport */
    display: flex;
    flex-direction: column;
    
}

.row {
    margin: 0;
    padding: 0;
}

.botao_home:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .floating-image img {
        max-width: 80%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5vh);
        }
    }

    </style>
</head>
<a id="seta"></a>
<div>
    <div class="row text-center  background-video-container">
        <video class="video-bg" src="{{ asset('video/background.mp4') }}" autoplay muted loop></video>
        <div class="col-md-7 overlay-content" style="margin-top: 6em; text-align: center;">
    <h1 class="text-light" style="margin-bottom: -0.6em;">
        <span class="text-primary" style="font-size: 2.5em !important; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
            Descubra
        </span>
    </h1>
    <h1 class="text-light" style="margin-bottom: -0.3em;">
        <span style="font-size: 2.5em; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">
            Eficiência
        </span>
    </h1>
    <p style="font-size: 2.2em; color: #81A9FF; margin-bottom: -0.2em; text-shadow: 1px 1px 6px rgba(0,0,0,0.3);">
        da inteligência artificial
    </p>
    <p class="text-light" style="font-size: 1.2em; margin-top: 1em;">
        na validação dos seus documentos pessoais
    </p>
    <div class="d-flex justify-content-center mt-4">
        <a href="http://127.0.0.1:8000/#planos" class="botao_home btn btn-primary btn-lg mx-2" style="background: linear-gradient(45deg, #1e90ff, #073763); border-radius: 1.5em; padding: 0.75em 2.5em; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: all 0.3s ease;">
            Saiba Mais!
        </a>
        <a href="{{ route('site.doc') }}" class="botao_home btn btn-primary btn-lg mx-2" style="background: linear-gradient(45deg, #1e90ff, #073763); border-radius: 1.5em; padding: 0.75em 2.5em; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: all 0.3s ease;">
            Teste nossa IA
        </a>
    </div>
</div>
<div class="text-center my-5 col-md-4 overlay-content">
    <div class="" style="margin-top: 5vh; padding: 0">
        <img src="{{ asset('img/icons/robozinho.png') }}" alt="Imagem relacionada à validação de documentos" class="img-fluid" style="animation: float 6s ease-in-out infinite;">
    </div>
</div>
    </div>
    <!-- <div style="margin-top: 6vh;"> -->
    <div class="row text-center" style="background-color: #1a294d;">
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
    <!-- </div> -->
    <div class="row py-5" style="background-image: url('{{ asset('img/icons/2fundo.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
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
        <div class="col-md-4">
            <div class="p-4">
                <img style="height: 9em;" src="{{ asset('img/icons/rg.png') }}" alt="Registro Geral (RG)" class="img-fluid mb-2">
                <h3 class="text-light">Registro Geral (RG)</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4">
                <img style="height: 9em;" src="{{ asset('img/icons/cpf.png') }}" alt="Cadastro de Pessoas Físicas (CPF)" class="img-fluid mb-2">
                <h3 class="text-light">Cadastro de Pessoas Físicas (CPF)</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4">
                <img style="height: 9em;" src="{{ asset('img/icons/cnh.png') }}" alt="Carteira Nacional de Habilitação (CNH)" class="img-fluid mb-2">
                <h3 class="text-light">Carteira Nacional de Habilitação (CNH)</h3>
            </div>
        </div>
    </div>
    <div class="row py-5" style="background-image: url('{{ asset('img/icons/fundoAzul.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <a id="planos"></a>
    <div class="col-md-10 mx-auto mt-5">
            <h2 class="text-light text-center" id="planos">Planos de Assinatura</h2>
            <p class="text-light text-center">Oferecemos três opções de planos para atender às suas necessidades específicas.</p>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Básico</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$29 <small class="text-muted">/ mês</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Validação de até 100 documentos por mês</li>
                        <li>Suporte via e-mail</li>
                        <li>Acesso a todos os tipos de validação</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Assine Agora</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Profissional</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$99 <small class="text-muted">/ mês</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Validação de até 500 documentos por mês</li>
                        <li>Suporte via chat e e-mail</li>
                        <li>Acesso a todos os tipos de validação</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Assine Agora</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Corporativo</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$199 <small class="text-muted">/ mês</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Validação de até 1000 documentos por mês</li>
                        <li>Suporte dedicado 24/7</li>
                        <li>Acesso a todos os tipos de validação</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Assine Agora</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection