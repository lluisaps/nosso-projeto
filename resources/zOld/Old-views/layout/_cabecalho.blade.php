<div class="index">
    <ul class="nav-list">
        @if(Auth::user())
            <li class="nav-start"> 
                <div class="avatar-wrap">
                    @if(Auth::user()->foto_perfil)
                        <img class="avatar" id="open-button" src="{{ Auth::user()->foto_perfil }}" alt="Foto de perfil" height="50px">
                    @else
                        <img id="open-button" src="{{ asset('img/icons/avatar1.png') }}" alt="Avatar" class="avatar" height="50px">
                    @endif
                    <nav class="menu-side">
                        <a href="{{ route('site.perfil') }}">Meu Perfil</a>
                        <a href="{{ route('site.home') }}">Home</a>
                        <a href="{{ route('site.doc') }}">Ler Documentos</a>
                        <a href="{{ route('site.sobre') }}">Sobre</a>
                        <a href="{{ route('login.sair') }}">Sair</a>
                    </nav>
                </div>
            </li>
        @elseif(Auth::guest())
            <li class="nav-start"><a href="{{ route('site.login') }}">Fazer Login</a></li>
        @endif
        <li class="nav-center"><a href="{{ route('site.home') }}">Home</a></li>
        <li class="nav-center"><a href="{{ route('site.doc') }}">Analisar Documentos</a></li>
        <li class="nav-center"><a href="{{ route('site.sobre') }}">Sobre</a></li>
        @if(Auth()->check() && Auth::user()->admin == true)
            <li class="nav-center"><a href="{{ route('admin.usuarios.index')}}">Crud</a></li>
        @endif
        <a href="{{ route('site.home') }}"><img class="logo-menu" src="{{ asset('img/icons/logo.png') }}" alt="Logo"></a>
        
    </ul>
</div>