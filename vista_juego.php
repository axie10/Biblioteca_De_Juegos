<?php

include "back/security/security.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <script src="jquery/jquery.js"></script>
</head>

<body>
    <!-- --------------AQUI EMPIEZA NAVBAR-------------- -->
    <nav style="height: 120px; font-size: larger;" class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <div>
                <a class="nav-link active" aria-current="page" href="index.php"><img style="height: 60px; width:60px;" src="img/logo3.png" alt=""></a>
            </div>
            <a class="navbar-brand" href="index.php" style="margin-left: 40px;">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vista_juegos.php">Juegos</a>
                    </li>

                    <?php
                    if ($_SESSION['ad'] == 0) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="perfil_usuario.php">Cuenta</a>
                        </li>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['ad'] == 1) {
                    ?>

                        <li class="nav-item">
                            <a id="panel" class="nav-link active" href="panel.php">Panel</a>
                        </li>

                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a id="logout" class="nav-link active" href="">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ---------------AQUI ES LA SECCION DEL JUEGO LA PRIMERA---------------- -->
    <?php
    include "back/bd.php";
    $laid = $_POST['laid'];

    $consulta = "SELECT * FROM juegos WHERE id = '$laid'";
    $result = $conexion->query($consulta);

    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="container my-4" style="margin: 20px">
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-4">
                            <img src="<?php echo $row['ruta'] ?>" class="img-fluid" style="max-height: 300px; object-fit: cover;" alt="juego">
                        </div>
                        <h2 class="mb-3"><?php echo $row['nombre'] ?></h2>
                        <p>Fecha de estreno: <?php echo $row['estreno'] ?></p>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex align-items-center">
                            <p><?php echo $row['descripcion'] ?></p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
    <?php
        }
        echo '</div>';
    }
    ?>



</body>

<script>
    //cerrar sesion
    $("#logout").click(function() {

        $.ajax({
            type: "POST",
            url: "back/logout.php",
            data: {},
            dataType: "text",
        })

    })
</script>

</html>