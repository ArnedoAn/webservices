<?php
/*
 * uts_tarea_server.php
 */

include('../../lib/nusoap.php');

// Estamos creando nuestro servidor
$server = new soap_server();

// configuracion del servidor
// urn = nombre con el que voy a interactuar 
$server->configureWSDL('NumeroMayor', 'urn:NumeroMayor');  

// xsd = XML SHEMA DEFINITION
// 1. Nombre del metodo que ofrece el servidor
// 2. Parametros necesarios para ejecutar el metodo
// 3. Retorno del metodo "return" => "xsd:string"
// 4. Descripcion formal metodo WSDL
// 5. Como se llama el metodo al interior del servidor 
// 6. Tipo de invocacion
// 7. Como viaja la informacion
// 8. Descripcion textual 

$server->register('NumeroMayor',
    array('numero1' => 'xsd:integer','numero2' => 'xsd:integer'),
    array('return' => 'xsd:string'),
    'urn:NumeroMayorwsdl',
    'urn:NumeroMayorwsdl#NumeroMayor',
    'rpc',
    'encoded',
    'Retorna Datos del numero mayor'
);

function NumeroMayor($numero1,$numero2) {
	// Devolvemos los parametros
	if ( $numero1 > $numero2){
        return "el numero " . $numero1 . " es mayor que " . $numero2;
    }else {
        return "el numero " . $numero2 . " es mayor que " . $numero1;
    }
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));


?>
