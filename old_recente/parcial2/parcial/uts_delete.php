<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Resultado de operacion</title>
    </head>
    <body>
        <h1>Resultado de la Eliminacion</h1>

        <?php 
		
		//Creacion del cliente
		include('../lib/nusoap.php');
		$client = new nusoap_client('http://localhost/webservices/parcial/uts_server.php?wsdl', 'wsdl');
		$err = $client->getError();
		if ($err) {
			echo 'Error en Constructor' . $err;
		}
		
		require('conexion.php');
		
		//Capturar los datos del empleado
		$id = $_GET["id"];
		
		$sql = "SELECT cedula FROM persona WHERE id = '$id'";
		$result = $conn -> query($sql);
		$registro = $result -> fetch_assoc();

		$cedula = $registro['cedula'];

		//Creado del parametro para enviar al server
		$param = array('id' => $id);

		//Llamar el método para insertar y enviar el parámetro
		$result = $client->call('EliminarBD', $param);

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