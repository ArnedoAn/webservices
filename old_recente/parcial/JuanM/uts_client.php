<?php
/*
 * uts_client.php
 */

include('../../lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial/JuanM/uts_server.php?wsdl','wsdl');


$err = $client->getError();
if ($err) {	

	echo 'Error en Constructor' . $err ; 

}

$param = array('a' => 5,'b' => 89);
$result = $client->call('MayorMenor', $param);

if ($client->fault) {

	echo 'Fallo';
	print_r($result);

} else {	// Chequea errores

	$err = $client->getError();

	if ($err) { // Muestra el error
		echo 'Error' . $err ;

	} else { // Muestra el resultado
		print_r ($result);
	}
}
?>
