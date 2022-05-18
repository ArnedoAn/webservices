<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('NumerosIguales',
    array('numero1' => 'xsd:int', 'numero2' => 'xsd:int'),
    array('return' => 'xsd:Boolean'),
    'urn:NumerosIguales',
    'urn:NumerosIguales#NumerosIguales',
    'rpc',
    'encoded',
    'Retorna un valor booleano si es igual true y si no retorna false'
);

function NumerosIguales($numero1 , $numero2) {
		
		if($numero1 == $numero2){
			return json_encode(true);
		}
		return json_encode(false);
		
}


//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);

?> 