<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Mayor',
    array('num_1' => 'xsd:int', 'num_2' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:Mayor',
    'urn:Mayor#Mayor',
    'rpc',
    'encoded',
    'Indica si un numero es mayor a otro numero'
);


function Mayor($num_1, $num_2) {

if ($num_1>$num_2){
    return " es mayor que ". $num_1;
} else {
    return " es menor que ". $num_2;
    }
} 


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
@$server->service(file_get_contents("php://input"));
//$server->service($HTTP_RAW_POST_DATA);


?> 
