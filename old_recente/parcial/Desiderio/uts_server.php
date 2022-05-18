<?php
include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor Los numeros', 'urn:Servidor');


$server->register('esMayor');
    array('num1' => 'xsd:integer','num2' => 'xsd:integer');
    array('result' => 'xsd:string');
    'urn:Metodowsdl';
    'urn:Metodowsdl#esMayor';
    'rpc';
    'encoded';
    'Retorna si es mayor o menor';
;

function esMayor($num1,$num2) {
	if($num1 == $num2){
        return 'a es igual que b';
    } elseif($num1 > $num2) {
        return 'a es mayor que b';
    } elseif($num1 < $num2){
        return 'b es mayor que a';
    }
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->services(file_get_contents("php://input"));
$server->service($HTTP_RAW_POST_DATA);
?>
