<?php
        // PASO 1) Datos de conexión
        $usuario = 'root';
        $clave = '';
        $servidor = 'localhost';
        $basededatos = 'tp2';

        // PASO 2) Creo la conexión
        $conexion = mysqli_connect($servidor,$usuario,$clave);

        // PASO 3) Me conecto a la base de datos
        $db = mysqli_select_db($conexion,$basededatos);
?>