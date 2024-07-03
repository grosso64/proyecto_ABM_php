<?php
  session_start();

  if(!isset($_SESSION['autorizado'])){
    $_SESSION['autorizado']='no';
  }
  echo $_SESSION['autorizado'];
?>



<!doctype html>
<html lang="es">
   <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/movistar.png">
    <!-- Archivos a incluir -->
    <?php 
      include("inc/menu.php"); 

      $mensaje = "Ingrese los nuevos datos";
      if(isset($_GET['mensaje'])){
          if($_GET['mensaje']=='uno'){$mensaje="El usuario ya existe en la base";}
          if($_GET['mensaje']=='dos'){$mensaje="Datos de ingreso incorrectos";}
      }      

    ?>
  </head>
  <body class="container">
    <!-- Menú de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary" role="alert">
        <h3 class="text-center fst-italic">Ingreso a la aplicación</h3>
    </div>

    <!-- Formulario de ingreso -->
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <?php
            if($_SESSION['autorizado']=='no'){ ?>
              
              <br>
              <legend>Formulario de ingreso</legend>
              <form action="login.php" method="post">
                <div class="form-group">
                  <label for="user">Ingreso su usuario</label>
                  <input type="text" id="user" name="user" class="form-control" placeholder="Escriba su usuario">
                </div>
                <br>  
                <div class="form-group">
                  <label for="pass">Ingreso su clave</label>
                  <input type="password" id="pass" name="pass" class="form-control" placeholder="Escriba su contraseña">
                </div>   
                <br>
                <button class="btn btn-success container-fluid">Ingresar</button>             
              </form>
              <br>
              <div class="row">
                <div class="col-6 text-center"><a href="registro.php" style="text-decoration:none"><h5>Registrarse</h5></a></div>
                <div class="col-6 text-center"><a href="#" style="text-decoration:none"><h5>Olvidé la clave</h5></a></div>
              </div>
              <br>
              <div class="alert alert-warning text-center" role="alert">
                <?php echo $mensaje; ?>
              </div>              
                    
          <?php      
            }else echo "Bienvenido a la aplicación";
          ?>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
    

    



    <!-- JS de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>