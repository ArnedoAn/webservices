<?php


include('../../lib/nusoap.php');

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('Metodo',
    array('num_1' => 'xsd:int','num_2' => 'xsd:int'),
    array('return' => 'xsd:String'),
    'urn:Metodowsdl',
    'urn:Metodowsdl#Metodo',
    'rpc',
    'encoded',
    'Retorna si el numero es igual o diferente '
);

function Metodo($num_1,$num_2) {  
                            
	if ($num_1 == $num_2){

              return "son iguales";
 }else {     
          return "son diferentes"; 
  }                 

}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$rawPostData=file_get_contents("php://input");
$server->service($rawPostData);

?>
