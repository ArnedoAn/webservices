<?php

	include('lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial2/parcial2_juan_ferreira/DBCRUD/uts_server.php?wsdl','wsdl');
 

	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }
    
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
   
  $param = array('cedula'=>$cedula,'nombre' =>$nombre);
	$result = $client->call('InsertarBD',$param);

	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;
		}else{
			echo'Resultado';
			print_r($result);
		}
	}

		