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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymPass</title>

</head>

<body>
    <?php
    require './phpfull/conexion.php';


    $con = $conexion;

    $sql = $con->prepare("SELECT * FROM gimnasio ");
    $sql->execute();
    $resultado = $sql->get_result();


    ?>

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
                session_start();

                $si = false;
                if (isset($_GET["validado"])) {
                    $_SESSION = [];
                    session_destroy();
                    $si = true;
                }
                if (isset($_SESSION["Usuario"])) {
                ?>
                    <div class="sesion ">
                        <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["Usuario"] ?></p>
                        <ul class="Menu_vertical">
                            <li><a href="index.php?validado=true">Cerrar sesion</a></li>
                        </ul>
                    </div>
                <?php
                } else {
                ?>
                    <div class="sesion sesionmenu" style="margin: 0px;">
                        <a href="iniciousuario.php"><i class="fa-solid fa-user"></i></a>
                    </div>
                <?php
                }
                ?>

            </ul>
        </div>
        <?php
        if (isset($_SESSION["Usuario"])) {
        ?>
            <div class="sesion sesionmenu">
                <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["Usuario"] ?></p>
                <ul class="Menu_vertical">
                    <li><a href="index.php?validado=true">Cerrar sesion</a></li>
                </ul>
            </div>
        <?php
        } else {
        ?>
            <div class="sesion sesionmenu" style="margin: 0px;">
                <a href="iniciousuario.php"><i class="fa-solid fa-user"></i></a>
            </div>
        <?php
        }
        ?>
    </header>



    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach ($resultado as $row) {
                $Usuario = $row["Usuario"];
                $Cadena = $row["nombre_cadena"];
                $sucursal = $row["nombre_sucursal"];
                $ubicacion = $row["ubicacion"];
                $idmem = $row["id_gimnasio"];
            ?>
                <div class="col">
                    <div class="card shadow-sm" style="border: 4px greenyellow solid; ">
                        <img src="img/Gymnasios/<?php echo $idmem ?>.jpeg" height="202px">
                        <div class="card-body">
                            <h1 class="card-title text-danger"><?php echo strtoupper($Cadena) ?></h1>
                            <p class="card-text"><?php echo $sucursal ?></p>
                            <h3 class="card-title text-danger">UBICACION</h3>
                            <p class="card-text"> <?php echo $ubicacion ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="gimnasiosdetalles.php?id=<?= $idmem ?>" class="btn btn-primary">Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
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