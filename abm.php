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
    <title>ABM</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/movistar.png">
    <!-- Archivos a incluir -->
    <?php 
        include("inc/menu.php"); 
        include("inc/conexion.php");
    ?>

    <!-- Base de datos -->
    <?php
        // Creamos las querys
        $consulta1 = "select count(distinct usuario) as usuarios from usuario";
        $a = 'analista';
        $consulta2 = "select count(distinct usuario) as usuarios from usuario where rol = '$a' ";
        $consulta3 = "select count(distinct usuario) as usuarios from usuario where rol = 'administrador' ";
        $consulta4 = "select usuario,clave,rol from usuario";

        // Ejecutamos la query
        $resultado1 = mysqli_query($conexion,$consulta1);
        $resultado2 = mysqli_query($conexion,$consulta2);
        $resultado3 = mysqli_query($conexion,$consulta3);
        $resultado4 = mysqli_query($conexion,$consulta4);
        
        // Obtenemos el resultado
        while($fila=mysqli_fetch_assoc($resultado1)){
            $cantidad_de_usuarios = $fila['usuarios'];
        }
        while($fila=mysqli_fetch_assoc($resultado2)){
            $cantidad_de_analistas = $fila['usuarios'];
        }
        while($fila=mysqli_fetch_assoc($resultado3)){
            $cantidad_de_admin = $fila['usuarios'];
        }        
        

    ?>

  </head>
  <body class="container">
    <!-- Menú de navegación -->
    <?php menu(); ?>
    <!-- Título de la página -->
    <div class="alert alert-primary" role="alert">
        <h3 class="text-center fst-italic">Práctica de ABM</h3>
    </div>
    
    <!-- Fila 1 -->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-outline-primary container-fluid text-start">Cantidad usuarios: <?php echo $cantidad_de_usuarios; ?></button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-primary container-fluid text-start">Cantidad analistas: <?php echo $cantidad_de_analistas; ?></button>
            </div>
            <div class="col-3">
            <button type="button" class="btn btn-outline-primary container-fluid text-start">Cantidad administradores: <?php echo $cantidad_de_admin; ?></button>
            </div>
            <div class="col-3">
            <button type="button" class="btn btn-outline-danger container-fluid text-center"><a style="text-decoration:none" href="alta_usuario.php">Nuevo usuario</a></button>   
            </div>
        </div>
    </div>
    <br>
    <!-- Fila 2 -->
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary text-center">
                                <td>Usuario</td><td>Clave</td><td>Perfil</td><td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($columna=mysqli_fetch_array($resultado4)){
                                echo "<tr>";
                                echo "<td>".$columna['usuario']."</td>";
                                echo "<td>".$columna['clave']."</td>";
                                echo "<td>".$columna['rol']."</td>";
                                echo "<td>
                                        <a style='text-decoration:none' href='modifica_usuario.php?
                                        usuario=".$columna['usuario']."
                                        &clave=".$columna['clave']."
                                        &rol=".$columna['rol']."
                                        '>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                            </svg>
                                        </a>
                                        <a style='text-decoration:none' href='baja_usuario.php?
                                            usuario=".$columna['usuario']."
                                            &clave=".$columna['clave']."
                                            &rol=".$columna['rol']."
                                            '>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                            </svg>
                                        </a>
                                     </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>




    <!-- JS de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>