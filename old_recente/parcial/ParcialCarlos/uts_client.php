<?php
/*
 * uts_client.php
 */

include('../../lib/nusoap.php');
// Crear cliente
// HTTP, protocolo(msg), protoloco
$client = new nusoap_client('http://localhost/webservices/parcial/ParcialCarlos/uts_server.php?wsdl','wsdl');

// Revisar los errores
$error = $client->getError();
if ($error) {	echo 'Error en Constructor' . $error ; }

// Definen los parametros a pasar al servicio web
$param = array('num1' => 4, 'num2' => 6 );

// Se recupera la respuesta del servidor
$resultado = $client->call('numeroIgualotro' ,$param );

if ($client->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		if ($resultado == 1){
      echo 'el numero es igual';
     }else {
      echo 'el numero no es igual';
	}
}
}

?>