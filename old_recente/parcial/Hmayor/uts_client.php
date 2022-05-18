<?php

	include('./lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Hmayor/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$Numero1 = $_POST["m1"];
      $Numero2 = $_POST["m2"];
	$param = array('numero1' =>$Numero1,'numero2'=>$Numero2);
	$result = $client->call('numeromayor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
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
