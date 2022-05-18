<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Mayor',
    array('num1' => 'xsd:int', 'num2' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:Mayor',
    'urn:Mayor#Mayor',
    'rpc',
    'encoded',
    'Indica si un numero es mayor a otro numero'
);


function Mayor($num1, $num2) {

if ($num1>$num2){
    return " es mayor que ";
} else {
    return " es menor que ";
    }
} 

$rawPortData= file_get_contents("php://input");
$server->service($rawPortData);


?> 
