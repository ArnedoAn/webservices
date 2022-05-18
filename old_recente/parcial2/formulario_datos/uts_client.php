<?php
/*
 * uts_client.php
 */

include('lib/nusoap.php');
$client = new nusoap_client('http://localhost:80/webservices/parcial2/formulario_datos/uts_server.php?wsdl','wsdl');  //conexion sever


$param = array('cedula' => '1098623118','nombre' => 'abelaro ortega centeno');//param 
$result = $client->call('InsertarBD', $param);       //-->Invocar WS
//$result = $client->call('LeerBD',$param);
//$params=array('ID'=>'1','CEDULA'=>'Gano Colombia');//actualizar
//$result = $client->call('ActualizarBD',$params);//actualizar
//$param = array('ID'=>'1');//borrar
//$result = $client->call('BorrarBD',$param);//borrar

if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		print_r ($result);
	}
}
?>