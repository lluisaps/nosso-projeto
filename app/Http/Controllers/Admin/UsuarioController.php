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

        \Log::info($req);
        \Log::info($dados);
        if($req->hasFile('foto_perfil')) {
            if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {
                $imagem = $req->file('foto_perfil');
                $num = $req['id'];
                $dir = "img/fotoPerfil/";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "foto_perfil_".$num.".".$ex;
                $imagem->move($dir,$nomeImagem);
                $dados['foto_perfil'] = $dir."/".$nomeImagem;


                // // Obtendo o conteúdo do arquivo e convertendo para binário
                // $imageContent = file_get_contents($req->file('foto_perfil')->getRealPath());
    
                // // Salvando a imagem diretamente no banco de dados
                // $dados['foto_perfil'] = $imageContent;

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
                $imagem = $req->file('arquivo');
                $num = $req['id'];
                $dir = "img/fotoPerfil/";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "foto_perfil_".$num.".".$ex;
                $imagem->move($dir,$nomeImagem);
                $dados['foto_perfil'] = $dir."/".$nomeImagem;

                
    
                // // Obtendo o conteúdo do arquivo e convertendo para binário
                // $imageContent = file_get_contents($req->file('foto_perfil')->getRealPath());
    
                // // Salvando a imagem diretamente no banco de dados
                // $dados['foto_perfil'] = $imageContent;

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

    public function atualizarFoto(Request $req)
    {
        if($req->validate(['foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',])) {

            // Obtém o arquivo da imagem
            $imagem = $req->file('foto_perfil');

            // Obtém o ID do usuário autenticado
            $num = Auth::user()->id;

            // Define o diretório e o nome do arquivo
            $dir = "img/fotoPerfil/";
            $ex = $imagem->guessClientExtension(); // Obtém a extensão correta
            $nomeImagem = "foto_perfil_".$num.".".$ex; // Concatena o nome do arquivo com o ID do usuário

            // Caminho completo da nova imagem
            $imagePath = $dir . $nomeImagem;

            // Verifica se já existe uma imagem antiga e a exclui
            $imagemAntiga = Auth::user()->foto_perfil;
            if ($imagemAntiga && file_exists($imagemAntiga)) {
                unlink($imagemAntiga); // Remove a imagem antiga
            }

            // Move a nova imagem para o diretório
            $imagem->move($dir, $nomeImagem);

            // Atualiza o caminho da imagem no banco de dados
            Auth::user()->foto_perfil = $imagePath;
            Auth::user()->save();

            return redirect()->route('site.perfil')->with('success', 'Foto de perfil atualizada com sucesso!');
        } else {
            return redirect()->route('site.perfil')->with('error', 'Arquivo invalido.');
        }
    }
}