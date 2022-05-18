<?php
/*
 * tarea_server.php
 */

include('../../lib/nusoap.php');

// Estamos creando nuestro servidor
$server = new soap_server();

// configuracion del servidor 
$server->configureWSDL('Numeros Iguales', 'urn:Numeros_Iguales');  

$server->register('Metodo_Igual',
    array('numero_1' => 'xsd:integer','numero_2' => 'xsd:integer'),
    array('return' => 'xsd:boolean'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Metodo_Igual',
    'rpc',
    'encoded',
    'ws retorna si un numero es igual o no'
);

function Metodo_Igual($numero_1,$numero_2) {
	// Devolvemos los parametros
	if($numero_1 == $numero_2){
        return true;
    }
    else {
        return false;
    }
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
?>
