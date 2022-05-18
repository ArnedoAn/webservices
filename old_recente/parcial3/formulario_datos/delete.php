<?php
// The data to send to the API



// Setup cURL
$ch = curl_init('http://localhost:80/webservices/formulario_datos2/rest-api.php/datos/');
curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_FOLLOWLOCATION => 1, 
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => 1
    
));

// Send the request
echo "delete form";



