<?php
/*
 * uts_server.php
 */

include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');

//registro del servidor
$server->register('Metodo',
    array('param_id' => 'xsd:integer','param_txt' => 'xsd:integer'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Metodo',
    'rpc',
    'encoded',
    'Retorna Datos Metodo'
);

function Metodo($param_id,$param_txt) {
	// Devolvemos los parametros

	if ($param_id==$param_txt) {
		return "RESULTADO =".$param_id."es igual ".$param_txt;
	} else {
		if ($param_id<$param_txt) {
			return "RESULTADO =".$param_id."es menor ".$param_txt;
		} else {
			return "RESULTADO =".$param_id."es mayor ".$param_txt;
		}
		
	}
}

//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);

$rawPortData= file_get_contents("php://input");
$server->service($rawPortData);
?>
