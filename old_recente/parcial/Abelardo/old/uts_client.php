<?php

	include('../../lib/nusoap.php');
	$client = new nusoap_client('http://localhost/webservices/parcial/Abelardo/uts_server.php?wsdl','wsdl');


	$err = $client->getError();
	if ($err) {	echo 'Error en Constructor' . $err ; }

	
	$param = array('num_1' =>  '2', 'num_2' => '5');
	$result = $client->call('Mayor', $param);


	if ($client->fault) {
		echo 'Fallo';
		print_r($result);

	} else {	// Chequea errores

		$err = $client->getError();
		if ($err) {		// Muestra el error
			echo 'Error' . $err ;

		} else {		// Muestra el resultado
            $num_1='2';
            $num_2='5';
            if($num_1<$num_2){
                echo 'El numero '.$num_1;
            }if($num_2<$num_1){
                echo 'El numero '.$num_2;
            }
                
            }   
                    
            
                    print_r($result);
		}
	

?>

