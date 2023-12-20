<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="icon" type="image/jpg" href="img/logo2.jpg"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <script src="jquery/jquery.js"></script>

</head>
<body style="margin-bottom: 40px;">

    <!-- EL DIV PARA LOGEARSE  -->
    <div class="row" id="caja-formulario">

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>

        <div style="border-radius: 30px 30px 30px 30px;" class="col-sm-10 col-md-10 col-lg-10 col-xl-8" id="inicio-sesion">

            <div class = "row" style="height:auto;" >
                <div class="col-sm-4 col-md-4 col-lg-6 col-xl-6 col-xxl-7" style="background-image:url(img/logo3.png); background-size:cover;background-position:center; background-repeat:no-repeat; border-radius: 30px 0px 0px 30px;"></div>

                <div id="caja-inputs" class="col-sm-8 col-md-8 col-lg-6 col-xl-6 col-xxl-5 caja-inputs" style="background-color: rgba(0, 0, 255, 0.355);border-radius: 0px 30px 30px 0px;">

                    <form action= "back/login.php"method="POST" style="padding-top: 40%;">

                        <h2>WELCOME</h2>
                        <br>
                        <div>
                            <label></label>
                            <br>
                            <input name="email" id="input-usuario" type="text" style="border: 1px solid mediumpurple;border-radius: 3%;background-color: white; height:40px; width:100%;" required autocomplete="off" placeholder="EMAIL">
                            <hr>
                        </div>
                        <br>
                        <div>
                            <label></label>
                            <br>
                            <input name="contraseña" id="input-contraseña" type="password" style="border: 1px solid mediumpurple;border-radius: 3%;background-color: white; height:40px; width:100%;" required autocomplete="off" placeholder="CONTRASEÑA">
                            <hr>
                        </div>
                        
                        <br>
                        <button id="boton-iniciarsesion" type="submit" class="btn btn-md" style="background: #5d81d096; box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.468); font-weight: 500; width:4cm">Iniciar Sesion</button>
                        <button id="boton-registro" type="button" class="btn btn-md" style="background: #9886eadc;margin-left: 3pt; font-weight: 400;width:2.7cm;border: 1px solid mediumpurple;">Registrarse</button>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
            

        </div>

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
    
    </div>

    <!-- EL DIV PARA REGISTRARSE -->
    <div class="row" id="caja-registro">

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-3"></div>

        <div style="border-radius: 30px 30px 30px 30px;" class="col-sm-10 col-md-10 col-lg-10 col-xl-6" id="inicio-sesion">

            <div style="height:auto;" class = "row">
            
                <div class="col 6" style="background-image:url(img/logo3.png); background-size:cover;background-position:center; background-repeat:no-repeat;border-radius: 30px 0px 0px 30px;"></div>

                <div id="caja-inputs" class="col 6" style="background-color: rgba(0, 0, 255, 0.355);border-radius: 0px 30px 30px 0px;">
                    <form action="back/registrarse.php" method="POST" style="padding-top: 40%;">
                        <h2>Registrarse</h2>
                        <br>
                        <div>
                            <label>USUARIO</label>
                            <br>
                            <input name="usuario" id="usuario-registro" style="border: 1px solid mediumpurple;border-radius: 3%;background-color: white; height:40px; width:100%;" placeholder="Introduce tu usuario" type="text" require autocomplete="off">
                            <hr>
                        </div>
                        <div>
                            <label>CONTRASEÑA</label>
                            <br>
                            <input name="contraseña" id="contraseña-registro" style="border: 1px solid mediumpurple;border-radius: 3%;background-color: white; height:40px; width:100%;" placeholder="Introduce tu contraseña" type="password" require autocomplete="off">
                            <hr>
                        </div>
                        <div>
                            <label>EMAIL</label>
                            <br>
                            <input name="email" id="contraseña-registro" style="border: 1px solid mediumpurple;border-radius: 3%;background-color: white; height:40px; width:100%;" placeholder="Introduce tu email" type="email" require autocomplete="off">
                            <hr>
                        </div>
                        <br>

                        <button id="boton-registrarse" type="submit" class="btn btn-md" style="background: #5d81d096; box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.468);">Registrarse</button>

                        <button id="boton-volver" type="button" class="btn btn-md" style="background: #9886eadc; margin-left:3pt;">Volver</button>
                    </form>  
                    <br>
                    <br>
                </div>
            </div>
            

        </div>

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-3"></div>
    
    </div>

   
</body>


<script>

    //Ocultamos el formulario de registro
    $("#caja-registro").hide();
    $("#caja-entrar").hide();

    //Cuando pulsamos el BOTON-REGISTRARSE, ocutamos el formulario-inicio-sesion y mostramos el formulario-registro
    $("#boton-registro").click(function(){
        $("#caja-formulario").hide();
        $("#caja-registro").show();
    })

    //Cuando pulsamos el BOTON-VOLVER, mostramos formulario-inicio-sesion y ocultamos el formulario-registro
    $("#boton-volver").click(function(){
        $("#caja-formulario").show();
        $("#caja-registro").hide();
    })


    $(document).ready(function() {
        // Restablecer los valores de los campos al cargar la página
        $('#caja-formulario').find('input:text, input:password').val('');
    });

</script>

</html>