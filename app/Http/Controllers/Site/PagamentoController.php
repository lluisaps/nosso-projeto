<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Pagamento\PagamentoService;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{
    protected static $paramsPost;

    public function processarPagamento(Request $request)
    {

        $pagamentoService = new PagamentoService($request['token']);

        $retorno = json_decode($pagamentoService->post(self::setaParamsPost($request)), true);

        if ($retorno['status'] === 'approved') {
            $retorno['idPlano'] = $request['planId'];
            $retorno['tmp_assinatura'] = $request['tmpAssinatura'];
            $retorno['user_id'] = $request['user_id'];
            $retorno = $pagamentoService->registrarPagamento($retorno);

            return true;
        }

        return false;
    }

    public static function setaParamsPost($params)
    {

        self::$paramsPost = [
                'token' => $params['token'],
                'idTransacao' => $params['issuer_id'],
                'bandeira' => $params['payment_method_id'],
                'valorTransacao' => $params['transaction_amount'],
                'qtdParcelas' => $params['installments'],
                'descricao' => $params['description'],
                'email' => $params['payer']['email'],
                'tipoIdentificador' => $params['payer']['identification']['type'],
                'documento' => $params['payer']['identification']['number'],
                'user_id' => $params['user_id']
            ];
            return self::$paramsPost;
    }

    public static function searchCountries(Request $request)
    {

        $planos = DB::table('planos')
        ->where('id', '=', $request['plano'])
        ->first();

        $data = [
            'countries' => explode(',', env('COUNTRIES_LIST')),
            'user_id' => $request['id'],
            'plano' => $request['plano'],
            'valor' => $planos->preco,
            'tempo_assinatura' => $planos->tempo_assinatura
        ];

        return view('site.pagamento', $data);
    }

}
