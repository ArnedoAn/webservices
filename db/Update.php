<?php 

include('../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/db/serverAgo28.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'
$err = $client->getError();//me permite determinar los errores que se generan.

$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;

$cad1 = $_GET["id"];
$id="";
$datum="";

if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('cadena' => $cad1);//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Read', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
	echo 'fault';
	print_r($result);
} else {	// Chequea errores
	$err = $client->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'Actualización del registro';
		$row = explode(" ", $result);
		echo $row[0]."\t".$row[1]."\n";
		$id=$row[0];
		$datum=$row[1];
		
	}
}

echo "<html>";
echo "<body>";
echo "<form action=\"clientAgo28.php\" method=\"POST\">";
echo  "<fieldset>";
echo  "<legend>Informacion del usuario:</legend>";
echo "<input type=\"hidden\" name=\"cad1\" value=\"$cad1\">";
echo "<input type=\"hidden\" name=\"opc\" value=\"3\">";
echo "<br>";
echo "Datum:<br>";
echo "<input type=\"text\" name=\"cad2\" value=\"$datum\">";
echo "<br><br>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</fieldset>";
echo "</form>";
echo "</body>";
echo "</html>";

?>