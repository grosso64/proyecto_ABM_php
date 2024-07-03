<?php
    // Agrego la conexión
    include("inc/conexion.php");

    // Recupero los datos del formulario
    $usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
    $clave = filter_var($_POST['clave'],FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'],FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);

    // Encriptamos la clave
    $clave2 = password_hash($clave,PASSWORD_DEFAULT);

    // Verificamos si el usuario ya existe
    $consulta1 = "select count(usuario) as nuevo from users where usuario='$usuario' ";
    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a=mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    }

    // Estructura de decisión
    if($existe==1){
        // El usuario existe, redireccionamos y mandamos el mensaje
        header("location: registro.php?mensaje=uno");
    }else{
        // El usuario no existe, permito la carga de datos
        $alta = "insert into users (usuario,clave,nombre,apellido,correo,fc_alta,estado,rol) values('$usuario','$clave2','$nombre','$apellido','$correo',now(),'Nuevo','Analista')";
        $resultado_alta = mysqli_query($conexion,$alta);
    
        header("location: index.php");
        }










?>