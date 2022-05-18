<?php
/*
 * uts_server.php
 */

include('../../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('numeromayorotro',
    array('num1' => 'xsd:integer' , 'num2' => 'xsd:integer'),
    array('return' => 'xsd:boolean'),
    'urn:numeromayortrowsdl',
    'urn:numeromayorotrorwsdl#numeromayorotro',
    'rpc',
    'encoded',
    'Retorna el numero mayor al otro'
);

function numeromayorotro($num1, $num2) {
	// Devolvemos los parametros
    if ($num1 > $num2){
  return true; 
    }
    return false;
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>