<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Lizeth/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {echo 'Error en Constructor' . $err ; }

	$n1 = $_POST["n1"];
        $n2 = $_POST["n2"];
	$param = array('num1' => $n1, 'num2'=>$n2);
	$result = $client->call('ObtenerValor', $param);


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
         <title>  Respuesta  </title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <body  align="center">
        <br/><br/>
        <a href="http://localhost/webServices/NumeroMayor/">Regresar</a>
    </body>
</html>
