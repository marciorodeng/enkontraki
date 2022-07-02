<?php
	include 'configuracao.php';
	include '../enkontraki_back/application/config/conexao.php';	

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){	


	$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);
	
	$data['email'] = EMAIL_PAGSEGURO;	
	$data['token'] = TOKEN_PAGSEGURO;
	

	$data = http_build_query($data);

	$url = URL_NOTIFICACAO_PAGSEGURO.$_POST["notificationCode"].'?'.$data;
	
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	//curl_setopt($curl, CURLOPT_URL, $url);
	//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

	$Retorno = curl_exec($curl);

	curl_close($curl);

	$xml = simplexml_load_string($Retorno);
	/*
	$curl=$pdo->prepare("update App_Pagamento set status=? where idApp_Pagamento=?");
	$curl->bindValue(1,$xml->status);
	$curl->bindValue(2,$xml->reference);	
	$curl->execute();
	*/
	$query_car = "	SELECT 
						idSis_Empresa,
						status
					FROM 
						App_Pagamento
					WHERE 
						idApp_Pagamento = '" . $xml->reference . "'
					LIMIT 1";

	$resultado_car = $pdo->prepare($query_car);
	$resultado_car->execute();

	while ($row_car = $resultado_car->fetch(PDO::FETCH_ASSOC)) {
		$id_empresa = $row_car['idSis_Empresa'];
		$status = $row_car['status'];
	}	
	
	if(isset($status) && $status == '0'){
	
		$query_empresa = "	
			SELECT 
				DataDeValidade
			FROM 
				Sis_Empresa
			WHERE 
				idSis_Empresa = '" . $id_empresa . "'
			LIMIT 1
		";

		$resultado_empresa = $pdo->prepare($query_empresa);
		$resultado_empresa->execute();

		while ($row_empresa = $resultado_empresa->fetch(PDO::FETCH_ASSOC)) {
			$datavalidade = $row_empresa['DataDeValidade'];
		}	
		
		$datadehoje = date('Y-m-d');
		
		if(isset($xml->status) && ($xml->status == '3' || $xml->status == '4' || $xml->status == '5')){	
			
			$curl2=$pdo->prepare("update App_Pagamento set AprovadoOrca=?, QuitadoOrca=?, DataPagoOrca=?, status=?  where idApp_Pagamento=?");
			$curl2->bindValue(1,'S');
			$curl2->bindValue(2,'S');
			$curl2->bindValue(3,$datadehoje);
			$curl2->bindValue(4,$xml->status);
			$curl2->bindValue(5,$xml->reference);	
			$curl2->execute();
			
			$curl3=$pdo->prepare("update App_Parcelas_Pagamento set Quitado=?, DataPago=?  where idApp_Pagamento=?");
			$curl3->bindValue(1,'S');
			$curl3->bindValue(2,$datadehoje);
			$curl3->bindValue(3,$xml->reference);	
			$curl3->execute();
			
			$curl1=$pdo->prepare("update Sis_Empresa set DataDeValidade=? where idSis_Empresa=?");

			$curl1->bindValue(1,date('Y-m-d', strtotime('+1 month',strtotime($datavalidade))));
			
			$curl1->bindValue(2,$id_empresa);	
			$curl1->execute();
			
		}elseif(isset($xml->status) && ($xml->status == '1' || $xml->status == '2' || $xml->status == '6' || $xml->status == '7' || $xml->status == '8' || $xml->status == '9')){
			
			$curl2=$pdo->prepare("update App_Pagamento set AprovadoOrca=?, QuitadoOrca=?, status=?  where idApp_Pagamento=?");
			$curl2->bindValue(1,'N');
			$curl2->bindValue(2,'N');
			$curl2->bindValue(3,$xml->status);
			$curl2->bindValue(4,$xml->reference);	
			$curl2->execute();
			
			$curl3=$pdo->prepare("update App_Parcelas_Pagamento set Quitado=? where idApp_Pagamento=?");
			$curl3->bindValue(1,'N');
			$curl3->bindValue(2,$xml->reference);	
			$curl3->execute();		
		}
		
	}
	
}