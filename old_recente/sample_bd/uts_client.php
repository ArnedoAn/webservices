<?php

	include('../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/sample_bd/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	//$param = array('ConsultarBD' =>  $ciudad);
	//$result = $client->call('ConsultarBD', $param);

    $param = array('param' =>  'Hoy Gana Colombia');
	//$result = $client->call('InsertarBD', $param);
	$result = $client->call('LeerBD', $param);





	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
			echo 'Resultado ';
			print_r ($result);
		}
	}

?>

