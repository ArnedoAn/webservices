<?php
/*
 * generic_server.php
 */
include('../../lib/nusoap.php');//se incluye la libreria nusoap
$server = new soap_server();// se crea el objeto servidor
$server->configureWSDL('Servidor', 'urn:Servidor');//se configura el nombre con el que voy a interactuar en el wsdl.

$server->register('Metodo',//1 Nombre del metodo que ofrece el servidor
    array('numero1' => 'xsd:int','numero2' => 'xsd:int'),//2 Parametros necesarios para ejeutar el metodo en forma de array
    array('mayor_menor' => 'xsd:String'),//3 Retorno del metodo
    'urn:Metodowsdl',//4 descripcion formal metodo wsdl
    'urn:Metodowsdl#Metodo',//5 como se llama el metodo al anterior servidor
    'rpc',//tipo de invocacion, la interaccion del cliente y el servidor
    'encoded',//como viaja la informacion
    'Retorna el Numero Mayor'//descripcion textual del servicio web que ofrece el servidor.
);

$server->register('Metodo2',//1 Nombre del metodo que ofrece el servidor
    array('numero1' => 'xsd:int','numero2' => 'xsd:int'),//2 Parametros necesarios para ejeutar el metodo en forma de array
    array('mayor_menor' => 'xsd:String'),//3 Retorno del metodo
    'urn:Metodowsdl',//4 descripcion formal metodo wsdl
    'urn:Metodowsdl#Metodo2',//5 como se llama el metodo al anterior servidor
    'rpc',//tipo de invocacion, la interaccion del cliente y el servidor
    'encoded',//como viaja la informacion
    'Retorna el Numero Mayor'//descripcion textual del servicio web que ofrece el servidor.
);





//xsd definicion de esquema xml pero se utiliza dentro de wsdl para especificar los datos de los mensajes

function Metodo($numero1,$numero2) {
	// Devolvemos los parametros
    if($numero1>$numero2){
        return $numero1;
    }
	return $numero2;
    //metodo va a ser el corazon del servicio
    //incluye BD, internet, procedimiento local, lectura del archivo.

}

function Metodo2($numero1,$numero2) {
	// Devolvemos los parametros
    if($numero1>$numero2){
        return $numero1;
    }
	return $numero2;
    //metodo va a ser el corazon del servicio
    //incluye BD, internet, procedimiento local, lectura del archivo.

}

//finalmente manejo de la peticion cliente segun la instalacion PHP.
//forma 1 version 5 y 6

//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
//
//forma 2 version 7
$rawPortData= file_get_contents("php://input");
$server->service($rawPortData);
?>