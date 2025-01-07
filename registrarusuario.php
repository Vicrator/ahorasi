<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto almacen</title>

    <link rel="stylesheet" href="css/registros.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <a href="index.php"><img src="img/logo2-removebg-preview.png" alt="" width="100px"></a>
    <div class="formularioclass">
        <h1>Registrar usuario </h1>
        <?php
        include("phpfull/registrar.php");
        ?>

        <form action="" method="post">
            <div class="usuario inputt">
                <input type="text" placeholder="Usuario" name="usuario" maxlength="25">

            </div>

            <div class="confirmar">
                <div class="password inputt">
                    <input type="password" placeholder="Contraseña" name="password">
                </div>
                <div class="password inputt">
                    <input type="password" placeholder="Confirmar contraseña" name="password2">
                </div>
            </div>


            <div class="confirmar">
                <div class="correo inputt">
                    <input type="email" placeholder="Correo" name="correo">
                </div>
                <div class="correo inputt">
                    <input type="email" placeholder="Confirmar correo" name="correo2">
                </div>
            </div>


            <div class="numero inputt">
                <input type="text" name="numberInput" oninput="this.value = this.value.replace(/[^0-9]/g, ''); "
                    placeholder="Telefono" maxlength="10">
            </div>


            <div class="olvido"><a href="iniciousuario.php">Iniciar sesion</a></div>
            <div class="botoncentrar">
                <input type="submit" name="btnregistrarse" id="" value="Registrarse">
            </div>
        </form>
    </div>


</body>

</html>