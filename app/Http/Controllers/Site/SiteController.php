<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class SiteController extends Controller
{
    public function index () {
        return view("site.home");
    }

    public function perfil () {
        return view("site.perfil");
    }
    
    public function sobre () {
        return view("site.sobre");
    }

    public function avaliacao () {
        return view("site.avaliacao");
    }

    public function doc () {
        return view("site.doc");
    }

    public function atualizarFoto(Request $req)
    {
        if( $req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
            $imagem = $req->file('arquivo');
            $num = $req['id'];
            $dir = "img/fotoPerfil/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "foto_perfil_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;

            
            // Obtendo o conteúdo do arquivo e convertendo para binário
            $imageContent = file_get_contents($req->file('foto_perfil')->getRealPath());

            // Salvando a imagem diretamente no banco de dados
            Auth::user()->foto_perfil = $imageContent;
            Auth::user()->save();

            return redirect()->route('site.perfil')->with('success', 'Foto de perfil atualizada com sucesso!');
        } else {
            return redirect()->route('site.perfil')->with('error', 'Arquivo invalido.');
        }
    }
}