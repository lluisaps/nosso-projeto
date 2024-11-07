@if(isset($linha->foto_perfil))
    <div class="input-field">
        <img src="{{ asset('img/fotoPerfil/foto_perfil_' + $linha->$id) }}" width="100" alt="Vazio">
    </div>
@else
    <div class="input-field">
        <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão">
    </div>
@endif

<div class="file-field input-field">
    <div class="button_crud">
        <span>
            Foto Perfil
        </span>
        <input type="file" name="foto_perfil" accept="image/*">
    </div>
</div>  

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
<div class="input-field">
    <p style="text-align: left;">Administrador:</p>
    <select name="admin" class="browser-default" style="background-color: #2652a9; color: white;">
        <option value="false" {{ isset($linha->admin) && !$linha->admin ? 'selected' : '' }}>Não</option>
        <option value="true" {{ isset($linha->admin) && $linha->admin ? 'selected' : '' }}>Sim</option>
    </select>
</div>

