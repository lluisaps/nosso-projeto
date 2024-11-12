@extends('layout.site')

@section('styles')
<link rel="shortcut icon" href="{{ asset('img/icons/logoMundo.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection

<script>
    function limpa_formulário_cep() {
            document.getElementById('form-checkout__address').value=("");
            document.getElementById('form-checkout__district').value=("");
            document.getElementById('form-checkout__city').value=("");
            document.getElementById('form-checkout__state').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('form-checkout__address').value=(conteudo.logradouro);
            document.getElementById('form-checkout__district').value=(conteudo.bairro);
            document.getElementById('form-checkout__city').value=(conteudo.localidade);
            document.getElementById('form-checkout__state').value=(conteudo.uf);

    var select = document.getElementById("form-checkout__state");

    var novaOption = document.createElement("option");
    novaOption.value = (conteudo.uf);
    novaOption.text = (conteudo.uf);

    select.add(novaOption);
        }
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');

        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                document.getElementById('form-checkout__address').value="...";
                document.getElementById('form-checkout__district').value="...";
                document.getElementById('form-checkout__city').value="...";
                document.getElementById('form-checkout__state').value="...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            }
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }
        else {
            limpa_formulário_cep();
        }
    };
</script>

@section('conteudo')
 
  {{-- adiciona o CSS --}}
  <style>
    .progress-bar {
        width: 0;
        height: 16px;
        background-color: #4caf50;
        transition: width 0.5s ease; /* Suaviza a transição */
    }

    .progress-bar.animated {
        background-color: #4caf50;
        width: 100%; /* Faz a barra crescer até 100% */
    }
  </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row mt-5 ml-1 mx-auto" style="margin-top: -2em !important;">
        <div class="col-sm-6 mt-5">
            <h5 class="text-center">Efetue o pagamento do seu plano mensal</h5>
            <img src="{{asset('img/icons/logo.png')}}" alt="Checkout" class="img-fluid mt-5">
            <div class="card-footer text-center">
                <p></p>
                <a href="/home">Voltar para a pagina inicial.</a>
            </div>
        </div>
        <div class="col-sm-6">
            <form id="form-checkout" class="container mt-5" style="background: transparent !important">
                <input type="hidden" id="MPHiddenInputPaymentMethod" />
                <input type="hidden" id="MPHiddenInputToken" />
                <input type="hidden" id="MPHiddenInputProcessingMode" />
                <input type="hidden" id="MPHiddenInputMerchantAccountId" />
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="form-checkout__cardNumber" class="form-label">Número do cartão</label>
                        <div id="form-checkout__cardNumber" class="form-control"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="form-checkout__cardholderName" class="form-label">Nome do titular do cartão</label>
                        <input type="text" id="form-checkout__cardholderName" class="form-control" placeholder="Nome" />
                    </div>
                    <div class="col-md-6">
                        <label for="form-checkout__cardholderSurname" class="form-label">Sobrenome</label>
                        <input type="text" id="form-checkout__cardholderSurname" class="form-control" placeholder="Sobrenome" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="form-checkout__expirationDate" class="form-label">Vencimento</label>
                        <div id="form-checkout__expirationDate" class="form-control"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="form-checkout__securityCode" class="form-label">Código de segurança (CSC)</label>
                        <div id="form-checkout__securityCode" class="form-control"></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="form-checkout__issuer" class="form-label">Bandeira do cartão</label>
                        <select id="form-checkout__issuer" class="form-select">
                            <option selected>Escolha a bandeira</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="form-checkout__installments" class="form-label">Parcelas</label>
                        <select id="form-checkout__installments" class="form-select">
                            <option selected>Escolha o número de parcelas</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="form-checkout__identificationType" class="form-label">Tipo de identificação</label>
                        <select id="form-checkout__identificationType" class="form-select">
                            <option selected>Escolha o tipo de documento</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="form-checkout__identificationNumber" class="form-label">Número de identificação</label>
                        <input type="text" id="form-checkout__identificationNumber" class="form-control" placeholder="Número de identificação" />
                    </div>
                    <div class="col-md-6">
                        <label for="form-checkout__cardholderEmail" class="form-label">Email</label>
                        <input type="email" id="form-checkout__cardholderEmail" class="form-control" placeholder="exemplo@dominio.com" />
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label for="form-checkout__zipCode" class="form-label">CEP</label>
                    <input type="text" id="form-checkout__zipCode" class="form-control" onblur="pesquisacep(this.value);" placeholder="CEP" />
                </div>
                    <div class="col-md-6">
                        <label for="form-checkout__address" class="form-label">Endereço</label>
                        <input type="text" id="form-checkout__address" class="form-control" placeholder="Endereço" />
                    </div>
                    <div class="col-md-6">
                        <label for="form-checkout__district" class="form-label">Distrito/Bairro</label>
                        <input type="text" id="form-checkout__district" class="form-control" placeholder="Distrito/Bairro" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="form-checkout__city" class="form-label">Cidade</label>
                        <input type="text" id="form-checkout__city" class="form-control" placeholder="Cidade" />
                    </div>
                    <div class="col-md-4">
                        <label for="form-checkout__state" class="form-label">Estado</label>
                        <select id="form-checkout__state" class="form-select">
                            <option selected>Escolha o estado</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="form-checkout__country" class="form-label">País</label>
                        <select id="form-checkout__country" class="form-select">
                        <option selected>Selecione o País</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="submit" id="form-checkout__submit" class="btn btn-primary btn-block">Pagar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <progress style="background-color: #a0b0b4; display: none" value="0" max="100" class="progress-bar w-100">Carregando...</progress>
                    </div>
                </div>
            </form>
        </div>
        </div>
