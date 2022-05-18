<?php

//Creacion del cliente
include('lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial2/parcial/uts_server.php?wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}

//Llamado al metodo
$param = array('param' => 'null');
$result = $client->call('LeerBD', $param);

if ($client->fault) {
    echo 'Fallo';
    print_r($result);
} else {
    $err = $client->getError();
    if ($err) {
        echo 'Error' . $err;
    } else {

        $resulDeco = json_decode($result);

        foreach ($resulDeco as $registro) {
            for ($i = 1; $i < 8; $i++) {
                
                echo $registro[$i];
                
            }
        }
    }
}
?>


