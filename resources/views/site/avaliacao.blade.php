@extends('layout.site')

@section('titulo', 'Avaliação')

@section('styles')
<link rel="shortcut icon" href="{{ asset('img/icons/logoMundo.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>
    /* Estilizando o vídeo de fundo para cobrir toda a tela */
    .background-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Faz o vídeo cobrir toda a tela */
        z-index: -1;
    }

    /* Estilizando a área do conteúdo de avaliação */
    .container {
        background-color: rgba(255, 255, 255, 0.9); /* Fundo semi-transparente */
        padding: 4em; /* Espaço interno */
        width: 80%; /* Largura relativa para garantir responsividade */
        max-width: 40em; /* Largura máxima */
        margin-left: auto;
        margin-right: auto;
        border-radius: 1em;
        z-index: 1;
    }

    /* Estilizando a área de avaliação */
    .evaluation-text {
        text-align: center;
        font-size: 24px;
        color: #2652a9;
        margin-top: 20px;
    }

    /* Estilo da área de estrelas */
    .star-rating {
        display: inline-block;
        direction: rtl; /* Inverte a ordem dos rótulos para que o último (estrela 5) apareça primeiro */
    }

    .star-rating input {
        display: none; /* Esconde os inputs de radio */
    }

    .star-rating label {
        font-size: 50px;  /* Tamanho das estrelas */
        color: gray;      /* Cor padrão das estrelas */
        cursor: pointer; /* Cursor de mão sobre as estrelas */
        padding: 0 5px;   /* Espaçamento entre as estrelas */
    }

    /* Durante o hover, apenas as estrelas à esquerda do ponteiro ficam douradas */
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold;
    }

    /* Quando o rádio (input) é marcado, todas as estrelas à esquerda (inclusive a última) ficam douradas */
    .star-rating input:checked ~ label {
        color: gold;
    }

    /* Quando o mouse passa por cima de uma estrela e a seleciona, todas as estrelas à esquerda dessa também ficam douradas */
    .star-rating input:checked + label:hover,
    .star-rating input:checked + label:hover ~ label {
        color: gold;
    }

    /* Estilizando o botão de envio */
    .button_crud {
        background-color: #2652a9;
        color: white;
        padding: 12px 25px;
        border-radius: 5px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        margin-top: 20px;
    }

    .button_crud:hover {
        background-color: #1d3c7a;
    }

    .perfil-container {
        background-color: #ffffffd4; /* Fundo semi-transparente */
        padding: 4em; /* Espaço interno */
        margin-bottom: 5em; /* Espaçamento em relação ao rodapé */
        width: 80%; /* Largura relativa para garantir responsividade */
        max-width: 40em; /* Largura máxima */
        margin-left: auto;
        margin-right: auto;
        border-radius: 1em;
        margin-top: 10em;
    }

</style>
@endsection

@section('conteudo')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Vídeo de fundo -->
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
    </video>

    <!-- Container de avaliação -->
    <div class="perfil-container">
        <br><br><br>
        <h3 class="center">Avalie o Produto</h3>

        <!-- Texto de avaliação -->
        <div class="evaluation-text">
            <p>Gostou do nosso serviço? Avalie com estrelas!</p>
        </div>

        <!-- Formulário de avaliação -->
        <div class="row center">
            <form action="{{ route('avaliacao.registra') }}" method="post">
                @csrf
                <div class="star-rating">
                    <input type="radio" id="star1" name="avaliacao" value="5" />
                    <label for="star1">★</label>
                    <input type="radio" id="star2" name="avaliacao" value="4" />
                    <label for="star2">★</label>
                    <input type="radio" id="star3" name="avaliacao" value="3" />
                    <label for="star3">★</label>
                    <input type="radio" id="star4" name="avaliacao" value="2" />
                    <label for="star4">★</label>
                    <input type="radio" id="star5" name="avaliacao" value="1" />
                    <label for="star5">★</label>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <br>
                <button class="button_crud">Salvar Avaliação</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Scripts necessários do Bootstrap (para alertas) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
