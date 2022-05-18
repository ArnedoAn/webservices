<?php


include('../../lib/nusoap.php');

$client = new nusoap_client('http://localhost/webservices/parcial/Karen/uts_server.php?wsdl','wsdl');


$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('num_1' => '2','num_2' => '3');
$result = $client->call('Metodo', $param);

if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	
	$err = $client->getError();
	if ($err) {		
		echo 'Error' . $err ;
	} else {		
		echo 'Resultado ';
		print_r ($result);
	}
}
?>