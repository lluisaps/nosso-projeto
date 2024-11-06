@if(isset($linha->foto_perfil))
    <div class="input-field">
        <img src="{{ asset('img/fotoPerfil/foto_perfil_' + $linha->$id) }}" width="100" alt="Vazio">
    </div>
@else
    <div class="input-field">
        <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão">
    </div>
@endif

<div class="file-field input-field" style="padding-left: 10px;">
    <div class="button">
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


<style>

/* CSS */
.button {
  min-width: 100px;
  min-height: 50px;
  display: inline-flex;
  font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 13px;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #ffffff;
  background: #2652a9;
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(22, 87, 192, 0.64);
  cursor: pointer;
  outline: none;
  padding: 10px;
}
</style>
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
