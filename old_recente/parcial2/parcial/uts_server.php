<?php

include('lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('InsertarBD',
    array('id'=>'xsd:integer','cedula'=>'xsd:integer', 'nombre'=>'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#InsertarBD',
    'rpc',
    'encoded',
    'Inserta un registro en una Base de Datos.'
);

$server->register('LeerBD',
    array('param' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#LeerBD',
    'rpc',
    'encoded',
    'Consulta todos los datos en la tabla.'
);

$server->register('ActualizarBD',
    array('id'=>'xsd:integer', 'cedula'=>'xsd:integer', 'nombre'=>'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#ActualizarBD',
    'rpc',
    'encoded',
    'Actualiza los valores de un registro.'
);

$server->register('EliminarBD',
    array('id' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#EliminarBD',
    'rpc',
    'encoded',
    'Elimina un registro'
);
//require "conexion.php";

function InsertarBD($cedula, $nombre) {

		$server = 'localhost';
		$user = 'root';
		$pwd = 'admin';
		$database = 'parcial';

		$conn = new mysqli($server, $user, $pwd, $database);


		//se debe poner una comilla sencilla antes de la comilla doble por ser String Las primeras comillas sencillas envuelven el valor en la instruccion para que se varchar. Las segundas son para la sintaxis de la linea String y partirla para agregar la variable.
		$sql = "INSERT INTO persona (id, cedula, nombre)
				VALUES (".$cedula.", '".$nombre.")";

		if ($conn->query($sql) === TRUE) {

			return "Se ha guardado correctamente.";

		} else {

			return "No se ha guardado la informacion ".$conn->error;

		}
}

function LeerBD($param) {

		$server = 'localhost';
		$user = 'root';
		$pwd = 'admin';
		$database = 'parcial';

		$conn = new mysqli($server, $user, $pwd, $database);

		$sql = "SELECT * FROM persona";
		$result = $conn->query($sql);

		if ($result -> num_rows > 0) {

                 return json_encode($result -> fetch_all());

		} else {

			return "No se encontraron registros";

		}
}


function ActualizarBD($id, $cedula, $nombre) {

		$server = 'localhost';
		$user = 'root';
		$pwd = 'admin';
		$database = 'parcial';

		$conn = new mysqli($server, $user, $pwd, $database);

		$sql = "UPDATE persona SET cedula = '$cedula', nombre = '$nombre' = WHERE id = '$id'";

		if ($conn->query($sql) === TRUE) {

			return "Actualizado correctamente";

		} else {

			return "No se ha podido actualizar";

		}
}

function EliminarBD($id) {

		$server = 'localhost';
		$user = 'root';
		$pwd = 'admin';
		$database = 'parcial';

		$conn = new mysqli($server, $user, $pwd, $database);

		$sql = "DELETE FROM persona WHERE id = '$id'";

		if ($conn->query($sql) === TRUE) {

			return "Eliminado correctamente";

		} else {

			return "No se pudo Eliminar";

		}
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));


?>