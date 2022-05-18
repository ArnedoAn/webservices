<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerMayor',
    array('numero_a' => 'xsd:int', 'numero_b' => 'xsd:int'),
    array('return' => 'xsd:string'),
    'urn:ObtenerMayor',
    'urn:ObtenerMayor#ObtenerMayor',
    'rpc',
    'encoded',
    'Retorna numero mayor'
);



function ObtenerMayor($numero_a, $numero_b) {

	if($numero_a > $numero_b){
		return 'numero a '.$numero_a.' es mayor';
}elseif ($numero_b > $numero_a) {
		return 'numero b '.$numero_b.' es mayor';
}

}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
@$server->service(file_get_contents("php://input"));
//$server->service($HTTP_RAW_POST_DATA);


?> 
