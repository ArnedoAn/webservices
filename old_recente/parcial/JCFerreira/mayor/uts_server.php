<?php

include('lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('numeromayor',
    array('numero1' => 'xsd:int','numero2' => 'xsd:int','numero3' => 'xsd:int'),
    array('return' => 'xsd:int'),
    'urn:numeromayor',
    'urn:numeromayor#numeromayor',
    'rpc',
    'encoded',
    'Indica si un numero ingresado es mayor'
);


function numeromayor($numero1,$numero2,$numero3) {
    if ($numero1 > $numero2&&$numero1 > $numero3){
          return $numero1;}
    else {    if ($numero1 < $numero2&&$numero2 > $numero3)
 {return$numero2;}    
 else {
    return $numero3;   
}
 
 }
    

}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
@$server->service(file_get_contents("php://input"));


?> 
