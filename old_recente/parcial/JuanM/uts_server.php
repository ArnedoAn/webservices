<?php
/*
 * uts_server.php
 */

include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('MayorMenor',
    array('a' => 'xsd:integer','b' => 'xsd:integer'),
    array('return' => 'xsd:string'),
    'urn:MayorMenor',
    'urn:MayorMenor#MayorMenor',
    'rpc',
    'encoded',
    'Determina cual es el numero mayor entre dos numeros'
);

function MayorMenor($a,$b) {
	
	$mensaje = "*";

	if($a > $b){

		$mensaje = "El numero ".$a." es mayor que ".$b;

	} elseif ($a == $b) {
		
		$mensaje = "Ambos numeros son iguales (" . $a . "=". $b . ")";

	} else {

		$mensaje = "El numero ".$b." es mayor que ".$a;
	}
	return $mensaje;
}

//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);




?>
