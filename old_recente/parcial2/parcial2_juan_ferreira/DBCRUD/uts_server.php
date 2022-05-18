<?php

include('lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');

$server->register("InsertarBD",
        array('param'=>'xsd:String'),
        array('return'=>'xsd:String'),
        'urn:Metodowsdl',
        'urn:Metodowsdl#InsertarBD',
        'rpc',
        'encoded',
        'Retorna Estado conexion');
$server -> register("InsertarBD",
	array('param'=>'xsd:String'),
	array('return'=>'xsd:String'),
	'urn:Metodowsdl',
	'urn:Metodo#InsertarBD',
	'rpc',
	'encoded',
	'Retorna Estado Conexion');

$server->register("LeerBD",
	array('param'=>'xsd:String'),
	array('return'=>'xsd:String'),
	'urn:Metodowsdl',
	'urn:Metodo#LeerBD',
	'rpc',
	'encoded',
	'Retorna Estado Conexion');

$server->register("ActualizarBD",
	array('id'=>'xsd:String','var'=>'xsd:String'),
	array('return'=>'xsd:String'),
	'urn:Metodowsdl',
	'urn:Metodo#ActualizarBD',
	'rpc',
	'encoded',
	'Retorna Estado Conexion');

$server->register("BorrarBD",
	array('id'=>'xsd:String'),
	array('return'=>'xsd:String'),
	'urn:Metodowsdl',
	'urn:Metodo#BorrarBD',
	'rpc',
	'encoded',
	'Retorna Estado Conexion');


function InsertarBD($cedula,$nombre){
	$server="localhost:3306";
	$user="root";
	$pwd="admin";
	$BD= "webservice";
	$conn=new mysqli($server,$user,$pwd,$BD);
	$sql="INSERT INTO cliente (cedula,nombre) values('".$cedula."', '".$nombre."')";
	if($conn->query($sql)===TRUE){
		return 'Success';
	}
	else{
		return 'Error insert '.$conn->error;
	}
	
}

function LeerBD($param){
	$server="localhost:3306";
	$user="root";
	$pwd="admin";
	$BD= "webservice";
	$conn=new mysqli($server,$user,$pwd,$BD);
	$sql='select *from cliente;';
	$result = $conn->query($sql);
	if($result->num_rows>0){
		return json_encode($result->fetch_all());
	}
	else{
		return 'No se encontraron registros';
	}
	
}

$sql = "UPDATE cliente SET cedula = '$cedula', nombre = '$nombre' WHERE id = '$id'";


function ActualizarBD($id,$cedula,$nombre){
	$server="localhost:3306";
	$user="root";
	$pwd="admin";
	$BD= "webservice";
	$conn=new mysqli($server,$user,$pwd,$BD);
	$sql = "UPDATE cliente SET cedula = '$cedula', nombre = '$nombre' WHERE id = '$id'";

	$result = $conn->query($sql);
	if($conn->query($sql)===TRUE){
		return 'Success';
	}
	else{
		return 'Error insert '.$conn->error;
	}
}

function BorrarBD($id){
	$server="localhost:3306";
	$user="root";
	$pwd="";
	$BD= "webservice";
	$conn=new mysqli($server,$user,$pwd,$BD);
	$sql="DELETE FROM cliente WHERE ID ='$id'"; 
	$result = $conn->query($sql);
	if($conn->query($sql)===TRUE){
		return 'Success';
	}
	else{
		return 'Error insert '.$conn->error;
	}
}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));

?>     