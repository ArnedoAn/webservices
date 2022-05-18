<?php
/*
 * generic_client.php
 */
include('../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/gen/serverAgo21.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'

//ADD
$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;


$numero1= $_POST["num1"];
$numero2= $_POST["num2"];


$err = $client->getError();//me permite determinar los errores que se generan.
if ($err) {	echo 'Error en Constructor' . $err ; }

//defino los parametros que le voy a pasar al servicio web

/*********************
 * INVOCACIÓN WS SUMAR
 *********************/
$param = array('numero1' => $numero1,'numero2' => $numero2);//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Sumar', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'la suma de los dos números es: ';
		print_r ($result);
	}
}
/**************************
 * FIN INVOCACIÓN WS SUMAR
 **************************/
echo '<br>';
/*********************
 * INVOCACIÓN WS CONCATENAR
 *********************/
$param = array('cadena1' => 'Hola ','cadena2' => 'Mundo');//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Concatenar', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'la concatenación es : ';
		print_r ($result);
	}
}
/**************************
 * FIN INVOCACIÓN WS CONCATENAR
 **************************/
echo '<br>';
/*********************
 * INVOCACIÓN WS DIVIDIR
 *********************/
$param = array('numero1' => $numero1,'numero2' => $numero2);//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Dividir', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'la división es : ';
		print_r ($result);
	}
}
/**************************
 * FIN INVOCACIÓN WS CONCATENAR
 **************************/
?>