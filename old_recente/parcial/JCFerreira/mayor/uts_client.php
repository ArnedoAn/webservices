<?php

	include('lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/JCFerreira/mayor/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	$numero1 = $_POST["numero1"];
	$numero2 = $_POST["numero2"];
        $numero3 = $_POST["numero3"];
      
        $param = array('numero1' =>$numero1,'numero2'=>$numero2,'numero3'=>$numero3);
	$result = $client->call('numeromayor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
                    echo 'muestra cual es el numero mayor de tres numeros'.$result;
                    
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
