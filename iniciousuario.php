<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto almacen</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <a href="index.php"><img src="img/logo2-removebg-preview.png" alt="" width="100px"></a>
    <div class="formularioclass">
        <h1>Iniciar sesion </h1>
        <?php
        //include("");
        ?>

        <form action="phpfull/intento.php" method="GET">
            <div class="usuario inputt">
                <input type="text" placeholder="Usuario" name="usuario">

            </div>
            <div class="password inputt">
                <input type="password" placeholder="Contraseña" name="password">

            </div>
            <div class="olvido"><a href="intermedio.html">Crear usuario</a></div>
            <div class="olvido"><a href="">¿Olvido su contraseña?</a></div>
            <input type="submit" name="btnsesion" id="" value="Iniciar sesion">
        </form>
    </div>


</body>

</html>