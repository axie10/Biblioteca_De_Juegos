<?php

    include "../security/security.php";
    include "../bd.php";

    //me traigo los datos por separado para comprobar
    $laid1 = $_POST["laid1"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];
    $permisos = $_POST['permisos'];

    //PARA QUE NOS MUESTRE EL ERROR SI NOS FALLA AL CONEXION
    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    }

    if($eviysql = $conexion->prepare('UPDATE usuarios SET usuario  = ? , email = ?, contraseña = ?, ad= ? WHERE id = ?')){

        //Vinculamos el valor que hemos puesto antes de '?' lo que nos estra cpor el formulario '$_POST["usuario"]'.
        $eviysql->bind_param('sssii',$_POST["usuario"],$_POST["email"],$_POST["contraseña"],$_POST["permisos"],$_POST["laid1"]);
        //'Execute' para ejecutar las Consultas Preparadas
        $eviysql->execute();
    }

    $eviysql->close();
    $conexion->close();
?>