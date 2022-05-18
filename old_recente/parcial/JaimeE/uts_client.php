<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/JuanE/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$numero = $_POST["numero"];
	$numero1 = $_POST["numero1"];
	$param = array('numero' =>  $numero,'numero1' => $numero1);
	$result = $client->call('ObtenerValor', $param);

	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else{
				echo $result;
			}


		}

?>

