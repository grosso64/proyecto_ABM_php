<!doctype html>
<html lang="es">
   <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifica usuario</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/movistar.png">
    <!-- Archivos a incluir -->
    <?php 
        //include("inc/menu.php"); 
        include("inc/conexion.php");

        $mensaje = "Ingrese los nuevos datos";
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=='uno'){$mensaje="El usuario ya existe en la base";}
        }

        // Recupero los datos para el formulario
        $usuario = $_GET['usuario'];
        $clave = $_GET['clave'];
        $rol = $_GET['rol'];

    ?>
  </head>
  <body class="container">
    <!-- Menú de navegación -->
    <?php //menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary" role="alert">
        <h3 class="text-center fst-italic">Modificar usuario</h3>
    </div>
    <br>

    <!-- Formulario -->
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">

                    <form action="modifica_usuario_sql.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" readonly id="usuario" name="usuario" value="<?php echo $usuario; ?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" id="clave" name="clave" value="<?php echo $clave; ?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="rol">Perfil</label>
                            <input type="text" id="rol" name="rol"  value="<?php echo $rol; ?>" class="form-control">
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary container-fluid" name='boton' value=1>Modificar</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-danger container-fluid" name='boton' value=0>Cancelar</button>
                            </div>
                        </div>   
                        <br>                                          
                    </form>
                    <br>
                   

                </div>
                <div class="col-4"></div>
            </div>
        </div>
    



    <!-- JS de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>