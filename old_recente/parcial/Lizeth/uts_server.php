<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerValor',
array('num1' => 'xsd:int', 'num2' => 'xsd:int' ),
    array('return' => 'xsd:string'),
    'urn:ObtenerValor',
    'urn:ObtenerValor#ObtenerValor',
    'rpc',
    'encoded',
    'Me si un numero es mayor que otro'
);


function ObtenerValor($num1, $num2) {

if ($num1>$num2){
    return " El  ".$num1." es mayor que ".$num2;
} else {
    if ($num2>$num1){
        return " El  ".$num2." es mayor que ".$num1;
    }else{
        return " El  ".$num1." es igual que ".$num2;
    }
    
    
    }
} 






$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
//$server->service($HTTP_RAW_POST_DATA);


?> 
