<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerValor',
array('numero1' => 'xsd:int', 'numero2' => 'xsd:int' ),
    array('return' => 'xsd:String'),
    'urn:ObtenerValor',
    'urn:ObtenerValor#ObtenerValor',
    'rpc',
    'encoded',
    'Me retorna sin el munero es mayor o menor que el otro  digitados por el usuario'
);

function ObtenerValor($numero1, $numero2) {

if ($numero1>$numero2){
    return " es mayor ";
} else {
    return " es menor";
    }
} 


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);

?> 
