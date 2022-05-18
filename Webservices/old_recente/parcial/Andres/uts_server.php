<?php
/*
 * uts_server.php
 */

include('../../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Metodo',
    array('num1' => 'xsd:int','num2' => 'xsd:int','num3' => 'xsd:int'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Metodo',
    'rpc',
    'encoded',
    'Retorna Datos Metodo'
);

function Metodo($num1,$num2,$num3) {
$a = $num1;
$b = $num2;
$c = $num3;
 

if (($a > $b) && ($a > $c)) {
    echo 'a es la mayor';
} elseif (($b > $a) && ($b > $c)) {
    echo 'b es la mayor';
} elseif (($c > $a) && ($c > $b)) {
    echo 'c es la mayor';
}

echo 'la mayor es: ' . $mayor . '<br />';

	return $mayor;
                            



}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));

?>
