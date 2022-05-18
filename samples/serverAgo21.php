<?php
/*
 * generic_server.php
 */
include('../lib/nusoap.php');//se incluye la libreria nusoap
$server = new soap_server();// se crea el objeto servidor
$server->configureWSDL('Servidor', 'urn:Servidor');//se configura el nombre con el que voy a interactuar en el wsdl.
$server->register('Sumar',//1 Nombre del metodo que ofrece el servidor
    array('numero1' => 'xsd:int','numero2' => 'xsd:int'),//2 Parametros necesarios para ejeutar el metodo en forma de array
    array('suma' => 'xsd:int'),//3 Retorno del metodo
    'urn:Sumarwsdl',//4 descripcion formal metodo wsdl
    'urn:Sumarwsdl#Sumar',//5 como se llama el metodo al anterior servidor
    'rpc',//tipo de invocacion, la interaccion del cliente y el servidor
    'encoded',//como viaja la informacion
    'Retorna la suma entre dos números'//descripcion textual del servicio web que ofrece el servidor.
);
$server->register('Concatenar',//1 Nombre del metodo que ofrece el servidor
    array('cadena1' => 'xsd:String','cadena2' => 'xsd:String'),//2 Parametros necesarios para ejeutar el metodo en forma de array
    array('concatenacion' => 'xsd:String'),//3 Retorno del metodo
    'urn:Concatenarwsdl',//4 descripcion formal metodo wsdl
    'urn:Concatenarwsdl#Concatenar',//5 como se llama el metodo al anterior servidor
    'rpc',//tipo de invocacion, la interaccion del cliente y el servidor
    'encoded',//como viaja la informacion
    'Retorna la concatenación de dos cadenas de caracteres'//descripcion textual del servicio web que ofrece el servidor.
);

$server->register('Dividir',//1 Nombre del metodo que ofrece el servidor
    array('numero1' => 'xsd:int','numero2' => 'xsd:int'),//2 Parametros necesarios para ejeutar el metodo en forma de array
    array('division' => 'xsd:String'),//3 Retorno del metodo
    'urn:Dividirwsdl',//4 descripcion formal metodo wsdl
    'urn:Dividirwsdl#Dividir',//5 como se llama el metodo al anterior servidor
    'rpc',//tipo de invocacion, la interaccion del cliente y el servidor
    'encoded',//como viaja la informacion
    'Retorna la división entera de dos numeros enteros'//descripcion textual del servicio web que ofrece el servidor.
);

//xsd definicion de esquema xml pero se utiliza dentro de wsdl para especificar los datos de los mensajes
function Sumar($numero1,$numero2) {
	// Devolvemos los parametros
        return $numero1 + $numero2;
}
function Concatenar($cadena1,$cadena2) {
	// Devolvemos los parametros
        return $cadena1 . $cadena2;
}
function Dividir($numero1,$numero2) {
	// Devolvemos los parametros
        if ($numero2==0){
            return 'error división por cero';
        }
        else{
            $division = $numero1 / $numero2; 
            return (string)$division;
        }
}

$rawPortData= file_get_contents("php://input");
$server->service($rawPortData);
?>