<?php



	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$fecha = $_POST['date'];
	$genero = $_POST['genero'];
	$escolaridad= $_POST['escolaridad'];
	$estado= $_POST['estado'];
	
// The data to send to the API
$postData = array('cedula' => $cedula,'nombre' =>  $nombre,'apellido' => $apellido ,'fecha_nacimiento' =>  $fecha,'genero' => $genero,'escolaridad' => $escolaridad,'estado' => $estado);

// Setup cURL
$ch = curl_init('http://localhost:81/webservices/rest-api/rest-api2.php/estudiante/');
curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST=> "POST",
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

echo $response;


// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
echo $responseData['published'];
