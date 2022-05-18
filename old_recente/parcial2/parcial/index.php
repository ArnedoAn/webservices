

<?php
include('lib/nusoap.php');
$client = new nusoap_client('http://localhost/webservices/parcial2/parcial/uts_server.php?wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body id="ingresar_cliente">
        <?php
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
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <form name="fromConsultar" method="POST">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th>Cedula</th>
                                            <th>Nombres</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resulDeco = json_decode($result);
                                        foreach ($resulDeco as $registro) {
                                            ?>
                                            <tr>
                                                <?php
                                                $i = 1;
                                                for ($i = 1; $i <= 7; $i++) {
                                                    ?>

                                                    <td align="center"><br><br><?php echo $registro[$i] ?></td>

                                                    <?php
                                                }
                                                ?>
                                                <td align="center">
                                                    <img src="<?php echo $registro[8] ?>" height="100" width="100"/>
                                                </td>
                                                <td align="center">
                                                    <br><br>
                                                    <a href="uts_delete.php?id=<?php echo $registro[0] ?>"><input type="button" class="btn btn-danger" name="bot_delete" value="Eliminar Cliente" /></a>
                                                    &nbsp;
                                                    <a href="uts_update.php?
                                                       id=<?php echo $registro[0] ?>
                                                       &cedula=<?php echo $registro[1] ?>
                                                       &nombre=<?php echo $registro[2] ?>
                                                       <input type="button" class="btn btn-info" value="Editar Cliente"/></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
  ?>
                            <tr>
                                <td colspan="9" align="center"><a href="crearpersona.html"><input type="button"
                                value="Insertar Nuevo cliente" class="btn btn-primary"/></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
            </div>
            </div>
            <?php
        }
        ?>
    </body>
</html>

                                        