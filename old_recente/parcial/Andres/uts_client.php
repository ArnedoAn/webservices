<?php
/*
 * uts_client.php
 */

include('../../lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial/Andres/uts_server.php?wsdl','wsdl');


$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('num1' => '2','num2' => '4','num3' => '6');
$result = $client->call('Metodo', $param);

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