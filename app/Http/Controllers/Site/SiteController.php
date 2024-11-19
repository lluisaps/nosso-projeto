<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Avaliacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function perfil () {
        return view("site.perfil");
    }
    
    public function avaliacao () {
        return view("site.avaliacao");
    }

    public function doc () {
        return view("site.doc");
    }

    public function resultado () {
        return view("site.resultado");
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

    public function registraAvaliacao(Request $request)
    {
        $request->validate([
            'avaliacao' => 'required|integer|min:1|max:5',  // Valida se a avaliação é um número entre 1 e 5
        ]);

        // Salva a avaliação no banco de dados
        Avaliacoes::create([
            'user_id' => Auth::user()->id, // ID do usuário autenticado
            'nota' => $request->avaliacao,
        ]);

        // Retorna com uma mensagem de sucesso
        return redirect()->route('site.avaliacao')->with('success', 'Avaliação salva com sucesso!');
    }
}