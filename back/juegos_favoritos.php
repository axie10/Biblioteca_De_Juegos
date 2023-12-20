<?php

    include "security/security.php";
    include "bd.php";

    $laid = $_POST['laid'];
    $nombre = $_POST['nombre'];
    $ruta = $_POST['ruta'];
    $estreno = $_POST['estreno'];
    $idusu = $_SESSION['id'];
    

    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    }

    $tableName = "usuario_" . $idusu;

    //ESCRIBIMOS LA CONSULTA
    $consulta_añadir = "INSERT INTO $tableName(id_videojuego, id_usuario, nombre_juego, ruta, estreno) VALUES ('$laid', '$idusu', '$nombre', '$ruta', '$estreno')";

    //HACEMOS LA QUERY EN $CONEXION DE $CONSULTA_COMPROBAR
    $result = $conexion->query($consulta_añadir);

    $conexion->close();
    header('Location: ../index.php');

?>