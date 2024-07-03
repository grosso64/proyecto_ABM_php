<?php
    // Conexion a la BDD
    include("inc/conexion.php");

    // Levantamos los datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    // Verificamos si el usuario ya existe
    $consulta1 = "select count(usuario) as nuevo from usuario where usuario='$usuario' ";
    $resultado1 = mysqli_query($conexion,$consulta1);

    while($a=mysqli_fetch_assoc($resultado1)){
        $existe = $a['nuevo'];
    }

    // Estructura de decisión
    if($existe==1){
        // El usuario existe, redireccionamos y mandamos el mensaje
        header("location: alta_usuario.php?mensaje=uno");
    }else{
        // El usuario no existe, permito la carga de datos
        $alta = "insert into usuario values('$usuario','$clave','$rol')";
        $resultado_alta = mysqli_query($conexion,$alta);

        header("location: abm.php");
    }








?>