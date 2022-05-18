<?php

include('./lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('numeromayor',
    array('numero1' => 'xsd:int','numero2' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:numeromayor',
    'urn:numeromayor#numeromayor',
    'rpc',
    'encoded',
    'Indica si la palabra ingresada numero es mayor'
);


function numeromayor($numero1,$numero2) {

if ($numero1>$numero2){

    return " el numero ".$numero2." es mayor ".$numero1;
    
     
}elseif($numero1<$numero2){
    return " el numero ".$numero2." es menor ".$numero1;
}
if($numero1==$numero2){
    return " es igual que ". $numero1;

}else{
    return " es igual que ". $numero2;
   
}

} 


//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));



?> 
