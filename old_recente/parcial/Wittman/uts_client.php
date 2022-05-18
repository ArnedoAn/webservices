<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Wittman/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$numA = $_POST["numero_A"];
	$numB = $_POST["numero_B"];
	$paramA = array('numero_a' =>  $numA, 'numero_b' => $numB);
	
	$result = $client->call('ObtenerMayor', $paramA);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
			

			echo ' Respuesta : ';
			print_r ($result);
			

}
	}

?>