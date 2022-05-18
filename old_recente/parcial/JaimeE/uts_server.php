<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerValor', // Nombre del server = Nombre del metodo a llamar
    array('numero' => 'xsd:int', 'numero1' => 'xsd:int'),
    array('return' => 'xsd:string'),
    'urn:ObtenerValor',
    'urn:ObtenerValor#ObtenerValor', // nombre del metodo 
    'rpc',
    'encoded',
    'Retorna si dos numeros son iguales o diferentes'
);



function ObtenerValor($numero,$numero1) {
    if($numero == $numero1){
        return 'los numeros son iguales !!!';
    }else{
        return 'los numeros '.$numero.' y '.$numero1.' son diferentes !!!';
    }

}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);


?> 
