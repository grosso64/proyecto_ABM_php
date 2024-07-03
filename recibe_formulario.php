<?php

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['pass'];

    if(isset($_POST['l1'])){
        $lenguaje1 = $_POST['l1'];
    }else $lenguaje1 = '';

    if(isset($_POST['l2'])){
        $lenguaje2 = $_POST['l2'];
    }else $lenguaje2='';

    if(isset($_POST['l3'])){
        $lenguaje3 = $_POST['l3'];
    }else $lenguaje3='';   

    // Radio
    if(isset($_POST['nivel'])){
        $nivel = $_POST['nivel'];
    }else $nivel = '';

    // Select
    $selector = $_POST['selector1'];


    $a = $lenguaje1.' '.$lenguaje2.' '.$lenguaje3;

    echo "Nombre recibido: ".$nombre."<br>";
    echo "Apellido recibido: ".$apellido."<br>";
    echo "Clave recibida: ".$clave."<br>";

    echo "Lenguajes preferidos: ".$a."<br>";

    echo "Nivel de Inglés: ".$nivel."<br>";

    echo "Motivo de contacto: ".$selector;
?>