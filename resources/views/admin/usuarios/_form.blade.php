@if(!empty($linha->foto_perfil) && file_exists(public_path($linha->foto_perfil)))
    <div class="input-field">
        <img src="{{ asset($linha->foto_perfil) }}" width="100" alt="Vazio">
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
    <input type="text" name="nome" value="{{ isset($linha->nome) ? $linha->nome : ''}}" placeholder="nome">
</div>
<div class="input-field">
    <input type="text" name="login" value="{{ isset($linha->login) ? $linha->login : '' }}" placeholder="login">
</div>
<div class="input-field">
    <input type="email" name="email" value="{{isset($linha->email) ? $linha->email : ''}}" placeholder="Email">
</div>
<div class="input-field">
    <input type="password" name="password" value="{{isset($linha->password) ? $linha->password : ''}}" placeholder="Senha">
</div>
<div class="input-field">
    <p style="text-align: left;">Administrador:</p>
    <select name="admin" class="browser-default" style="background-color: #2652a9; color: white;">
        <option value="false" {{ isset($linha->admin) && !$linha->admin ? 'selected' : '' }}>Não</option>
        <option value="true" {{ isset($linha->admin) && $linha->admin ? 'selected' : '' }}>Sim</option>
    </select>
</div>

