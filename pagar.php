<?php 
	session_start();	
	
	include './configuracao.php';
	
	include '../enkontraki_back/application/config/conexao.php';
	//require '../enkontraki_back/application/config/conn.php';

	require '../enkontraki_back/application/controllers/select.php';
	require '../enkontraki_back/application/controllers/pagar.php';	

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <?php require_once ("../enkontraki_back/application/views/head.php"); ?>
	</head>
    <body>

		<?php require_once ("../enkontraki_back/application/views/navegador.php"); ?>

		<?php require_once ("../enkontraki_back/application/views/slide.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/pagar.php"); ?>
		
		<?php require_once ("../enkontraki_back/application/views/footer.php"); ?>
 		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="<?php echo SCRIPT_PAGSEGURO; ?>" type="text/javascript" ></script>
        <script src="../enkontraki_back/js/personalizado.js"></script>		
	</body>
	
</html>
