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
                    var_dump($_SESSION);
                ?>
                    <li><a href="catalogo.php">Reportes</a></li>
                    
                <?php
                }
                ?>
                <?php


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
                } elseif (isset($_SESSION["gimnasio"])) {
                ?>
                    <div class="sesion ">
                        <p class="btn btn-success"><i class="fa-regular fa-user sesiones"></i><?= $_SESSION["gimnasio"] ?></p>
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



    <div class="contenedor">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/Membresia550.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/Membresia1500.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/Membresia550.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/Membresia1500.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <p> &lt; </p>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <p> &gt; </p>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>


    <div class="ofrecemos">
        <h1>¿QUE OFRECEMOS? </h1>
        <div class="beneficios row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <div class="contenido col">
                <i class="fa-solid fa-clock"></i>
                <br><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quaerat aliquid suscipit! Sapiente
                    quae, adipisci nobis eum, suscipit porro architecto dolorum minima reprehenderit perspiciatis ea.
                    Totam sed doloremque obcaecati vel!</p>
            </div>
            <div class="contenido col">
                <i class="fa-solid fa-clock"></i>
                <br><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quaerat aliquid suscipit! Sapiente
                    quae, adipisci nobis eum, suscipit porro architecto dolorum minima reprehenderit perspiciatis ea.
                    Totam sed doloremque obcaecati vel!</p>
            </div>
            <div class="contenido col">
                <i class="fa-solid fa-clock"></i>
                <br><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quaerat aliquid suscipit! Sapiente
                    quae, adipisci nobis eum, suscipit porro architecto dolorum minima reprehenderit perspiciatis ea.
                    Totam sed doloremque obcaecati vel!</p>
            </div>

        </div>
    </div>

    <div class="cont" style="width: 100%;">
        <div class="container-fluid  row" style="width: 100%; margin-left:0px;">
            <div class="card" style="width: 18rem; margin-top: 30px;">
                <img src="img/logo.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Primer titulo</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint amet quasi enim
                        perferendis fugiat, qui iusto temporibus numquam culpa, quaerat, ratione fuga ea magnam beatae
                        consequuntur dicta harum repellat illum!</p>
                    <a href="#" class="btn btn-primary">Saber mas...</a>
                </div>
            </div>

            <div class="card" style="width: 18rem; margin-top: 30px;">
                <img src="img/logo2.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Segundo Titulo</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi porro fugit
                        dolore
                        doloribus laudantium fuga nulla odit optio, ullam alias vero harum. Nobis, fugiat? Iste sit
                        molestiae iusto fuga harum.</p>
                    <a href="#" class="btn btn-primary">Saber mas...</a>
                </div>
            </div>

            <div class="card" style="width: 18rem; margin-top: 30px;">
                <img src="img/logo.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tercer titulo</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit aperiam
                        sunt fuga repudiandae rerum, sequi iure, beatae, eius repellendus dolor exercitationem ab ullam
                        sit.
                        Sed quis cumque alias ratione blanditiis!</p>
                    <a href="#" class="btn btn-primary">Saber mas...</a>
                </div>
            </div>
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

<style>
    .row {
        margin-right: 0px;
    }
</style>

</html>




<!--  
    <div class="contenedor">
        <div class="contenidocarr">
            <div class="carrusel">
                <div class="content-carrusel">
                    <div class="itemcarrusel">
                        <img src="img/logo.jpeg" alt="">
                    </div>
                    <div class="itemcarrusel">
                        <img src="img/logo.jpeg" alt="">
                    </div>
                    <div class="itemcarrusel">
                        <img src="img/logo.jpeg" alt="">
                    </div>
                    <div class="itemcarrusel">
                        <img src="img/logo.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->