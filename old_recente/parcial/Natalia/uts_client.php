<?php


include('../../lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial/Natalia/uts_server.php?wsdl','wsdl');



$err = $client->getError();
if ($err) {	echo 'Error' . $err ; }


$param = array('num1' => 1, 'num2' => 3);
$resultado = $client->call('Mayor', $param);

if ($client->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	
	$err = $client->getError();
	if ($err) {		
		echo 'Error' . $err ;
	} else {
		print_r ($resultado);
	}
}
?>