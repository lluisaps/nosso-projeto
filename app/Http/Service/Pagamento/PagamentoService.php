<?php

namespace App\Http\Service\Pagamento;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PagamentoService {


    private $paramsHttp;

    public function __construct($token) {
        $this->paramsHttp = Http::withHeaders([
                                'accept' => 'application/json',
                                'content-type' => 'application/json',
                                'Authorization' => 'Bearer '.env('TOKEN_BEARER'),
                                'X-Idempotency-Key' => $token,
                            ]);
    }

    public function post($params) : mixed
    {
        return $this->paramsHttp->post('https://api.mercadopago.com/v1/payments', [
                                            'transaction_amount' => $params['valorTransacao'],
                                            'token' => $params['token'],
                                            'description' => $params['descricao'],
                                            'installments' => $params['qtdParcelas'],
                                            'payment_method_id' => $params['bandeira'],
                                            'issuer_id' => $params['idTransacao'],
                                            'payer' => [
                                                'email' => $params['email'],//'PAYER_EMAIL',
                                                'identification' => [
                                                    'type' => $params['tipoIdentificador'],
                                                    'number' => $params['documento']
                                                ]
                                            ],
                                        ]);


    }

    public function registrarPagamento($data) : mixed
    {
        \Log::info("aqui");
        $transactionId = DB::table('transactions')->insertGetId([
            'id_transaction' => $data['id'],
            'operation_type' => $data['operation_type'],
            'issuer_id' => $data['issuer_id'],
            'payment_method_id' => $data['payment_method_id'],
            'payment_type_id' => $data['payment_type_id'],
            'status' => $data['status'],
            'status_detail' => $data['status_detail'],
            'currency_id' => $data['currency_id'],
            'description' => $data['description'],
            'transaction_amount' => $data['transaction_amount'],
            'transaction_amount_refunded' => $data['transaction_amount_refunded'],
            'installments' => $data['installments'],
            'collector_id' => $data['user_id'],
            'captured' => $data['captured'],
            'binary_mode' => $data['binary_mode'],
            'date_approved' => isset($data['date_approved']) ? Carbon::parse($data['date_approved'])->setTimezone('UTC')->format('Y-m-d H:i:s') : null,
            'money_release_date' => isset($data['money_release_date']) ? Carbon::parse($data['money_release_date'])->setTimezone('UTC')->format('Y-m-d H:i:s') : null,
            'processing_mode' => $data['processing_mode']
        ]);
    
        // Inserir pagador
        DB::table('payers')->insert([
            'first_name' => $data['payer']['first_name'],
            'last_name' => $data['payer']['last_name'],
            'email' => $data['payer']['email'],
            'identification_number' => $data['payer']['identification']['number'],
            'identification_type' => $data['payer']['identification']['type'],
            'id_payer_mercado_pago' => $data['payer']['id'],
            'phone_number' => $data['payer']['phone']['number'],
            'phone_area_code' => $data['payer']['phone']['area_code']
        ]);
    
        // Inserir detalhes da transação
        DB::table('transaction_details')->insert([
            'transaction_id' => $transactionId,
            'net_received_amount' => $data['transaction_details']['net_received_amount'],
            'total_paid_amount' => $data['transaction_details']['total_paid_amount'],
            'installment_amount' => $data['transaction_details']['installment_amount'],
            'overpaid_amount' => $data['transaction_details']['overpaid_amount'],
            'financial_institution' => $data['transaction_details']['financial_institution'],
            'external_resource_url' => $data['transaction_details']['external_resource_url']
        ]);
    
        // Inserir detalhes de taxas
        DB::table('fee_details')->insert([
            'transaction_id' => $transactionId,
            'type' => $data['fee_details'][0]['type'],
            'amount' => $data['fee_details'][0]['amount'],
            'fee_payer' => $data['fee_details'][0]['fee_payer']
        ]);
    
        // Inserir detalhes de cobrança
        DB::table('charges_details')->insert([
            'transaction_id' => $transactionId,
            'charge_id' => $data['charges_details'][0]['id'],
            'name' => $data['charges_details'][0]['name'],
            'type' => $data['charges_details'][0]['type'],
            'amount_original' => $data['charges_details'][0]['amounts']['original'],
            'amount_refunded' => $data['charges_details'][0]['amounts']['refunded']
        ]);
    
        // Inserir detalhes do cartão
        DB::table('cards')->insert([
            'transaction_id' => $transactionId,
            'first_six_digits' => $data['card']['first_six_digits'],
            'last_four_digits' => $data['card']['last_four_digits'],
            'expiration_month' => $data['card']['expiration_month'],
            'expiration_year' => $data['card']['expiration_year'],
            'cardholder_name' => $data['card']['cardholder']['name'],
            'cardholder_identification_number' => $data['card']['cardholder']['identification']['number'],
            'cardholder_identification_type' => $data['card']['cardholder']['identification']['type']
        ]);
    
        // Inserir plano de usuário
        DB::table('planos_usuarios')->insert([
            'user_id' => $data['user_id'],
            'plano_id' => $data['idPlano'],
            'transaction_id' => $transactionId
        ]);

        \Log::info($data['tmp_assinatura']);
        \Log::info($data['user_id']);

        DB::table('usuarios')
        ->where('id', $data['user_id'])
        ->update([
            'tempo_expiracao' => Carbon::now()->addMonths((int) $data['tmp_assinatura'])->format('Y-m-d H:i:s'),
        ]);

        return true;
    }
}