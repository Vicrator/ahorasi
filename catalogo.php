<?php
session_start();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymPass</title>

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
                ?> <li><a href="reportes.php">Reportes</a></li>

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
        <?php
        if (isset($_GET["mensaje"])) {
            echo $_GET["mensaje"];
        }
        ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            require './phpfull/conexion.php';

            $con = $conexion;

            if (isset($_SESSION["gimnasio"])) {
                $idgym = $_SESSION["Usgimnasio"]["id"];

                $sql = $con->prepare("SELECT * FROM membresias where id_gimnasio=$idgym");
            } else {
                $sql = $con->prepare("SELECT * FROM membresias where Activo=1");
            }

            $sql->execute();
            $resultado = $sql->get_result();



            foreach ($resultado as $row) {
                $nombre = $row["Nombre_membresia"];
                $precio = $row["precio"];
                $descripcion = $row["descripcion"];
                $idmem = $row["id_membresia"];
                $activo = $row["Activo"] == 1 ? "Activo" : "Inactivo";
            ?> <div class="col">
                    <div class="card shadow-sm">
                        <img src="img/Membresias/<?php echo $idmem ?>.jpeg" height="202px">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $nombre ?></h3>
                            <p class="card-text"><?php echo $descripcion ?></p>
                            <p class="card-text">$<?php echo number_format($precio, 2, '.', ',') ?></p>
                            <?php
                            if (!isset($_SESSION["gimnasio"])) {
                            ?> <div class="d-flex justify-content-between align-items-center">
                                    <?php
                                    if (!isset($_SESSION["Usuario"])) {

                                    ?>
                                        <a href="iniciousuario.php" class="btn btn-success">Comprar</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="comprar.php?precio=<?=$precio?>&id=<?=$idmem?>" class="btn btn-success">Comprar</a>
                                    <?php
                                    }
                                    ?>

                                    
                                </div>
                            <?php
                            } else {
                            ?> <div class="d-flex justify-content-between align-items-center">
                                    <p>Estado <?= $activo ?></p>
                                    <div class="btn-group">
                                        <?php
                                        if ($activo == "Activo") {

                                        ?>
                                            <a href="phpfull/eliminarmembresia.php?id_membresia=<?= $idmem ?>" class="btn btn-success">inhabilitar</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="phpfull/eliminarmembresia.php?id_memb=<?= $idmem ?>" class="btn btn-success">Habilitar</a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_SESSION["gimnasio"])) {
                $idgym = $_SESSION["Usgimnasio"]["id"];
            ?>
                <div class="card shadow-sm">
                    <a href="membresiadetalles.php?idgim=<?php echo $idgym ?>" class="btn btn-primary">SUBIR NUEVA MEMBRESIA</a>
                </div>

            <?php
            }
            ?>
        </div>
    </div>


    <div class="container-fluid">
        <div class="piedepagina">
            <div class="terminos">
                <a href="#">Terminos y condiciones</a>
                <a href="#">Politicas de privacidad</a>
                <a href="#">Volver al inicio</a>

            </div>

            <div class="logo">
                <img src="img/logo2-removebg-preview.png" alt="" height="100%">
            </div>

            <div class="redes">
                <!-- Facebook -->
                <i class="fab fa-facebook-f"></i>

                <!-- Twitter -->
                <i class="fab fa-twitter"></i>

                <!-- Instagram -->
                <i class="fab fa-instagram"></i>

                <!-- Linkedin -->
                <i class="fab fa-linkedin-in"></i>
                <!-- Whatsapp -->
                <i class="fab fa-whatsapp"></i>

            </div>

        </div>
    </div>
</body>

</html>