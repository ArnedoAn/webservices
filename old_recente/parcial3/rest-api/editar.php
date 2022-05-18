<?php


$key = $_GET['key'];
require_once ('mostrar.php');
$key = $_GET['key'];
$cedula = $_SESSION['estudiantes'][$key]->CEDULA;
$nombre = $_SESSION['estudiantes'][$key]->NOMBRE;
$apellido = $_SESSION['estudiantes'][$key]->APELLIDO;
$fecha = $_SESSION['estudiantes'][$key]->FECHA_NACIMIENTO;
$genero = $_SESSION['estudiantes'][$key]->GENERO;
$escolaridad = $_SESSION['estudiantes'][$key]->ESCOLARIDAD;
$estado = $_SESSION['estudiantes'][$key]->ESTADO;


$id = $_SESSION['estudiantes'][$key]->ID;
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TRABAJO :) </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="flow.css" type="text/css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script src="/say-cheese.js"></script>
        
    </head>
    <body>

    
        <div id="index">           
            <h1>MODIFICAR REGISTRO</h1>
                <table >
                    <tr>
                        <td colspan="3"><h1>REGISTRO ESTUDIANTE</h1> </td>
                        <td ><img src="logo_uts.png" style="width: 150px;"></td>
                    </tr>
                    <tr>
                        <th> CEDULA:</th>
                        <td><input type="text" id="cedula" value="<?php echo $cedula; ?>"></td>

                    </tr>
                    <tr>
                        <th> NOMBRE:</th>
                        <td><input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"></td>
                    </tr>
                    <tr>
                        <th> APELLIDO:</th>
                        <td><input type="text" id="apellido" name="apellido"  value="<?php echo $apellido; ?>"></td>
                    </tr>
                    <tr>
                        <th> FECHA DE NACIMIENTO:</th>
                        <td><input type="date" id="fecha" name="fecha"  value="<?php echo $fecha; ?>" ></td>
                    </tr>
                    <tr>
                        <th> GENERO:</th>
                        <td>
                        <select id="genero">
                            <option>---seleccione una opcion---</option>
                            <option value="masculino" <?php if($genero=='masculino'){ echo 'selected';} ?> >MASCULINO</option>
                            <option value="femenino" <?php if($genero=='femenino'){ echo 'selected';} ?> >FEMENINO</option>
                        </select>
                        </td>

                    </tr>
                    <tr>
                        <th> ESCOLARIDAD:</th>
                        <td>
                        <select id="escolaridad">
                            <option>---seleccione una opcion---</option>
                            <option value="primaria"  <?php if($escolaridad=='primaria'){ echo 'selected';} ?> >PRIMARIA</option>
                            <option value="secundaria"  <?php if($escolaridad=='secundaria'){ echo 'selected';} ?> >SECUNDARIA</option>
                            <option value="universitario" <?php if($escolaridad=='universitario'){ echo 'selected';} ?> >UNIVERSITARIO</option>
                            <option value="postgrado" <?php if($escolaridad=='postgrado'){ echo 'selected';} ?> >POSTGRADO</option>                            
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th> ESTADO CIVIL:</th>
                        <td>
                        <select id="estado">
                            <option>---seleccione una opcion---</option>
                            <option value="soltero"  <?php if($estado=='soltero'){ echo 'selected';} ?> >SOLTERO</option>
                            <option value="casado"  <?php if($estado=='casado'){ echo 'selected';} ?> >CASADO</option>
                            <option value="divorciado" <?php if($estado=='divorciado'){ echo 'selected';} ?> >DIVORCIADO</option>
                            <option value="union libre" <?php if($estado=='union libre'){ echo 'selected';} ?> >UNION LIBRE</option>
                        </select>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input type="submit" id="subir" value="guardar"></td>
                    </tr>
                   <!--<tr>
                        <td colspan="2" align="center"><p>DESEA VER TODOS LOS REGISTROS? </p><input type="submit" id="mostrar" value="mostrar"></td>
                    </tr> -->

                </table>
                <a href="index.php">VOLVER</a>
             </div>

            <script type="text/javascript">

                $('#subir').bind('click', function(e){

                   if($("#cedula").val() === '' || $("#nombre").val() === '' || $("#apellido").val() === '' || $("#fecha").val() ==='' || $("#genero").val() ==='' || $("#escolaridad").val() ==='' || $("#estado").val() ==='' ){
                  //alert();
                            alert('CAMPOS VACIOS VERIFICAR');
                   }else{
                   var cedula = $("#cedula").val();                    
                   var nombre = $("#nombre").val();
                   var apellido = $("#apellido").val();
                   var date = $("#fecha").val();
                   var genero = $("#genero").val();
                   var escolaridad = $("#escolaridad").val();
                   var estado = $("#estado").val();
                   var id = '<?php echo $id; ?>';

         
                       $.ajax({
                            url: 'editar_proceso.php',
                            data: ('cedula='+cedula+'&nombre='+nombre+'&apellido='+apellido+'&date='+date+'&genero='+genero+'&escolaridad='+escolaridad+'&estado='+estado+'&id='+id),
                            type: 'post',
                            success: function(respuesta){
                                //$('#mostrar_intro').html(respuesta).show(1000);
                                //$('#mostrar_intro').html(respuesta).hide(3000);

                                window.location="index.php";
                                alert('MODIFICADO  EXITOSAMENTE');
                            }
                        });                    
                   }


                }) 


                
            </script>


    </body>
</html>
