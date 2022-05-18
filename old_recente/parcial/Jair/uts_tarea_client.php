<?php
/*
 * uts_tarea_client.php
 */

include('../../lib/nusoap.php');
// Crear cliente
// HTTP, protocolo(msg), protoloco
$cliente = new nusoap_client('http://localhost/webservices/parcial/Jair/uts_tarea_server.php?wsdl','wsdl');

// Revisar los errores
$error = $cliente->getError();
if ($error) {	echo 'Error en Constructor' . $error ; }

// Definen los parametros a pasar al servicio web
$parametros = array('numero1' => 123,'numero2' => 567);

// Se recupera la respuesta del servidor
$resultado = $cliente->call('NumeroMayor', $parametros); // invocacion al metodo que esta alojado en el servidor

if ($cliente->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	// Chequea errores
	$error = $cliente->getError();
	if ($error) {		// Muestra el error
		echo 'Error' . $error ;
	} else {		// Muestra el resultado
		echo 'Resultado: ';
		print_r ($resultado);
	}
}
?>
