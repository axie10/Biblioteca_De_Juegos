<?php

    include "security/security.php";
    include "bd.php";

    $laid1 = $_POST["laid1"];
    $idusu = $_SESSION['id'];
    $tableName = "usuario_" . $idusu;

    //PARA QUE NOS MUESTRE EL ERROR SI NOS FALLA AL CONEXION
    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    }

    //ESCRIBIMOS LA CONSULTA
    $consulta_borrar = "DELETE FROM $tableName WHERE id_videojuego = '$laid1'";

    //HACEMOS LA QUERY EN $CONEXION DE $CONSULTA_COMPROBAR
    $result = $conexion->query($consulta_borrar);
    

    $conexion->close();
?>