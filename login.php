<?php
    // Agrego la conexion
    include("inc/conexion.php");

    // Recupero los valores del formulario
    $usuario = filter_var($_POST['user'],FILTER_SANITIZE_STRING);
    $clave = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
        // Verificamos si el usuario ya existe
        $consulta1 = "select count(usuario) as nuevo from users where usuario='$usuario' ";
        $resultado1 = mysqli_query($conexion,$consulta1);
    
        while($a=mysqli_fetch_assoc($resultado1)){
            $existe = $a['nuevo'];
        }
    // Estructura de decisión
    if($existe==0){
        // No existe el usuario en la BDD
        header("location: index.php?mensaje=dos");
    }else{
        // Si el usuario existe, recupero la clave
        $consulta_clave_bdd = "select clave from users where usuario = '$usuario'";
        $resultado_clave_bdd = mysqli_query($conexion,$consulta_clave_bdd);
        while($a=mysqli_fetch_assoc($resultado_clave_bdd)){
            $clave_bdd = $a['clave'];
        } 
        }        


    // Verifico si la clave es correcta
    if(password_verify($clave,$clave_bdd)){
        // Clave correcta, recupero los datos necesarios
        $consulta_datos = "select usuario,nombre,apellido,rol from users where usuario= '$usuario'";
        $resultado_consulta_datos = mysqli_query($conexion,$consulta_datos);
        echo "clave correcta";
        while($b = mysqli_fetch_array($resultado_consulta_datos)){
            $_SESSION['usuario']=$b['usuario'];
            $_SESSION['nombre']=$b['nombre'];
            $_SESSION['apellido']=$b['apellido'];
            $_SESSION['rol']=$b['rol'];
            $_SESSION['autorizado']='si';
        }
        header("location:index.php");
    }else{
        // Clave incorrecta
        header("location: index.php?mensaje=dos");
    }







?>