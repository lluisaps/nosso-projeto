@extends('layout.site')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection

@section('conteudo')
<div class="container">
    <a id="seta"></a>
    <div class="row text-center py-5" style="background-image: url('img/icons/fundoAzul.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="col-md-6" style="margin-top: 6em;">
            <h1 class="text-light"><span class="text-primary" style="font-size: 1.5em !important;">Descubra</span></h1>
            <h1 class="text-light"><span style="font-size: 1.5em;">Eficiência</span></h1>
            <p class="text-light">da inteligência artificial</p>
            <p class="text-light">na validação dos seus documentos pessoais</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="#" class="btn btn-primary btn-lg mx-2">Saiba Mais!</a>
                <a href="#" class="btn btn-secondary btn-lg mx-2">Teste nossa IA</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/icons/dochome.png') }}" alt="Imagem relacionada à validação de documentos" class="img-fluid">
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
    <div >
     <h2 class="text-light" section id="sobre">UM POUCO SOBRE A <span class="text-primary">VERIFICA AI</span></h2>
     </div>
    <div class="col-md-6">
        <div style="height: 19em; border-radius: 69px; background-color: blue; text-align: center;">
        <img src="{{ asset('img/icons/tcc2.jpeg') }}" alt="Equipe Verifica AI" class="img-fluid mb-4" style="height: 17em; width: 29em; border-radius: 73px; margin-top: 1em;">
        </div>
           
            <div style="height: 19em; border-radius: 69px; background-color: blue; text-align: center; margin-top: 0.5em;">
            <img src="{{ asset('img/icons/tcc1.jpeg') }}" alt="Equipe Verifica AI" class="img-fluid" style="height: 17em; width: 29em; border-radius: 73px; margin-top: 1em;">
            </div>
            
        </div>
        <div class="col-md-6" style="margin-top: 6em;">
           
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
                <img style="height: 9em;" src="{{ asset('img/icons/certidao.png') }}" alt="Declaração de Concurso" class="img-fluid mb-2">
                <h3 class="text-light">Declaração de Concurso</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-4">
                <img style="height: 9em;" src="{{ asset('img/icons/certidao.png') }}" alt="CNH" class="img-fluid mb-2">
                <h3 class="text-light">CNH</h3>
            </div>
        </div>
    </div>
</div>
@endsection
