<?php



	$id = $_POST['id'];


	
// The data to send to the API
$postData = array('id' => 1);

// Setup cURL
$ch = curl_init('http://localhost:81/webservices/rest-api/rest-api2.php/estudiante/'.$id.'/');
curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST=>'DELETE',
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