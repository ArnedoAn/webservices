<?php
include('../../lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial/Desiderio2/uts_server.php?wsdl','wsdl');


$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; } 
$numero1=$_POST["num1"];
$numero2=$_POST["num2"];
$params = array('num1' => $numero1,'num2'=>$numero2);
$result = $client->call('esMayor', $params);

if($result==false){
    print_r ($result.'<br/>');
    echo "<a href='index.html'>Regresar...<a/>";
}elseif($result==true){
    print_r ($result.'<br/>');
    echo "<a href='index.html'>Regresar...<a/>";
}elseif($result==true){
    print_r ($result.'<br/>');
    echo "<a href='index.html'>Regresar...<a/>";
}

if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	
	$err = $client->getError();
	if ($err) {		
		echo 'Error' . $err ;
	} else {		
	}
}
?>
