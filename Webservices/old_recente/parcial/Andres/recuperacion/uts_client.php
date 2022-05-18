<?php
/*
 * uts_client.php
 */

include('../../../lib/nusoap.php');

$client = new nusoap_client('http://localhost/webservices/parcial/Andres/recuperacion/uts_server.php?wsdl','wsdl');

// Revisar los errores
$error = $client->getError();
if ($error) {	echo 'Error en Constructor' . $error ; }


$param = array('num1' => 10000, 'num2' => 4 );


$resultado = $client->call('numeromayorotro' ,$param );

if ($client->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	
	$err = $client->getError();
	if ($err) {		
		echo 'Error' . $err ;
	} else {		
		if ($resultado == 1){
      echo 'el numero es mayor';
     }else {
      echo 'el numero es  menor';
	}
}
}

?>