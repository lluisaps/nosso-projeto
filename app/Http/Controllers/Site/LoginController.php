<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index () {
        return view("site.login");
    }

    public function entrar(Request $req) {
        $dados = $req->all();
        
        // compara email e pass de ‘users’ com
        // email e senha digitado

        If (Auth::attempt(['login' => $dados['login'], 'password' => $dados['password']])) {
            // redireciona para a home, mas agora, logado !
            return redirect()->route('site.home');
        } else { 
            // pede usuario e senha novamente
            return redirect()->route('site.login')->withErrors(['msg' => 'Credenciais inválidas. Tente novamente.']);
        }
    }

    public function sair() {
        Auth::logout(); 
        return redirect()->route('site.home');
    }

    public function registrar(Request $req) {
        $dados = $req->all();

        if ($dados['password'] == $dados['check_password']) {
            $user = [
                'nome' => $dados['nome'],
                'login' => $dados['login'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']), 
            ];
    
            if (Usuario::create($user) == true) {
                return redirect()->route('site.login')->withErrors(['msg' => 'Conta criada.']);
            } else { 
                return redirect()->route('site.login')->withErrors(['msg' => 'Erro na criação do usuário.']);
            }  
        } else {
            return redirect()->route('site.login')->withErrors(['msg' => 'As senhas não são iguais.']);
        }
    }

    public function deletar(Request $req) {
        //
    }
}