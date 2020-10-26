<?php
//Dados da Empresa	
$idSis_Empresa=1;
define("IDSIS_EMPRESA", "1");

	require '../enkontraki_back/application/config/conexao.php';
	require '../enkontraki_back/application/controllers/select.php';


$site_empresa = $row_empresa['Site'];
$ativo_pagseguro = $row_documento['Ativo_Pagseguro'];

define("SITE_EMPRESA", $row_empresa['Site']);

define("URL", "https://www.enkontraki.com.br/enkontraki/");
define("URL_NOTIFICACAO", "https://www.enkontraki.com.br/enkontraki/notificacao.php");
define("EMAIL_LOJA", "marciorodeng@gmail.com");
define("EMAIL_PAGSEGURO", "marciorodeng@gmail.com");
define("MOEDA_PAGAMENTO", "BRL");

if($ativo_pagseguro == "N"){
    //Credenciais do SandBox
	define("TOKEN_PAGSEGURO", "A058483B1624431FB344C5FB79A44A4E");
	define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
	define("URL_NOTIFICACAO_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/");
}elseif($ativo_pagseguro == "S"){
    //Credenciais do PagSeguro
	define("TOKEN_PAGSEGURO", "0926B71D5A7C4CB2AA670920FAAED535");
	define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
	define("URL_NOTIFICACAO_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v3/transactions/notifications/");
}