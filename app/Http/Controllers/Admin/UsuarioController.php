<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index () {
        $rows = User::all();
        return view('admin.usuarios.index', compact('rows'));
    }

    public function adicionar() {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $req) {

        $dados = $req->all();

        if($req->hasFile('foto_perfil')) {
            if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
                // $imagem = $req->file('arquivo');
                // $num = rand(1,9999);
                // $dir = "img/usuarios/";
                // $ex = $imagem->guessClientExtension();
                // $nomeImagem = "imagem_".$num.".".$ex;
                // $imagem->move($dir,$nomeImagem);
                // $dados['imagem'] = $dir."/".$nomeImagem;


                // Obtendo o conteúdo do arquivo e convertendo para binário
                $imageContent = file_get_contents($req->file('foto_perfil')->getRealPath());
    
                // Salvando a imagem diretamente no banco de dados
                $dados['foto_perfil'] = $imageContent;

                User::create($dados);
                return redirect()->route('admin.usuarios.index');
            } else {
                return redirect()->route('admin.salvar')->with('error', 'Arquivo invalido');
            }
        }

        User::create($dados);
        return redirect()->route('admin.usuarios.index');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        if($req->hasFile('foto_perfil')) {
            if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
                // $imagem = $req->file('foto-perfil');
                // $num = rand(1,9999);
                // $dir = "img/usuarios/";
                // $ex = $imagem->guessClientExtension();
                // $nomeImagem = "imagem_".$num.".".$ex;
                // $imagem->move($dir,$nomeImagem);
                // $dados['imagem'] = $dir."/".$nomeImagem;

                
    
                // Obtendo o conteúdo do arquivo e convertendo para binário
                $imageContent = file_get_contents($req->file('foto_perfil')->getRealPath());
    
                // Salvando a imagem diretamente no banco de dados
                $dados['foto_perfil'] = $imageContent;

                User::find($id)->update($dados);
                return redirect()->route('admin.usuarios.index');
            } else {
                return redirect()->route('admin.editar')->with('error', 'Arquivo invalido');
            }
        }
        User::find($id)->update($dados);
        return redirect()->route('admin.usuarios.index');
    }

    public function editar($id) {
        $linha = User::find($id);
        return view('admin.usuarios.editar', compact('linha'));
    }

    public function excluir($id) {
        User::find($id)->delete();
        
        return redirect()->route('admin.usuarios.index'); 
    }
}
