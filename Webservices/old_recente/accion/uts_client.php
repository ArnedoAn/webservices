<?php

	include('../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/accion/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$moneda = $_POST["acciones"];
	$param = array('moneda_origen' =>  $moneda);
	$result = $client->call('ObtenerValor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
			echo 'El valor de por accion de '.$moneda.' es igual a ';
			print_r ($result);
			echo ' pesos';
		}
	}

?>

