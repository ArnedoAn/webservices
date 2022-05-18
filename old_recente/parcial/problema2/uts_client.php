<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/problema2/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
	$param = array('numero1' =>  $n1, 'numero2'=>$n2);
	$result = $client->call('NumerosIguales', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		
                    print_r($result);
		}
	}

?>

