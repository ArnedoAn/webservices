<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');



$server->register('NumerosIguales',
    array('numero1' => 'xsd:int', 'numero2'=>'xsd:int'),
    array('return' => 'xsd:string'),
    'urn:NumerosIguales',
    'urn:NumerosIguales#NumerosIguales', // nombre igual al server y al metodo
    'rpc',
    'encoded',
    'Retorna cuando un numero es igual a otro'
);

function NumIguales($numero1, $numero2) {
 
    if($numero1=$numero2){
    return  $numero1. 'es igual a' .$numero2;   
    }
     

} 



}



$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
//@$server->service(file_get_contents("php://input"));

$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);

?> 
