<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiUploadController extends Controller
{
 
    public function uploadImagem(Request $request) : mixed 
    {
        $dadosImagem = $this->salvaImagemDiretorio($request);
        
        $predictions = $this->consultaIa($dadosImagem);
        
        return view('site.resultado', ['predictions' => $predictions, 'imagePath' => $dadosImagem['urlPublica']]);
    }

    public function consultaIa($dadosImagem) : string 
    {
        try {
            $client = new Client();
            $response = $client->post('http://127.0.0.1:5000/predict', [ //api em flask localmente, rodando por terminal
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($dadosImagem['caminhoFull'], 'r'),
                        'filename' => $dadosImagem['nomeImagem'] 
                    ]
                ]
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);

            return isset($responseBody['type']) ? $responseBody['type'] : "Nossa IA não identificou o seu documento, pode enviar outra imagem?";
            
        } catch (RequestException $e) {
            return "Erro ao identificar o documento, por favor insira outra imagem. Código de erro: ".$e->getCode();
        }
    }

    public function salvaImagemDiretorio($request) : mixed 
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $imageName = $image->hashName();
 
            $imageDir = storage_path('app/public/images/');

            return [
               'caminhoFull' =>  $imageDir . $imageName,
                'nomeImagem' => $imageName,
                'urlPublica' => 'storage/images/' . $imageName
            ];
        }

        return false;
    }
}
