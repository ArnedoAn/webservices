<?php

	include("lib/nusoap.php");
	//require("../Datos/conexion.php");

	$server = new nusoap_server();
	$server->configureWSDL('Servidor', 'urn:Servidor');
	$server->register(
		"InsertarBD", 
		array("param"=>"xsd:String","param1"=>"xsd:String"),
		array("return" => "xsd:String"),
		'urn:InsertarBDwsdl',
		'urn:InsertarBDwsdl#InsertarBD',
		'rpc',
		'encoded',
		'Retorna insertar base datos'
	);

	$server->register(
		"LeerBD", 
		array("param"=>"xsd:String"),
		array("return" => "xsd:String"),
		'urn:LeerBDwsdl',
		'urn:LeerBDwsdl#LeerBD',
		'rpc',
		'encoded',
		'Consultar base datos'
	);

	$server->register(
		"ActualizarBD", 
		array("ID"=>"xsd:String","CEDULA"=>"xsd:String","NOMBRE"=>"xsd:String"),
		array("return" => "xsd:String"),
		'urn:ActualizarBDwsdl',
		'urn:ActualizarBDwsdl#ActualizarBD',
		'rpc',
		'encoded',
		'Actualizar base datos'
	);

$server->register(
		"BorrarBD", 
		array("ID"=>"xsd:String"),
		array("return" => "xsd:String"),
		'urn:BorrarBDwsdl',
		'urn:BorrarBDwsdl#BorrarBD',
		'rpc',
		'encoded',
		'Borrar campo base datos'
	);

	function InsertarBD($param,$param1){
		$server= "localhost"; //  \
		$user= "root";//------------> Datos de conexión 
		$pwd= "admin";
		$db = "datos";
		$conn = new mysqli($server, $user, $pwd, $db); //-->Crear conexión
		if($conn->conect_error){
			die("Error" .$conn->connect_error);
		}
		$sql = "insert into usuario values('".$param."','".$param1."')";
		if($conn->query($sql)===TRUE){
			return "Sucess";
		}else{
			return 'Error '.$conn->error;
		}
		$conn->close();
		
	}

function LeerBD($param){
		$server= "localhost"; //  \
		$user= "root";//------------> Datos de conexión 
		$pwd= "admin";
		$db = "datos";
		$conn = new mysqli($server, $user, $pwd, $db); //-->Crear conexión
		if($conn->conect_error){
			die("Error" .$conn->connect_error);
		}
		$sql = "select * from usuario";
        $result=$conn->query($sql);
		if ($result->num_rows>0){
            return Json_encode($result->fetch_all());
        }else{
            return 'No se encontraron registros';
        }
		$conn->close();
		
	}

function ActualizarBD($ID,$CEDULA,$NOMBRE){
		$server= "localhost"; //  \
		$user= "root";//------------> Datos de conexión 
		$pwd= "admin";
		$db = "datos";
		$conn = new mysqli($server, $user, $pwd, $db); //-->Crear conexión
		if($conn->conect_error){
			die("Error" .$conn->connect_error);
		}
		$sql = "update usuari set cedula='$CEDULA', nombre='$NOMBRE' where id='$ID'";
        if($conn->query($sql)===TRUE){
			return "Sucess";
		}else{
			return 'Error '.$conn->error;
		}
		$conn->close();
	}

function BorrarBD($ID,$VAR){
		$server= "localhost"; //  \
		$user= "root";//------------> Datos de conexión 
		$pwd= "admin";
		$db = "datos";
		$conn = new mysqli($server, $user, $pwd, $db); //-->Crear conexión
		if($conn->conect_error){
			die("Error" .$conn->connect_error);
		}
		$sql = "DELETE from usuario where id='$ID'";
        if($conn->query($sql)===TRUE){
			return "Sucess";
		}else{
			return 'Error '.$conn->error;
		}
		$conn->close();
	}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));

  ?>