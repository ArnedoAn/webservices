<?php

include('../lib/nusoap.php');//incluir la libreria
$client = new nusoap_client('http://localhost/webservices/db/serverAgo28.php?wsdl','wsdl');//se crea el objeto cliente y le paso como parametros la 'url?wsdl','wsdl'
$err = $client->getError();//me permite determinar los errores que se generan.

$client->soap_defencoding = 'utf-8'; 
$client->encode_utf8 = false;
$client->decode_utf8 = false;

if ($err) {	echo 'Error en Constructor' . $err ; }

$param = array('cadena' => "none");//parametros de lo que defino en la funcion del metodo de generic_server.php
$result = $client->call('Read', $param);//me permite mostrar el resultado del metodo y sus parametros
if ($client->fault) {
  echo 'fault';
  print_r($result);
} else {	// Chequea errores
  $err = $client->getError();
  if ($err) {		// Muestra el error
    echo 'Error' . $err ;
  } else {		// Muestra el resultado
    // print_r ($result);
    $resultado=explode("\n",$result);
    echo "\n";
    echo "<div align=\"center\">\n";
    echo "<table border=2>\n";
    echo "<tr BGCOLOR=\"#D3D3D3\">\n";
    echo "<td>Id</td>\n";
    echo "<td>Datum</td>\n";
    echo "<td colspan=\"2\">Acción</td>\n";
    echo "</tr>";
    foreach($resultado as $x){
      $row = explode(" ", $x);
      //echo $row[0]." ".$row[1]."<br>";
      error_reporting(0);

            
      echo "<td>".$row[0]."</td>\n<td>".$row[1]."</td><td><a href=\"Update.php?id=".$row[0]."\">Update </td>\n";
      echo "</tr>\n";
         
    }
    echo "</table>\n";
    echo "</div>\n";
    echo "<br><br>";
    echo "<center><a href=\"menu.html\">Menu</a></center>";
    echo "</body>\n";
    echo "</html>\n";
      //echo $x."<br>";
    
  
  /*echo "<html>\n";
  echo "\t<head>\n";
  echo "\t\t<title>Listar Datos</title>\n";
  echo "\t\t<meta http-equiv= \"refresh\" content=\"5\" />\n";
  echo "\t\t<meta charset=\"UTF-8\"/>\n";
  echo "\t</head>\n";
  echo "\t<body>\n";
  
  */
}
}

?>