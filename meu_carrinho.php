<?php 
	session_start();
	
	require 'configuracao.php';	
	
	//require '../enkontraki_back/application/config/conn.php';
	include '../enkontraki_back/application/config/conexao.php';
	
	require '../enkontraki_back/application/controllers/select.php';
	require '../enkontraki_back/application/controllers/meu_carrinho.php';	
	
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once ("../enkontraki_back/application/views/head.php"); ?>
	</head>
    <body>

		<?php require_once ("../enkontraki_back/application/views/navegador.php"); ?>

		<?php require_once ("../enkontraki_back/application/views/slide.php"); ?>	
		
		<?php require_once ("../enkontraki_back/application/views/meu_carrinho.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
		
		<script src="../enkontraki_back/js/Javascript.js"></script>		
		
	</body>
	
</html>
