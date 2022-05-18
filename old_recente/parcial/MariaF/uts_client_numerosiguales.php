<!DOCTYPE html>
<html>
	<head>
		<title>Numeros Iguales</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div>
			<div>
				<?php

					include('../../lib/nusoap.php');
					$client = new nusoap_client('http://localhost/webservices/parcial/MariaF/uts_server_numerosiguales.php?wsdl','wsdl');


					$err = $client->getError();
					if ($err) {	echo 'Error en Constructor' . $err ; }
				
					$param = array('numero1' => $_POST['numero1'], 'numero2' => $_POST['numero2']);
					$result = $client->call('NumerosIguales', $param);


					if ($client->fault) {
						echo 'Fallo';
						print_r($result);

					} else {	// Chequea errores

						$err = $client->getError();
						if ($err) {		// Muestra el error
							echo 'Error' . $err ;

						} else {		// Muestra el resultado
							echo '';
							print_r ($result);
						}
					}

				?><br><br>
				
			</div>
		</div>
	</body>
</html>