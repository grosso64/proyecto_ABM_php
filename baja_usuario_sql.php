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
        $baja = "delete from usuario where usuario='$usuario'";
        $resultado_baja = mysqli_query($conexion,$baja);    
    }
    header("location:abm.php");


?>