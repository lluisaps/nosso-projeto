<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function index () {
        $rows = Usuario::all();
        return view('admin.usuarios.index', compact('rows'));
    }

    public function adicionar() {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $req) {

        $dados = $req->all();

        if($req->hasFile('foto_perfil')) {
            if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
                
                // Obtém o arquivo da imagem
                $imagem = $req->file('foto_perfil');

                // Obtém o ID do usuário autenticado
                $num = Usuario::user()->id;

                // Define o diretório e o nome do arquivo
                $dir = "img/fotoPerfil/";
                $ex = $imagem->guessClientExtension(); // Obtém a extensão correta
                $nomeImagem = "foto_perfil_".$num.".".$ex; // Concatena o nome do arquivo com o ID do usuário

                // Caminho completo da nova imagem
                $imagePath = $dir . $nomeImagem;

                // Verifica se já existe uma imagem antiga e a exclui
                $imagemAntiga = Usuario::user()->foto_perfil;
                if (file_exists(public_path($imagemAntiga))) {
                    unlink(public_path($imagemAntiga)); // Remove a imagem antiga
                }

                // Move a nova imagem para o diretório
                $imagem->move($dir, $nomeImagem);

                // Atualiza o caminho da imagem no banco de dados
                Usuario::user()->foto_perfil = $imagePath;
                Usuario::create($dados);
                return redirect()->route('admin.usuarios.index');
            } else {
                return redirect()->route('admin.salvar')->with('error', 'Arquivo invalido');
            }
        }

        Usuario::create($dados);
        return redirect()->route('admin.usuarios.index');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        if($req->hasFile('foto_perfil')) {
            if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
                // Obtém o arquivo da imagem
                $imagem = $req->file('foto_perfil');

                // Obtém o ID do usuário autenticado
                $num = Usuario::user()->id;

                // Define o diretório e o nome do arquivo
                $dir = "img/fotoPerfil/";
                $ex = $imagem->guessClientExtension(); // Obtém a extensão correta
                $nomeImagem = "foto_perfil_".$num.".".$ex; // Concatena o nome do arquivo com o ID do usuário

                // Caminho completo da nova imagem
                $imagePath = $dir . $nomeImagem;

                // Verifica se já existe uma imagem antiga e a exclui
                $imagemAntiga = Usuario::user()->foto_perfil;
                if (file_exists(public_path($imagemAntiga))) {
                    unlink(public_path($imagemAntiga)); // Remove a imagem antiga
                }

                // Move a nova imagem para o diretório
                $imagem->move($dir, $nomeImagem);

                // Atualiza o caminho da imagem no banco de dados
                Usuario::user()->foto_perfil = $imagePath;
                Usuario::find($id)->update($dados);
                return redirect()->route('admin.usuarios.index');
            } else {
                return redirect()->route('admin.editar')->with('error', 'Arquivo invalido');
            }
        }
        Usuario::find($id)->update($dados);
        return redirect()->route('admin.usuarios.index');
    }

    public function editar($id) {
        $linha = Usuario::find($id);
        return view('admin.usuarios.editar', compact('linha'));
    }

    public function excluir($id) {
        Usuario::find($id)->delete();
        
        return redirect()->route('admin.usuarios.index'); 
    }
}
