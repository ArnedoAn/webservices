<?php

  if(!isset($_POST["boton_actualizar"])){

    $id = $_GET["id"];
    $cedula = $_GET["cedula"];
    $nombre = $_GET["nombre"];

  }else{
    
    $id2 = $_POST['id'];
    $cedula2 = $_POST['cedula'];
    $nombre2 = $_POST['nombre'];
   
    #Creación del cliente

    include('../lib/nusoap.php');
    $client = new nusoap_client('http://localhost/webservices/parcial/uts_server.php?wsdl', 'wsdl');
    $err = $client->getError();
    if ($err) {
      echo 'Error en Constructor' . $err;
    }

    #formacion de parámetro
    $param = array('id' => $id2, 'cedula'=>$cedula2, 'nombre'=>$nombre2,);
    #Llamado al metodo en server
    $result = $client->call('ActualizarBD', $param);

    if ($client->fault) {

      echo 'Fallo la creación del cliente';
      print_r($result);

    } else {

      $err = $client->getError();

      if ($err) {
        echo 'Error' . $err ;

      } else {
        print_r ($result);

      }
    }
  }

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Actualizar Datos</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
  <br><br>
  <h1 align="center"><span class="label label-success">Actualizar Registro</span></h1>

  <div class="container">
    <br><br><br>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" id="formulario">
          <fieldset>
              <legend align="center"><h2><span class="label label-info">Datos Personales</span></h2></legend>

                <div class="form-group">
                    <input name="id" id="id" class="form-control" value="<?php echo $id ?>" type="hidden"/>
                </div>

                <div class="form-group">
                    <label for="cedula" class="control-label col-md-4">Cedula: </label>
                    <div class="col-md-5">
                        <input name="cedula" id="cedula" class="form-control" value="<?php echo (int)$cedula ?>" type="number" placeholder="Ingrese su cedula"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="control-label col-md-4">Nombre: </label>
                    <div class="col-md-5">
                        <input name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" type="text" placeholder="Ingrese su nombre"/>
                    </div>
                </div>
                <div align="center">

                    <input type="submit" value="Enviar" class="btn btn-warning"  name="boton_actualizar" id="boton_actualizar">

                </div>

            </fieldset>
            <hr>  
        </form>
    </div>
</body>
</html>


