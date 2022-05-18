<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('numeromayor'),
    array('numeroM' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:numeromayor',
    'urn:numeromayor#numeromayor',
    'rpc',
    'encoded',
    'Indica si la palabra ingresada numero es mayor'
);


function numeromayor($n1,$n2) {
 $n1=['numero1']);
 $n2=['numero2']);

if ($n1>$n2){
     
}
elseif ($n1==$n2){
    
}
else{
   
}

} 


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);


?> 
