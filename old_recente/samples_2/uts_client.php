<?php
/*
 * uts_client.php
 */

include('../lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/samples/uts_server.php?wsdl','wsdl');


$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('param_id' => '2','param_txt' => 'DVD');
$result = $client->call('Metodo', $param);

if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'Resultado := ';
		print_r ($result);
	}
}
?>