@endsection


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
      const planValue = "{{$valor}}";
      const planId = "{{$plano}}";
      const tmpAssinatura = "{{$tempo_assinatura}}";
      const user_id = "{{$user_id}}";

      const mp = new MercadoPago("{{ env('PUBLIC_KEY') }}");

      const cardForm = mp.cardForm({
        amount: planValue,
        iframe: true,
        form: {
          id: "form-checkout",
          cardNumber: {
            id: "form-checkout__cardNumber",
            placeholder: "Número do cartão",
            class: "form-control"
          },
          expirationDate: {
            id: "form-checkout__expirationDate",
            placeholder: "MM/YY",
          },
          securityCode: {
            id: "form-checkout__securityCode",
            placeholder: "Código de segurança",
          },
          cardholderName: {
            id: "form-checkout__cardholderName",
            placeholder: "Titular do cartão",
          },
          issuer: {
            id: "form-checkout__issuer",
            placeholder: "Banco emissor",
          },
          installments: {
            id: "form-checkout__installments",
            placeholder: "Parcelas",
          },
          identificationType: {
            id: "form-checkout__identificationType",
            placeholder: "Tipo de documento",
          },
          identificationNumber: {
            id: "form-checkout__identificationNumber",
            placeholder: "Número do documento",
          },
          cardholderEmail: {
            id: "form-checkout__cardholderEmail",
            placeholder: "E-mail",
          },
        },
        callbacks: {
          onFormMounted: error => {
            if (error) return console.warn("Form Mounted handling error: ", error);
            console.log("Form mounted");
          },
          onSubmit: event => {
            event.preventDefault();

            const {
              paymentMethodId: payment_method_id,
              issuerId: issuer_id,
              cardholderEmail: email,
              amount,
              token = "{{ env('TOKEN_BEARER') }}",
              installments,
              identificationNumber,
              identificationType,
            } = cardForm.getCardFormData();


            fetch("{{ route('pagamento.processo') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
              body: JSON.stringify({
                planId,
                tmpAssinatura,
                user_id: user_id,
                token,
                issuer_id,
                payment_method_id,
                transaction_amount: Number(amount),
                installments: Number(installments),
                description: "Compra de plano do sistema PROS",
                payer: {
                  email,
                  user_id: user_id,
                  identification: {
                    type: identificationType,
                    number: identificationNumber,
                  },
                },
              }),
            }).then(response => {
                return response.json();  // Converte a resposta em JSON
            }).then(data => {
                //redireciona para a url de login com a mensagem de boas vindas
                document.location.href = '/redirect';
                console.log('Success:', data); // Verifica se há sucesso
            }).catch(error => {

                alert('Ocorreu um erro ao processar o pagamento. Por favor, tente novamente mais tarde.');

                console.error('Error: ' ); // Captura erros da solicitação
            });
          },
          onFetching: (resource) => {
            console.log("Fetching resource: ", resource);

            if(resource === "cardToken") {
                const progressBar = document.querySelector(".progress-bar");
                progressBar.style.display = "block";
                let value = 0;
                progressBar.value = value;  // Reseta o valor da barra de progresso

                // Inicia uma animação que incrementa o valor da barra de progresso
                const interval = setInterval(() => {
                    if (value >= 100) {
                        clearInterval(interval);  // Para quando atingir 100%
                    } else {
                        value += 1;  // Aumenta o valor progressivamente
                        progressBar.value = value;
                    }
                }, 50);  // Ajuste o intervalo de tempo para controlar a velocidade da animação

                return () => {
                    clearInterval(interval);  // Certifica que a animação para quando terminar
                    progressBar.value = 100;  // A barra de progresso chega a 100% no final
                };
            }
          },
          onSuccess: (result) => {
            console.log("Success result: ", result);
          }
        },
      });
    </script>
