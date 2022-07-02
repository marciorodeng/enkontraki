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
		
		<?php require_once ("../enkontraki_back/application/views/login_admin.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
		
	</body>
</html>						