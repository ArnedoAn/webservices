<?php

	include('../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/examen_one/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$param = array('int_1' =>  5, 'int_2' => 2);
	$result = $client->call('Parcial', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
			echo '';
			print_r ($result);
		}
	}

?>

