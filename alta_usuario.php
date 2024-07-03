<!doctype html>
<html lang="es">
   <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta de usuario</title>
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
    ?>
  </head>
  <body class="container">
    <!-- Menú de navegación -->
    <?php //menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary" role="alert">
        <h3 class="text-center fst-italic">Cargar nuevo usuario</h3>
    </div>
    <br>

    <!-- Formulario -->
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">

                    <form action="alta_usuario_sql.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Ingrese el usuario</label>
                            <input type="text" id="usuario" name="usuario" placeholder="Escriba el usuario" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="clave">Ingrese la clave</label>
                            <input type="password" id="clave" name="clave" placeholder="Escriba la clave" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="rol">Ingrese el perfil</label>
                            <input type="text" id="rol" name="rol" placeholder="Escriba el perfil" class="form-control">
                        </div> 
                        <br>
                        <button type="submit" class="btn btn-primary container-fluid">Cargar datos</button>  
                        <br>                                          
                    </form>
                    <br>
                    <div class="alert alert-warning text-center" role="alert">
                        <?php echo $mensaje; ?>
                    </div>                    

                </div>
                <div class="col-4"></div>
            </div>
        </div>
    



    <!-- JS de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>