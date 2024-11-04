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

    public function resultado () {
        return view("site.resultado");
    }

    public function upload (Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public'); // Salva na pasta "images" dentro de "storage/app/public"
            $imageName = $image->hashName();  // Obtenha o nome do arquivo
 
            $imageDir = storage_path('app/public/images/');

            $pythonScriptPath = base_path('resources/python/predict.py');

            $command = escapeshellcmd("python3 " . $pythonScriptPath . " " . $imageName . " " . $imageDir);
            $output = shell_exec($command);

            // Adicione depuração
            if ($output === null) {
                return back()->withErrors('Erro ao executar o script Python.');
            }

            // Decodifica a saída JSON do Python
            $predictions = json_decode($output, true);

            // Verifique se as previsões estão sendo retornadas
            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()->withErrors('Erro ao decodificar JSON: ' . json_last_error_msg());
            }

            // Captura as previsões e exibe na página
            return view('site.resultado', ['predictions' => $predictions, 'imagePath' => $path]);
        }
        return back()->withErrors('Erro ao enviar a imagem.');
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