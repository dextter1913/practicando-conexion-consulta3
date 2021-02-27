<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practicando conexion 3 con consulta</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
    <center><h1>Practicando conexion con consultas</h1></center>

  <div class="col-md-2">.col-md-2</div>
  <div class="col-md-6">    
        <form action="index.php" method="post" class="form-inline">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" class="form-control" placeholder="Ingrese ID"><br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control"><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control"><br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion" class="form-control"><br><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="usuario" class="form-control"><br><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control"><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" class="form-control"><br><br>
        <label for="contraseña2">Contraseña:</label>
        <input type="password" name="contraseña2" id="contraseña2" placeholder="Confirme la contraseña" class="form-control"><br><br>
        <input type="submit" value="Registrar" class="btn btn-danger" name="btnregistrar">
        </form></div>
        <?php 
            if (isset($_POST['btnregistrar'])) {
                $_id = $_POST['id'];
                $_nombre = $_POST['nombre'];
                $_apellido = $_POST['apellido'];
                $_telefono = $_POST['telefono'];
                $_direccion = $_POST['direccion'];
                $_usuario = $_POST['usuario'];
                $_correo = $_POST['correo'];
                $_contraseña = $_POST['contraseña'];
                $_contraseña2 = $_POST['contraseña2'];

                if ($_contraseña === $_contraseña2) {
                    
                    include("./clases/abrirconexion.php");

                    $conexion->query("INSERT INTO $tb1(user, pass, correo)  VALUES('$_usuario','$_correo','$_contraseña')");

                    $conexion->query("INSERT INTO $tb2(id, nombre, apellido, telefono, direccion, user) 
                    VALUES('$_id','$_nombre','$_apellido','$_telefono','$_direccion','$_usuario')");

                    include("./clases/cerrarconexion.php");
                    echo "Datos ingresados con Exito";
                }else {
                    echo "las contraseñas no coinciden, intentelo de nuevo";
                }


            }
        ?>
        <div class="col-md-4">
        <form action="index.php" method="post" class="form-inline">
            <label for="id">ID:</label>
            <input type="search" name="id" id="id" placeholder="Ingrese el id a buscar" class="form-control">
            <input type="submit" value="Buscar" name="btnbuscar" class="btn btn-primary btn-lg">
            
        </form><br><br> 

            <?php 
                if (isset($_POST['btnbuscar'])) {
                    $_id = $_POST['id'];
                    include("./clases/abrirconexion.php");
                    
                    $resultado = mysqli_query($conexion, ("SELECT * FROM $tb2 WHERE id = $_id"));

                        while ($consulta = mysqli_fetch_array($resultado)) {
                            echo "
                            <table class=\"table table-striped\">
                            <tr>
                            <td><center><b>ID</b></center></td>
                            <td><center><b>Nombre</b></center></td>
                            <td><center><b>Apellido</b></center></td>
                            <td><center><b>Telefono</b></center></td>
                            <td><center><b>Direccion</b></center></td>
                            <td><center><b>Usuario</b></center></td>
                            </tr>
                            <tr>
                            <td><center><b>".$consulta['id']."</b></center></td>
                            <td><center><b>".$consulta['nombre']."</b></center></td>
                            <td><center><b>".$consulta['apellido']."</b></center></td>
                            <td><center><b>".$consulta['telefono']."</b></center></td>
                            <td><center><b>".$consulta['direccion']."</b></center></td>
                            <td><center><b>".$consulta['user']."</b></center></td>
                            </tr>
                            </table>    
                            
                            ";
                        }
                    include("./clases/cerrarconexion.php");


                }
            
            ?>

        </div>









</body>
</html>