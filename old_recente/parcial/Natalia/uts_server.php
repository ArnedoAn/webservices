<?php
/*
 * uts_server.php
 */

include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');

$server->register('Mayor',
    array('num1' => 'xsd:int', 'num2' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:Mayorwsdl',
    'urn:Mayorrwsdl#Mayor',
    'rpc',
    'encoded',
    'Retorna si es mayor y el numero que es mayor'
);





function Mayor($num1, $num2) {
	
    if($num1 > $num2){
        return "El numero mayor es: " .$num1;
    }
    return "El numero mayor es: " .$num2;
    
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? 
    $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>