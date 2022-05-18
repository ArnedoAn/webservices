<?php

include('../lib/nusoap.php');
//require 'lib2/simple_html_dom.php';

$server = new soap_server();
$server->configureWSDL('Servidor', 'urn:Servidor');


$server->register('ObtenerValor',
    array('moneda_origen' => 'xsd:String'),
    array('return' => 'xsd:String'),
    'urn:ObtenerValor',
    'urn:ObtenerValor#ObtenerValor',
    'rpc',
    'encoded',
    'Retorna el valor de la divisa seleccionada'
);


function ObtenerValor($moneda_origen) {

	if($moneda_origen=="exito"){

            
            $data = file_get_contents("http://dataifx.com/acciones/EXITO");
 
         IF( preg_match('|<div class="dataifx-detailStock-description-price-text">Precio</div>\s+<div class="dataifx-detailStock-description-price-value">(.*?)</div>| is' , $data , $cap ) ){
          return $cap[1];
	}
	}
	if($moneda_origen=="ecopetrol"){


         
         $data = file_get_contents("http://dataifx.com/acciones/ECOPETROL");
 
         IF( preg_match('|<div class="dataifx-detailStock-description-price-text">Precio</div>\s+<div class="dataifx-detailStock-description-price-value">(.*?)</div>| is' , $data , $cap ) ){
          return $cap[1];
	}
}


         }


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));

?> 
