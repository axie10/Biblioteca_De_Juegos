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
                    if ($_SESSION['ad'] == 1) {
                    ?>

                        <li class="nav-item">
                            <a id="panel" class="nav-link active" href="panel.php">Panel</a>
                        </li>

                    <?php
                    }
                    ?>
                    <li style="margin-left:0%" class="nav-item">
                        <a class="nav-link active" aria-current="page" href="perfil_usuario.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a id="logout" class="nav-link active" href="">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <!-- -----------------------AQUI ES EL SLIDE------------------- -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="border: 0px solid black;" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="max-height: 600px;">
            <div class="carousel-item active" style="height: 600px;">
                <img srcset="https://assets.xboxservices.com/assets/5a/4c/5a4c4d11-fc81-4710-8de1-6660b1575c45.jpg?n=01414_Page-Hero-1084_1920x720_02.jpg" src="https://assets.xboxservices.com/assets/5a/4c/5a4c4d11-fc81-4710-8de1-6660b1575c45.jpg?n=01414_Page-Hero-1084_1920x720_02.jpg" alt="Kiryu se quita las gafas y mira hacia abajo." class="d-block w-100" style="height: 600px;">
                <!-- <div class="position-absolute text-primary" style="top: 0; left: 0; padding: 300px;">
                    <h2>SUSCRÍBETE A NUESTRO PLAN</h2>
                    <h5 style="color: rgba(0, 0, 255, 0.9);">El primer mes de suscripción desde 1 euro.</h5>
                    <br>
                    <button class="btn btn-dark">Suscríbete</button>
                </div> -->
            </div>
            <div class="carousel-item" style="height: 600px;">
                <img src="img/foto67.jpg" class="d-block w-100" alt="..." style="height: 600px;">
                <!-- <div class="position-absolute text-primary" style="top: 0; left: 0; padding: 300px;">
                    <h2>OFERTAS EN MÁS DE 80 JUEGOS</h2>
                    <h5>Explora nuestra biblioteca</h5>
                    <a href="vista_juego.php"><button class="btn btn-dark">Explorar</button></a>
                </div> -->
            </div>
            <div class="carousel-item" style="height: 600px;">
                <img src="img/foto33.jpg" class="d-block w-100" alt="..." style="height: 600px;">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>SUSCRÍBETE A NUESTRO PLAN</h5>
                    <p>El primer mes de suscripción desde 1 euro.</p>
                </div> -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- -------------------AQUI ES DONDE VA LA BILBIOTECA DE LOS JUEGOS---------------- -->

    <!-- donde esta la barra de los filtros -->
    <div style="margin: 50px;">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Género
            </button>
            <ul class="dropdown-menu">
                <li><button id="boton-todos" class="dropdown-item" href="#">Todos</button></li>
                <li><button id="boton-accion" class="dropdown-item" href="#">Acción y Aventura</button></li>
                <li><button id="boton-superviviencia" class="dropdown-item" href="#">Superviviencia</button></li>
                <li><button id="boton-clasicos" class="dropdown-item" href="#">Clasicos</button></li>
                <li><button id="boton-niños" class="dropdown-item" href="#">Familia y niños</a></li>
                <li><button id="boton-simulacion" class="dropdown-item" href="#">Simulación</button></li>
                <li><button id="boton-deportes" class="dropdown-item" href="#">Deportes</button></li>
            </ul>
        </div>



    </div>



    <!-- DIV DE TODOS LOS JUEGOS -->

    <div class="container-fluid mt-4" id="div-todos-juegos">
        <?php
        include "back/bd.php";

        $consulta = "SELECT * FROM juegos";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>


    <!-- DIV JUEGOS ACCION -->

    <div class="container-fluid mt-4" id="div-juegos-accion">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 1";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>


    <!-- DIV JUEGOS SUPERVIVIENCIA -->

    <div class="container-fluid mt-4" id="div-juegos-superviviencia">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 2";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>

    <!-- DIV JUEGOS CLASICOS -->

    <div class="container-fluid mt-4" id="div-juegos-clasicos">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 3";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>


    <!-- DIV JUEGOS NIÑOS -->

    <div class="container-fluid mt-4" id="div-juegos-niños">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 4";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>

    <!-- DIV JUEGOS SIMULACION -->

    <div class="container-fluid mt-4" id="div-juegos-simulacion">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 5";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div>';
        }
        ?>

    </div>

    <!-- DIV JUEGOS DEPORTES -->

    <div class="container-fluid mt-4" id="div-juegos-deportes">
        <?php
        include "back/bd.php";


        $consulta = "SELECT * FROM juegos WHERE genero = 6";
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
                                    <h5 style="color: black;" class="card-title"><?php echo $row['nombre'] ?></h5>
                                    <input name="laid" value="<?php echo $row['id'] ?>" type="text" hidden>
                                    <button laid1="<?php echo $row['id'] ?>" type="submit" class="btn btn-primary boton-juego">Ver Juego</button>
                                </form>

                            </div>
                            <br>
                            <!-- //FORMULARIO PARA EL BOTON DE FAVORITO -->
                            <div class="col 4">

                                <form action="back/juegos_favoritos.php" method="POST">
                                    <input name="laid" type="text" value="<?php echo $row['id'] ?>" hidden>
                                    <input name="nombre" type="text" value="<?php echo $row['nombre'] ?>" hidden>
                                    <input name="ruta" type="text" value="<?php echo $row['ruta'] ?>" hidden>
                                    <input name="estreno" type="text" value="<?php echo $row['estreno'] ?>" hidden>
                                    <button style="margin-left: 10px" class="btn btn-outline-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
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

    <!-- //FOOTER -->
    <footer class="footer bg-dark text-white">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información de Contacto</h5>
                    <p>Dirección: Calle Serrano, Madrid</p>
                    <p>Email: xbox@email.com</p>
                    <p>Teléfono: (123) 456-7890</p>
                </div>
                <div class="col-md-6">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


</body>

<script>
    $("#div-todos-juegos").show();
    $("#div-juegos-accion").hide();
    $("#div-juegos-superviviencia").hide();
    $("#div-juegos-clasicos").hide();
    $("#div-juegos-niños").hide();
    $("#div-juegos-simulacion").hide();
    $("#div-juegos-deportes").hide();

    //juegos todos
    $("#boton-todos").click(function() {
        $("#div-todos-juegos").show()
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").hide();
    })

    //juegos accion
    $("#boton-accion").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").show();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").hide();
    })

    //juegos superviviencia
    $("#boton-superviviencia").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").show();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").hide();
    })

    //juegos clasicos
    $("#boton-clasicos").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").show();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").hide();
    })

    //juegos niños
    $("#boton-niños").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").show();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").hide();
    })

    //juegos simulacion
    $("#boton-simulacion").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").show();
        $("#div-juegos-deportes").hide();
    })

    //juegos deportes
    $("#boton-deportes").click(function() {
        $("#div-todos-juegos").hide();
        $("#div-juegos-accion").hide();
        $("#div-juegos-superviviencia").hide();
        $("#div-juegos-clasicos").hide();
        $("#div-juegos-niños").hide();
        $("#div-juegos-simulacion").hide();
        $("#div-juegos-deportes").show();
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