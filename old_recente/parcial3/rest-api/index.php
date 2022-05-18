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

        <div id="index" align="center"> 
                
                <table  align="center">
                    <tr>
                        <td colspan="3"><h1>REGISTRO ESTUDIANTE</h1> </td>
                        <td ><img src="logo_uts.png" style="width: 150px;"></td>
                    </tr>
                    <tr>
                        <th> CEDULA:</th>
                        <td><input type="text" id="cedula" name="cedula"></td>
                        <!--<td rowspan="6"><div id="webcam"></div></td>
                        <td ><div id="foto" title="" style="width: 160px; height: 120px;">

                        </div></td>-->
                    </tr>
                    <tr>
                        <th> NOMBRE:</th>
                        <td><input type="text" id="nombre" name="nombre"></td>
                    </tr>
                    <tr>
                        <th> APELLIDO:</th>
                        <td><input type="text" id="apellido" name="apellido"></td>
                    </tr>
                    <tr>
                        <th> FECHA DE NACIMIENTO:</th>
                        <td><input type="date" id="fecha" name="date"></td>
                    </tr>
                    <tr>
                        <th> GENERO:</th>
                        <td>
                        <select id="genero" name="genero" >
                            <option>---seleccione una opcion---</option>
                            <option value="masculino">MASCULINO</option>
                            <option value="femenino">FEMENINO</option>
                        </select>
                        </td>

                    </tr>
                    <tr>
                        <th> ESCOLARIDAD:</th>
                        <td>
                        <select id="escolaridad" name="escolaridad" required="">
                            <option>---seleccione una opcion---</option>
                            <option value="primaria">PRIMARIA</option>
                            <option value="secundaria">SECUNDARIA</option>
                            <option value="universitario">UNIVERSITARIO</option>
                            <option value="postgrado">POSTGRADO</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th> ESTADO CIVIL:</th>
                        <td>
                        <select id="estado" name="estado" required="">
                            <option>---seleccione una opcion---</option>
                            <option value="soltero">SOLTERO</option>
                            <option value="casado">CASADO</option>
                            <option value="divorciado">DIVORCIADO</option>
                            <option value="union libre">UNION LIBRE</option>
                        </select>
                        </td>
                       <!-- <td align="center"><input type="submit" id="tomar" value="TOMAR_FOTO"></td> -->
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input type="submit" id="subir" value="REGISTRAR"></td>



                </table>
               

                <p>DESEA VER TODOS LOS REGISTROS? </p><input type="submit" id="mostrar" value="mostrar"></td>
                <div id="mostrar_tabla"> </div>
                <h1>Hecho por: Jaime Enciso - Withman Jinete Polo - Heiler Amaya </h1>
        </div>
        <script type="text/javascript">
            
              $('#mostrar').bind('click', function(e){

                   $.ajax({
                        url: 'mostrar.php',
                        type: 'post',
                        success: function(respuesta){

                            $('#mostrar_tabla').html(respuesta);
                            
                          }
                        
                    });
                })
                $('#subir').bind('click', function(e){


                   if($("#cedula").val() === '' || $("#nombre").val() === '' || $("#apellido").val() === '' || $("#fecha").val() ==='' || $("#genero").val() ==='---seleccione una opcion---' || $("#escolaridad").val() ==='---seleccione una opcion---' || $("#estado").val() ==='---seleccione una opcion---' ){
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
 
                       $.ajax({
                            url: 'insert.php',
                            data: ('cedula='+cedula+'&nombre='+nombre+'&apellido='+apellido+'&date='+date+'&genero='+genero+'&escolaridad='+escolaridad+'&estado='+estado),
                            type: 'post',
                            complete : function(respuesta) {

                            alert('REGISTRADO EXITOSAMENTE');
                            $('#mostrar').click(); 
                            
                        } 
             
                        });    

                             
                   }
                }) 


        </script>
    </body>
</html>
