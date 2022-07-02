<?php

	session_start();	
	
	require 'configuracao.php';	

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once ("../enkontraki_back/application/views/head.php"); ?>
	</head>
    <body>

		<?php require_once ("../enkontraki_back/application/views/navegador.php"); ?>

		<?php require_once ("../enkontraki_back/application/views/deposito.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
		
	</body>
</html>						