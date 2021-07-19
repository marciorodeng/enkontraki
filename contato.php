<?php
	//include_once("php/conn.php");
	session_start();	
	
	require 'configuracao.php';	
	
	//require '../enkontraki_back/application/config/conn.php';
	include '../enkontraki_back/application/config/conexao.php';
	
	require '../enkontraki_back/application/controllers/select.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once ("../enkontraki_back/application/views/head.php"); ?>
	</head>
    <body>

		<?php require_once ("../enkontraki_back/application/views/navegador.php"); ?>

		<?php #require_once ("../enkontraki_back/application/views/slide.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/contato.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
		
		<script type="text/javascript" src="/mibew/js/compiled/chat_popup.js"></script>
		<script type="text/javascript">Mibew.ChatPopup.init({"id":"5e73e3aadb299d07","url":"\/mibew\/chat?locale=en","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/mibew\/chat\/style\/popup"});</script>	
	</body>
</html>						