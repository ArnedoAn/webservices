<?php
include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor Los numeros', 'urn:Servidor');


$server->register('esMayor',
    array('num1' => 'xsd:integer','num2' => 'xsd:integer'),
    array('result' => 'xsd:String'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#esMayor',
    'rpc',
    'encoded',
    'Retorna si es mayor o menor');


function esMayor($num1,$num2) {
	if($num1 == $num2){
        return $num1.' es igual que '.$num2;
    } elseif($num1 > $num2) {
        return $num1.' es mayor que '.$num2;
    } elseif($num1 < $num2){
        return $num1.' es menor que '.$num2;
    }
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service(file_get_contents("php://input"));
//$server->service($HTTP_RAW_POST_DATA);
?>
