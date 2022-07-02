<?php
	session_start();	
	
	require 'configuracao.php';	
	
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
			
			<?php require_once ("../enkontraki_back/application/views/dicas.php"); ?>
			
			<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
			
	</body>
</html>	