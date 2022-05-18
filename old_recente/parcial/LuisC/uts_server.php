<?php

include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Numero',
    array('a' => 'xsd:int','b' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:Numero',
    'urn:Numero#Numero',
    'rpc',
    'encoded',
    'Retorna el numero'
);

function Numero($a,$b){   
	if($a==$b){
		return $a." el numero es igual".$b;
	}else{
  		return $a." el numero es diferente".$b;
  	}
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?> 