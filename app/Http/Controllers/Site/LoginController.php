<?php

namespace App\Http\Controllers\Site;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index () {
        return view("site.login");
    }

    public function entrar(Request $req) {
        $dados = $req->all();
        
        // compara email e pass de ‘users’ com
        // email e senha digitado

        If (Auth::attempt( ['username' => $dados['username'], 'password' => $dados['password']])) {
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
                'name' => $dados['name'],
                'username' => $dados['username'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']), 
            ];
    
            if (User::create($user)) {
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