<div class="input-field">
    <input type="text" name="nome" value="{{ isset($linha->name) ? $linha->name : ''}}" placeholder="Name">
</div>
<div class="input-field">
    <input type="text" name="login" value="{{ isset($linha->username) ? $linha->username : '' }}" placeholder="Username">
</div>
<div class="input-field">
    <input type="email" name="email" value="{{isset($linha->email) ? $linha->email : ''}}" placeholder="Email">
</div>
<div class="input-field">
    <input type="password" name="senha" value="{{isset($linha->password) ? $linha->password : ''}}" placeholder="Senha">
</div>

<div class="file-field input-field">
    <div class="btn blue">
        <span>
            Foto Perfil
        </span>
        <input type="file" name="foto_perfil" accept="image/*">
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
    </div>
</div>  

@if(isset($linha->foto_perfil))
    <div class="input-field">
        <img src="{{ asset('img/fotoPerfil/foto_perfil_' + $linha->$id) }}" width="150" alt="Vazio">
    </div>
@else
    <div class="input-field">
        <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão">
    </div>
@endif