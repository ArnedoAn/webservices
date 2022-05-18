<?php
/*
 * tarea_client.php
 */

include('../../lib/nusoap.php');
// Crear cliente
// HTTP, protocolo(msg), protoloco
$cliente = new nusoap_client('http://localhost/webservices/parcial/Jhor/uts_server.php?wsdl','wsdl');

// Revisar los errores
$error = $cliente->getError();
if ($error) {	echo 'Error en Constructor' . $error ; }

// Definen los parametros a pasar al servicio web
$parametros = array('numero_1' => 1,'numero_2' => 2);

// Se recupera la respuesta del servidor
$resultado = $cliente->call('Metodo_Igual', $parametros); // invocacion al metodo que esta alojado en el servidor

if ($cliente->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	// Chequea errores
	$error = $cliente->getError();
	if ($error) {		// Muestra el error
		echo 'Error' . $error ;
	} else {		// Muestra el resultado
	/*if($resultado == 1){
		echo 'El numero es igual';
		}else{
			echo 'El numero no es igual';
			}*/
	}
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Web services</title>
    <style>
    #index{
		width: 43%;
		height: 350px;	
		background-color: rgba(189, 189, 189, 0.3);
		border-radius: 15px;
		box-shadow:0px 0px 20px rgba(0,0,0,0.5);
		margin:150px auto;
		padding:50px;	
		font-family: mifuente,tahoma;
		font-size: 14pt;
	}
	
	table{
        margin:20px auto;
	}
	
	body{
		margin: 0px;
		padding: 0px;
		background-image:url(background1.jpeg);
		background-repeat: repeat;
		background-size: cover;
	}
	
	#titulo_principal{
		color: blue;
		font-weight:bold;
		margin:0px;
		font-size: 25px;
	}
	
	#resultado{
		color: #C00;
		font-weight:bold;
	}
	
    </style>
  </head>
  <body>
  	<div id="index">
    	<table border="0">
        	<tbody>
            	<tr>
                	<td><img src="logo_uts.png"></td>
                    <td colspan="2" align="center"><p id="titulo_principal">Web Services de Numeros Iguales</p><br></td>
                </tr>                       
             </tbody>
        	<tr>
                <td id="resultado" colspan="2" align="center"><br><br><br>
				<?php if($resultado == 1){ ?>
					  	El numero es igual.   
				<?php		}else{ ?>
						El numero no es igual.
				<?php		} ?>				
                </td>
            </tr>
        </table>
    </div>
  </body>
</html>
