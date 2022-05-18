<?php
/*
 * uts_server.php
 */

include('../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Metodo',
    array('param_id' => 'xsd:string','param_txt' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Metodo',
    'rpc',
    'encoded',
    'Retorna Datos Metodo'
);

function Metodo($param_id,$param_txt) {
	// Devolvemos los parametros
	return strtoupper($param_id)." ".strtoupper($param_txt);
                            



}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>
