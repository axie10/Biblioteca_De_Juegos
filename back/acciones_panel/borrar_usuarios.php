<?php

    include "../bd.php";
    include "../security/security.php";

    $id = $_POST['id'];

    //PARA QUE NOS MUESTRE EL ERROR SI NOS FALLA AL CONEXION
    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    }

    //ESCRIBIMOS LA CONSULTA
    $consulta_borrar = "DELETE FROM usuarios WHERE id = '$id'";

    //HACEMOS LA QUERY EN $CONEXION DE $CONSULTA_COMPROBAR
    $result = $conexion->query($consulta_borrar);

    $tabla_usuario = "usuario_" . $id;
    $eliminar_tabla_usuario = "DROP TABLE IF EXISTS $tabla_usuario";
    $eliminar_tabla = $conexion->query($eliminar_tabla_usuario);

    $conexion->close();

?>