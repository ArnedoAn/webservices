<?php



	/*$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$fecha = $_POST['date'];
	$genero = $_POST['genero'];
	$escolaridad= $_POST['escolaridad'];
	$estado= $_POST['estado'];*/
	
// The data to send to the API
$postData = array('cedula' => '9789797');

// Setup cURL
$ch = curl_init('http://localhost/webservices/rest-api/rest-api2.php/estudiante/');
curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST=> "GET",
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POSTFIELDS => json_encode($postData)
))
;

// Send the request
$response = curl_exec($ch);

//echo var_dump(json_decode($response));
$arreglo = json_decode($response); // descodificar
if(!isset($key)){

                    echo '<table id="registros" border=1 style="font-size: 12pt;">';

                    echo '<tr><th> ID </th><th> CEDULA </th><th> NOMBRE </th><th> APELLIDO </th><th> FECHA NACIMIENTO </th><th> GENERO </th><th> ESCOLARIDAD </th><th> ESTADO </th></tr> ';
                    echo '<tr>';
                    foreach ($arreglo as $key => $datos) {
                        
                        echo '<td>'.$datos->ID.'</td>';
                        echo '<td>'.$datos->CEDULA.'</td>';
                        echo '<td>'.$datos->NOMBRE.'</td>';
                        echo '<td>'.$datos->APELLIDO.'</td>';
                        echo '<td>'.$datos->FECHA_NACIMIENTO.'</td>';
                        echo '<td>'.$datos->GENERO.'</td>';
                        echo '<td>'.$datos->ESCOLARIDAD.'</td>';
                        echo '<td>'.$datos->ESTADO.'</td>';

                        echo '<td> <a  name="1" title="'.$datos->ID.'" href="index.php" >ELIMINAR</a></td>';
                        echo '<td> <a  href="editar.php?key='.$key.'">EDITAR </a> </td>';
                        echo '</tr>'; 

                    }
                    echo '<tr><td colspan="11" align="center"><input type="submit" id="cerrar" value="cerrar"></td></tr>';
                    echo '</table>';

                     }else{

                    foreach($arreglo as $key => $datos){
                        $_SESSION['estudiantes'][$key]=$datos;
                    }
                }

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
//echo $responseData['published'];

?>

<script type="text/javascript">
    
    $('#cerrar').bind('click', function(e){
      
      $('#registros').hide(1000);
      $('#cerrar').hide(1000);

  })

    $('a').bind('click', function(e){
                   if($(this).attr('name')==1){
                   var id = $(this).attr('title');

                    $.ajax({
                        url: 'eliminar.php',
                        data: ('id='+id),
                        type: 'post',
                        complete : function(respuesta) {
                            alert('ELIMINACION EXITOSAMENTE');
                            
                        }

                    });
                    
                }
         
   })

                
                



</script>