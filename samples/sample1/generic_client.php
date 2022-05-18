<?php
/*
 * generic_client.php
 */
include('../../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/samples/sample1/generic_server.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'

$err = $client->getError();//me permite determinar los errores que se generan.
if ($err) {	echo 'Error en Constructor' . $err ; }

//defino los parametros que le voy a pasar al servicio web
$param = array('numero1' => 18,'numero2' => 56);//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Metodo', $param);//me permite mostrar el resultado del metodo y sus parametros

if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'el mayor dos numeros es: ';
		print_r ($result);
	}
}
?>