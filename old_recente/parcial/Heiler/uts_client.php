<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Heiler/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$numero = $_POST["mayor"];
	$param = array('numeroM' =>  $numero);
	$result = $client->call('numeromayor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
                    echo 'El numero '.$numero;
                    print_r($result);
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
