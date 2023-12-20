<?php

    include "bd.php";

    //TRAEMOS LAS VARIABLES
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $email = $_POST["email"];

    //AQUI METEMOS ESTA COMPROBACIÓN PARA EL CONTROL DE ERRORES YA QUE ESTA PARTE DE BACK LA USAMOS TANTO PARA LA VISTA DE REGSTRO COMO PARA LA DE PANEL
    if(isset($_POST["permisos"])){
        $permisos = $_POST["permisos"];
    } else {
        $permisos = 0;
    }
    $control = false;

    //CONTROL DE ERROR DE CONEXION
    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    };

    //HACEMOS LA CONSULTA
    $consulta_registro = "INSERT INTO usuarios(usuario, contraseña, email, ad) VALUES ('$usuario', '$contraseña', '$email', '$permisos')";

    // EJECUTAMOS LA CONSULTA
    $result = $conexion->query($consulta_registro);

    //insert_id para sacar el id de la consulta que acabamos de hacer
    if($idid = $conexion->insert_id){

        //creamos una tabla al registrar el usuario para guardar los juegos que marque como favoritos
        $tableName = "usuario_" . $idid;
        $createTable = "CREATE TABLE $tableName (
        id INT(255) AUTO_INCREMENT PRIMARY KEY,
        id_videojuego INT(11),
        id_usuario INT(11),
        nombre_juego VARCHAR (255),
        ruta VARCHAR (255),
        estreno VARCHAR (255) 
        )";

        $result1 = $conexion->query($createTable);

        header('Location: ../login_entrada.php');

    } else{

?>

    <!-- header('Location: ../login_entrada.php'); -->

<?php

    }
 
?>