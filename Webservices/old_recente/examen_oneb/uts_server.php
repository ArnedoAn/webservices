<?php
/*
 * uts_server.php
 */

include('../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Parcial',
    array('int_1' => 'xsd:integer','int_2' => 'xsd:integer'),
	array('return' => 'xsd:boolean'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Parcial',
    'rpc',
    'encoded',
    'Retorna Estado Conexion'
);

function Parcial($int_1, $int_2) {
	if($int_1>$int_2){
		return true;
	}
	else{
		return false;
	}
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>
