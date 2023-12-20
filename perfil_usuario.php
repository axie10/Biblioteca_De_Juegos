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

    <!-- NAVBAR -->
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
    <br>

    <!-- DATOS DEL USUARIO -->
    <div class="container">
        <div class="row">
            <div class="col 6">
                <img src="img/foto33.jpg" alt="" style="border: 1px solid white;border-radius: 50%;height: 300px;width: 300px;">
            </div>
            <div class="col 6" style="margin-top: 10%; font-size: large;">

                <?php
                include "back/bd.php";
                $idusu = $_SESSION['id'];

                $consulta = "SELECT * FROM usuarios WHERE id = $idusu";
                $result = $conexion->query($consulta);

                if ($result->num_rows > 0) {
                    echo '<div class="row">';
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <p><strong>Usuario: </strong><?php echo $row['usuario'] ?></p>
                        <p><strong>Email: </strong><?php echo $row['email'] ?></p>
                <?php
                    };
                }
                ?>
            </div>
        </div>
    </div>
    <br>

    <hr>

    <!-- Botones con iconos -->
    <div class="mb-3">
        <button class="btn btn-primary" id="boton_lista">
            <i class="bi bi-list-ol"></i> Lista Numerada
        </button>

        <button class="btn btn-primary" id="boton_cartas">
            <i class="bi bi-card-text"></i> Tarjetas
        </button>
    </div>

    <br>


    <!-- DONDE EMPIEZAN LOS JUEGOS FAVORTIOS -->

    <h3>Biblioteca de favoritos: </h3>
    <br>

    <!-- AQUI ESTA EL CODIGO DEL LISTADO -->

    <div id="juegos-fav-listado">
        <?php
        include "back/bd.php";
        $idusu = $_SESSION['id'];
        $tableName = "usuario_" . $idusu;

        $consulta = "SELECT * FROM $tableName";
        $result = $conexion->query($consulta);

        if ($result->num_rows > 0) {
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
        ?>
                <ol class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo $row['nombre_juego'] ?></div>
                            <div class="fw-bold"><?php echo $row['estreno'] ?></div>
                        </div>
                        <div>
                            <button class="btn btn-primary boton_eliminar" laid1="<?php echo $row['id_videojuego'] ?>">
                                Eliminar
                            </button>
                        </div>
                    </li>
                </ol>

        <?php
            }
            echo '</div>';
        }
        ?>
    </div>



    <!-- AQUI ESTA EL CODIGO DE LAS CARTAS -->

    <div class="container-fluid mt-4" id="juegos-fav-cartas">

        <?php
        include "back/bd.php";
        $idusu = $_SESSION['id'];
        $tableName = "usuario_" . $idusu;

        $consulta = "SELECT * FROM $tableName";
        $result = $conexion->query($consulta);

        if ($result->num_rows > 0) {
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
        ?>

                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                    <div class="card bg-transparent" style="border: 0px solid black;">
                        <img src="<?php echo $row['ruta'] ?>" class="card-img-top mx-auto d-block" style="width: 200px; height: 300px; object-fit: cover;" alt="juego">
                        <div class="card-body">

                            <!-- //FORMULARIO PARA BOTON DE VISTA UNICA DEL JUEGO -->
                            <div class="col 8">
                                <form action="vista_juego.php" method="POST">
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre_juego'] ?></h5>

                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>

        <?php
            }
            echo '</div>';
        }
        ?>
    </div>

    <br>
    <br>

</body>


<script>
    $("#juegos-fav-listado").show();
    $("#juegos-fav-cartas").hide();

    //MOSTRAMOS LA LISTA DE JUEGOS COMO CARTAS
    $("#boton_cartas").click(function() {
        $("#juegos-fav-listado").hide();
        $("#juegos-fav-cartas").show();
        $(document.activeElement).blur();
    })

    //MOSTRAMOS LA LISTA DE JUEGOS COMO UN LISTADO
    $("#boton_lista").click(function() {
        $("#juegos-fav-listado").show();
        $("#juegos-fav-cartas").hide();
        $(document.activeElement).blur();
    })


    //PARA QUE EL USUARIO PUEDA ELIMINAR LOS JUEGOS DE FAVORTIOS
    $(".boton_eliminar").click(function() {

        var laid1 = $(this).attr("laid1");

        $.ajax({
            type: "POST",
            url: "back/borrar_juego_de_favoritos.php",
            data: {
                laid1: laid1
            },
            dataType: "text",
            success: function() {
                location.reload();
            }
        })

    })


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