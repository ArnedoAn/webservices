<?php
/*
 * uts_server.php
 */

include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('numeroIgualotro',
    array('num1' => 'xsd:int' , 'num2' => 'xsd:int'),
    array('return' => 'xsd:boolean'),
    'urn:numeroIgualotrowsdl',
    'urn:numeroIgualotrorwsdl#numeroIgualotro',
    'rpc',
    'encoded',
    'Retorna el numero Igual al otro'
);

function numeroIgualotro($num1, $num2) {
	// Devolvemos los parametros
    if ($num1 == $num2){
  return true; 
    }
    return false;
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
