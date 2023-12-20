<?php

    session_start();
    include "bd.php";

    $email = $_POST["email"];
    $contra = $_POST["contraseña"];
    $control = false;

    //PARA QUE NOS MUESTRE EL ERROR SI NOS FALLA AL CONEXION
    if($conexion->connect_error){
        die("Connection failed: ".$conexion->connect_error);
    }

    //ESCRIBIMOS LA CONSULTA
    $consulta_comprobar = "SELECT * FROM usuarios WHERE email = '$email'";

    //HACEMOS LA QUERY EN $CONEXION DE $CONSULTA_COMPROBAR
    $result = $conexion->query($consulta_comprobar);

    //EMPEZAMOS A HACER COMPROBACIONES NECESARIAS PARA INICIAR SESION O NO
    if( $result-> num_rows > 0){

        while($row = $result->fetch_assoc()){ 

            //$contra == $row['contraseña']

            if( $row['email'] == $email && $row['contraseña'] == $contra ){

                $_SESSION['login'] = 1;
                $_SESSION['id'] = $row["id"];
                $_SESSION['email'] = $email;
                $_SESSION['ad'] = $row["ad"];
                $_SESSION['nombre_usuario'] = $row["usuario"];
                header('Location: ../index.php');
                $control = true;
                break;
                
            }
        
        }

    }

    // Cualquier otro ERROR
    if($control == false) {

?>
    <script>
        alert('error');
        window.location.href = "../index.php";
    </script>

<?php
    }
    
    //CERRAR CONEXION
    $conexion->close();
?>