<?php
/*
 * uts_client.php
 */
//->conexxion del servidor
include('../lib/nusoap.php');
$client = new nusoap_client('http://localhost:8086/web_services/parcial2/uts_server.php?wsdl','wsdl');

$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; }

$nombre = $_POST["nombre"];
$documento = $_POST["documento"];

$param = array($nombre,$documento);
$result = $client->call('InsertarBD', $param);

//$param = array('param' => 'HoyGanaColombia');//insertar en la base de datos
//$result = $client->call('InsertarBD', $param);//llamar el metodo 
//$param = array('param' => 'HoyGanaColombia');//leer en la base de datos
//$result = $client->call('LeerBD', $param);//llamar el metodo
//$param = array('id'=>'1','var'=>'Gano Colombia');
//$result = $client->call('ActualizarBD',$param);
//$param = array('id'=>'1');
//$result = $client->call('BorrarBD',$param);

if ($client->fault) {
	echo 'Fallo';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'Resultado ';
		print_r ($result);
	}
}

?>
<html>
    <head>
        <title>::: Respuesta:::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <body >
        <br/><br/>
        <a href="index.html">Regresar...</a>
    </body>
</html>
