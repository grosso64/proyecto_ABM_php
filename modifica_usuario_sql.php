<?php
    // Conexion a la BDD
    include("inc/conexion.php");

    // Recupero los valores
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    $boton = $_POST['boton'];

    // Estructura
    if($boton==0){
        header("location: abm.php");
    }else{
        $modifica = "update usuario set usuario='$usuario',clave='$clave',rol='$rol' where usuario = '$usuario'";
        $resultado_modifica = mysqli_query($conexion,$modifica);    
    }
    header("location:abm.php");


?>