<?php
include("phpfull/conexion.php");

// Validar si se obtuvo el id_gimnasio de $_GET
if (!isset($_SESSION["Usgimnasio"]["id"])) {
    die("No se proporcionó el id_gimnasio en la URL.");
} else {
    $id_gimnasio = $_SESSION["Usgimnasio"]["id"];

    // Verificar si se envió el formulario

    $nombre_membresia = $conexion->real_escape_string($_POST['nombre_membresia']);
    $precio = floatval($_POST['precio']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $activo = isset($_POST['activo']) ? 1 : 0;

    // Insertar en la base de datos
    $sql = "INSERT INTO membresias (id_gimnasio, Nombre_membresia, precio, descripcion, Activo) VALUES ('$id_gimnasio', '$nombre_membresia', '$precio', '$descripcion', '$activo')";

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styleinicio.css">
    <link rel="stylesheet" href="css/boostrapcopy.css">
    <link rel="stylesheet" href="css/stylecatalogo.css">
    <link rel="stylesheet" href="css/stylegim.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Membresía</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input,
        textarea,
        button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .success {
            color: #28a745;
            text-align: center;
        }

        .error {
            color: #dc3545;
            text-align: center;
        }
    </style>

</head>


<body>


    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo2-removebg-preview.png" alt=""></a>
        </div>

        <label class="menu_hamburguesa menuresp" for="menu_responsive">
            <i class="fa-solid fa-list"></i>
        </label>
        <input class="menu_responsive menuresp botonmenuresp" for="menu_responsive" type="checkbox"
            id="menu_responsive">

        <div class="menu">
            <ul class="menus">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="gimnasios.php">Gimnasio</a></li>
                <li><a href="catalogo.php">Membresias</a></li>
                <?php
                if (isset($_SESSION["gimnasio"])) {
                ?> <li><a href="catalogo.php">Reportes</a></li>

                <?php
                }
                ?> <?php

                    if (isset($_SESSION["Usuario"])) {
                    ?> <div class="sesion ">
                        <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["Usuario"] ?></p>
                        <ul class="Menu_vertical">
                            <li><a href="phpfull/cerrarsesion.php">Cerrar sesion</a></li>
                        </ul>
                    </div>
                <?php
                    } elseif (isset($_SESSION["gimnasio"])) {

                ?> <div class="sesion ">
                        <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["gimnasio"] ?></p>
                        <ul class="Menu_vertical">
                            <li><a href="phpfull/cerrarsesion.php">Cerrar sesion</a></li>
                        </ul>
                    </div>
                <?php
                    } else {
                ?> <div class="sesion sesionmenu" style="margin: 0px;">
                        <a href="iniciousuario.php"><i class="fa-solid fa-user"></i></a>

                    </div>
                <?php
                    }
                ?>
            </ul>
        </div>
        <?php
        if (isset($_SESSION["Usuario"])) {
        ?> <div class="sesion sesionmenu">
                <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["Usuario"] ?></p>
                <ul class="Menu_vertical">
                    <li><a href="phpfull/cerrarsesion.php">Cerrar sesion</a></li>
                </ul>
            </div>
        <?php
        } elseif (isset($_SESSION["gimnasio"])) {
        ?> <div class="sesion ">
                <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["gimnasio"] ?></p>
                <ul class="Menu_vertical">
                    <li><a href="phpfull/cerrarsesion.php">Cerrar sesion</a></li>
                </ul>
            </div>
        <?php
        } else {
        ?> <div class="sesion sesionmenu" style="margin: 0px;">
                <a href="iniciousuario.php"><i class="fa-solid fa-user"></i></a>

            </div>
        <?php
        }
        ?>
    </header>

    <div class="container">
        <h1>Registrar Membresía</h1>
        <form method="POST" action="">
            <label for="nombre_membresia">Nombre de la Membresía:</label>
            <input type="text" id="nombre_membresia" name="nombre_membresia" required>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label>
                <input type="checkbox" name="activo"> Activo
            </label>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>

</html>