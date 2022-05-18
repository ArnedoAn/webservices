<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Resultado de operacion</title>
    </head>
    <body>
        <h1>Resultado de la inserción</h1>

        <?php 
		
		//Creacion del cliente
		include('../lib/nusoap.php');
		$client = new nusoap_client('http://localhost/webservices/parcial/uts_server.php?wsdl', 'wsdl');
		$err = $client->getError();
		if ($err) {
			echo 'Error en Constructor' . $err;
		}
		
		//Capturar los datos del empleado
                $id = $_POST['id'];
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		
		//Creado del parametro para enviar al server
		$param = array('id'=>$id,'cedula' => $cedula, 'nombre' => $nombre);

		//Llamar el método para insertar y enviar el parámetro
		$result = $client->call('InsertarBD', $param);

		//Imprimir respuesta (error o exito)
		print_r($result);
		
		
		
	?>

	<!--<p>
	Opciones:
	<ul>
		<li><a href="index.php">Ver todos los registros </a></li>
		<li><a href="crearPersona.html">Regresar</a></li>
	</ul>
	</p>-->
    </body>
</html>




