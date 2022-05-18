<?php 

include('../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/db/serverAgo28.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'
$err = $client->getError();//me permite determinar los errores que se generan.

$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;

$cad1 = $_POST["id"];
$cad2 = $_POST["cad2"];

if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('cadena1' => $cad1,'cadena2' => $cad2);//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Update', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'Actualización del registro';
		print_r ($result);
	}
}

?>










?>