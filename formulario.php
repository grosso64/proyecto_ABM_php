<?php
    session_start();
    if(!isset($_SESSION['autorizado']) or $_SESSION['autorizado']=='no'){
        header("location: index.php");
    }
?>

<!doctype html>
<html lang="es">
   <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formularios</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/movistar.png">
    <!-- Archivos a incluir -->
    <?php include("inc/menu.php"); ?>
  </head>
  <body class="container">
    <!-- Menú de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary" role="alert">
        <h3 class="text-center fst-italic">Envío de datos al servidor</h3>
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">

            <form action="recibe_formulario.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Escriba su apellido">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Clave</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Escriba su Clave">
                </div>   
                
                <hr size="3px" color="red">
                <h6>Selecciones su lenguaje preferido</h6>

                <div class=form-group>
                    <input type="checkbox" id='l1' name='l1' value="PHP">
                    <label for="l1">Lenguaje PHP</label>
                </div>
                <div class=form-group>
                    <input type="checkbox" id='l2' name='l2' value="JAVA">
                    <label for="l2">Lenguaje Java</label>
                </div>
                <div class=form-group>
                    <input type="checkbox" id='l3' name='l3' value="PYTHON">
                    <label for="l3">Lenguaje Python</label>
                </div>  
                
                <hr size="3px" color="red">

                <fieldset>
                    <legend>Seleccione su nivel de inglés.</legend>
                </fieldset>
                <div class="form-group">
                    <label>
                        <input type="radio" name="nivel" value="Alto">Alto
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="radio" name="nivel" value="Medio">Medio
                    </label>
                </div> 
                <div class="form-group">
                    <label>
                        <input type="radio" name="nivel" value="Bajo">Bajo
                    </label>
                </div>                                

                <hr size="3px" color="blue">
                <div class="form-group">
                    <label for="selector1">Seleccione su motivo de contacto</label>
                    <select name="selector1" id="selector1">
                        <option value="consulta">Consulta</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="queja">Queja</option>
                    </select>
                </div> 

                <br><br><br>
                <button type="submit" class="btn btn-primary container-fluid">Enviar</button>
            </form>

            </div>
            <div class="col-4"></div>
        </div>
    </div>

    



    <!-- JS de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>