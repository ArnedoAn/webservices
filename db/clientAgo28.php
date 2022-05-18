<?php
/*
 * generic_client.php
 */
include('../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/db/serverAgo28.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'
$err = $client->getError();//me permite determinar los errores que se generan.

$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;

$cad1 = $_POST["cad1"];
$opc = $_POST["opc"];

if ($err) {	echo 'Error en Constructor' . $err ; }
//defino los parametros que le voy a pasar al servicio web
/*********************
 * INVOCACIÓN WS CREATE
 *********************/
switch($opc){
	case 1: 
			$param = array('cadena' => $cad1);//parametros de lo que defino en la funcion del metodo de generic_server.php
			$result = $client->call('Create', $param);//me permite mostrar el resultado del metodo y sus parametros
			if ($client->fault) {
				echo 'fault';
				print_r($result);
			} else {	// Chequea errores
				$err = $client->getError();
				if ($err) {		// Muestra el error
					echo 'Error' . $err ;
				} else {		// Muestra el resultado
					echo 'Creación del registro';
					print_r ($result);
					echo "<br><a href=\"menu.html\">Menu</a>";
				}
			}
	break;

	case 2:
		$param = array('cadena' => $cad1);//parametros de lo que defino en la funcion del metodo de generic_server.php
		$result = $client->call('Delete', $param);//me permite mostrar el resultado del metodo y sus parametros
		if ($client->fault) {
			echo 'fault';
			print_r($result);
		} else {	// Chequea errores
			$err = $client->getError();
			if ($err) {		// Muestra el error
				echo 'Error' . $err ;
			} else {		// Muestra el resultado
				echo 'Eliminación del registro';
				print_r ($result);
				echo "<br><a href=\"menu.html\">Menu</a>";
			}
		}
	break;	

	default:
		
	break;	
}


/**************************
 * FIN INVOCACIÓN WS CREATE
 **************************/

/*********************
 * INVOCACIÓN WS READ
 *********************/


/**************************
 * FIN INVOCACIÓN WS UPDATE
 **************************/




/*********************
 * INVOCACIÓN WS UPDATE
 *********************/
/*$param = array('cadena1' => $cad1,'cadena2' => $cad2);//parametros de lo que defino en la funcion del metodo de generic_server.php
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
/**************************
 * FIN INVOCACIÓN WS UPDATE
 **************************/

/*********************
 * INVOCACIÓN WS DELETE
 *********************/
/*
/**************************
 * FIN INVOCACIÓN WS DELETE
**************************/

?>