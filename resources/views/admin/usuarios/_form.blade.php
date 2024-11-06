<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
<div class="form-group text-center">
        @if(isset($linha->foto_perfil))
            <img src="{{ asset('img/fotoPerfil/foto_perfil_' . $linha->id) }}" class="rounded-circle" width="100" alt="Foto de Perfil">
        @else
            <img src="{{ asset('img/icons/avatar128.png') }}" class="rounded-circle" width="100" alt="Imagem padrão">
        @endif
    </div>

<div class="file-field input-field" style="padding-left: 10px;">
    <div class="button_crud form-group text-center">
        <span>
            Foto Perfil
        </span>
        <input type="file" name="foto_perfil" accept="image/*">
    </div>
</div>  

<div class="input-field">
    <input type="text" name="nome" value="{{ isset($linha->nome) ? $linha->nome : ''}}" placeholder="Nome">
</div>
<div class="input-field">
    <input type="text" name="login" value="{{ isset($linha->login) ? $linha->login : '' }}" placeholder="Nome de login">
</div>
<div class="input-field">
    <input type="email" name="email" value="{{isset($linha->email) ? $linha->email : ''}}" placeholder="Email">
</div>
<div class="input-field">
    <input type="password" name="password" value="{{isset($linha->password) ? $linha->password : ''}}" placeholder="Senha">
</div>

<div class="input-field">
    <p>Administrador:</p>
    <select name="admin" class="browser-default">
        <option value="false" {{ isset($linha->admin) && !$linha->admin ? 'selected' : '' }}>Não</option>
        <option value="true" {{ isset($linha->admin) && $linha->admin ? 'selected' : '' }}>Sim</option>
    </select>
</div>