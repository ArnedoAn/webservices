<?php
// The data to send to the API
$tipo_iden = $_POST['tipo_iden'];
$numero = $_POST['numero'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$date = $_POST['date'];
$sexo = $_POST['sexo'];
$esco = $_POST['esco'];
$estado = $_POST['estado'];

$postData = array('tipo_iden' => $tipo_iden, 'numero' => $numero, 'nombre' => $nombre, 'apellido' => $apellido, 'date' => $date, 'sexo' => $sexo, 'esco' => $esco, 'estado' => $estado);

// Setup cURL
$ch = curl_init('http://localhost/webservices/parcial3/formulario_datos/rest-api.php/datos/');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
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