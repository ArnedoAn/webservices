<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Abelardo/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	
    $numero = $_POST["num1"];
    
	$param = array('num1' =>  $numero);
    
	$result = $client->call('Mayor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
                    
                    echo 'El numero  '.$numero;
                    
                    print_r($result);
                    
               
                    
        }
                   
		}
	

?>

