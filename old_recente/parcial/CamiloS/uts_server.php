<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerValor',
    array('numero1' => 'xsd:int', 'numero2'=> 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:ObtenerValor',
    'urn:ObtenerValor#ObtenerValor',
    'rpc',
    'encoded',
    'Indica si un numero es mayor que otro'
);


function ObtenerValor($numero1, $numero2) {

if ($numero1>$numero2){
    return " el numero ".$numero1." es mayor que ".$numero2;
} else {
    if ($numero2>$numero1){
        return " el numero ".$numero2." es mayor que ".$numero1;
    }else{
        return " el numero ".$numero1." es igual que ".$numero2;
    }
    
    
    }
} 


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);

$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);


?> 
