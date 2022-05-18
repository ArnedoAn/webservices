<?php
/*
 * uts_server.php
 */

include('../lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('InsertarBD',
    array('param' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#InsertarBD',
    'rpc',
    'encoded',
    'Retorna Estado Conexion'
);


$server->register('LeerBD',
    array('param' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#LeerBD',
    'rpc',
    'encoded',
    'Retorna Estado Conexion'
);




function ConsultarBD($param) {
	// Devolvemos consultar
	
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    	return "Connection failed: " . $conn->connect_error;
	} 
    return "Connected successfully";
}

function InsertarBD($param) {
	// Devolvemos consultar
	
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	$database = "webservice";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);

	//Check connection
	if ($conn->connect_error) {
    	return "Connection failed: " . $conn->connect_error;
	} 
	
	$sql = "insert into test (var) values ('".$param."')";
    if ($conn->query($sql) === TRUE) {
    	return "New record created successfully";
	} else {
    	return "Error: " . $sql . "<br>" . $conn->error;
	}
}


function LeerBD($param) {
	// Devolvemos consultar
	
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	$database = "webservice";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);

	//Check connection
	if ($conn->connect_error) {
    	return "Connection failed: " . $conn->connect_error;
	} 
	
	$sql = " select * from test ";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
	return json_encode($result->fetch_all());
	
    //while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    //}
} else {
   return "0 results";
}
}





$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>
