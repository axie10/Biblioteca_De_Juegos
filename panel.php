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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>


    <!-- DONDE EMPIEZA LA TABLA DE LOS USUARIOS-->

    <div class="container-fluid" id="caja-tabla-usuario">
        <br>
        <div class="row">
            <h2>TABLA DE USUARIOS</h2>
        </div>
        <hr>

        <!-- ENCABEZADO DE LA TABLA -->
        <div class="row">

            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">USUARIO</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">EMAIL</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">CONTRASEÑA</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">ADMIN/NOADMIN</label>
            </div>
        </div>
        <br>

        <!-- DONDE EMPIEZAN LOS DATOS DE LOS USUARIOS, UTILIZANDO EL PHP PARA PODER SACAR TODOS LOS USUARIOS DEL ARCHIVO  -->
        <?php
        include "back/bd.php";
        $consulta = "SELECT * FROM usuarios";
        $result = $conexion->query($consulta);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
        ?>

                <div class="row border-bottom py-2">

                    <div class="col-2">
                        <input class="form-control border-0" value="<?php echo $row["usuario"] ?>" type="text" id="usuario_<?php echo $row["id"] ?>">
                    </div>

                    <div class="col-2">
                        <input class="form-control border-0" value="<?php echo $row["email"] ?>" type="text" id="email_<?php echo $row["id"] ?>">
                    </div>

                    <div class="col-2">
                        <input class="form-control border-0" value="<?php echo $row["contraseña"] ?>" type="text" id="contraseña_<?php echo $row["id"] ?>">
                    </div>

                    <div class="col-2 text-center">
                        <div class="form-check">
                            <!-- INPUT EN EL CUALO NOS SALE CHECKED O NO EN FUNCION DE SI ES ADMIN O NO -->
                            <input class="form-check-input" type="checkbox" id="permisos_<?php echo $row["id"] ?>" <?php if ($row["ad"] == 1) {echo "checked";} ?>>

                            <!-- NOS MUESTRA DIFERENTES LABEL DEL CHECKED EN FUNCION DE SI ES ADMIN O NO -->
                            <?php if ($row["ad"] == 1){
                            ?>
                                <label class="form-check-label">Administrador</label>
                            <?php } else {
                            ?>
                                <label class="form-check-label">No Administrador</label>
                            <?php } 
                            ?>
                        </div>
                    </div>

                    <!-- BOTON MODIFICAR -->
                    <div class="col-2">
                        <button type="button" class="btn btn-sm btn-info boton-modificar" laid1="<?php echo $row["id"] ?>">Modificar</button>
                    </div>

                    <!-- BOTON BORRAR -->
                    <div class="col-1">
                        <button id="boton-borrar" type="button" class="btn btn-sm btn-danger boton-borrar" laid1="<?php echo $row["id"] ?>">Borrar</button>
                    </div>

                </div>


                <br>

        <?php
            }
        }
        ?>
        <br>

        <!-- BOTON DE VOLVER A INICIO Y DE BORRAR USUARIOS -->
        <div class="row">
            <div class="col-2">
                <button id="boton-volver-de-tabla" type="button" class="btn btn" style="background: #9886eadc;font-weight: 400;border: 1px solid white;">Volver a inicio</button>
            </div>
        </div>
        <br>


    </div>

    <hr style="height: 12px;">

    <!-- PARA REGISTRAR NUEVOS USUAROS DESDE LA TABLA -->

    <div class="container-fluid" id="caja-tabla-usuario">

        <div class="row">
            <h2>PARA REGISTRAR USUARIOS NUEVOS</h2>
        </div>
        <hr>

        <div class="row">

            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">USUARIO</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">EMAIL</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">CONTRASEÑA</label>
            </div>
            <div class="col-2" style="display: grid;justify-content: center;">
                <label for="" style="font-weight: 800;">ADMIN/NOADMIN</label>
            </div>
        </div>
        <br>

        <div class="row border-bottom py-2 mx-2">

            <div class="col-2">
                <input class="form-control border-0" value="" type="text" id="usuario_añadirdesdetabla" style="background-color: rgba(0, 17, 255, 0.363)">
            </div>

            <div class="col-2">
                <input class="form-control border-0" value="" type="text" id="email_añadirdesdetabla" style="background-color: rgba(0, 17, 255, 0.363)">
            </div>

            <div class="col-2">
                <input class="form-control border-0" value="" type="text" id="contraseña_añadirdesdetabla" style="background-color: rgba(0, 17, 255, 0.363)">
            </div>

            <div class="col-2 text-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permisos_añadirdesdetabla" style="background-color: rgba(0, 17, 255, 0.363)">
                    <label class="form-check-label" for="permisos_añadirdesdetabla">Permisos</label>
                </div>
            </div>

            <div class="col-2">
                <button id="boton-añadirusuario-desde-tabla" type="button" class="btn btn-md" style="background: #9886eadc; margin-left: 3pt; font-weight: 400; border: 1px solid white;">Añadir Usuario</button>
            </div>
        </div>

        <br>
        <hr>

    </div>

    <div id="temp"></div>


</body>


<script>

    //PARA VOLVER AL INDEX
    $("#boton-volver-de-tabla").click(function() {
        $(location).attr("href", "index.php")
    });

    //Cuando le damos a BORRAR se nos borren los usuarios que tenemos marcados con el checked
    $(".boton-borrar").click(function() {

        var id = $(this).attr("laid1");

        $.ajax({
            type: "POST",
            url: "back/acciones_panel/borrar_usuarios.php",
            data: {
                id: id,
            },
            success: function() {
                location.reload();
            }
        })
    });

    //AÑADIR usuarios desde el panel
    $("#boton-añadirusuario-desde-tabla").click(function() {

        var usuario = $("#usuario_añadirdesdetabla").val();
        var email = $("#email_añadirdesdetabla").val();
        var contraseña = $("#contraseña_añadirdesdetabla").val();
        var permisos = $("#permisos_añadirdesdetabla").prop("checked");
        if (permisos == true) {
            permisos = 1
        } else {
            permisos = 0
        };

        $.ajax({
            type: "POST",
            url: "back/registrarse.php",
            data: {

                usuario: usuario,
                email: email,
                contraseña: contraseña,
                permisos: permisos
                
            },
            success: function() {
                location.reload();
            }
        })

    });

    //Con el boton MODIFIFICAR al lado de cada usuario podemos modificar sus datos
    $(".boton-modificar").click(function() {

        var laid1 = $(this).attr("laid1");

        var usuario = $("#usuario_" + laid1).val();
        var email = $("#email_" + laid1).val();
        var contraseña = $("#contraseña_" + laid1).val();
        var permisos = $("#permisos_" + laid1).prop("checked");
        if (permisos == true) {
            permisos = 1
        } else {
            permisos = 0
        };

        $.ajax({
            type: "POST",
            url: "back/acciones_panel/modificar_usuario.php",
            data: {
                laid1:laid1,
                usuario: usuario,
                email: email,
                contraseña: contraseña,
                permisos: permisos
            },
            success: function(a) {
                location.reload();
            }

        })




    })
</script>


</html>