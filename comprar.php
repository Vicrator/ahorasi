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
    <script src="https://www.paypal.com/sdk/js?client-id=AfaycSjILuybCuvD-t2ppA2OHG_Kno4vQOLmSg_H0VkdsDQZaXhgSyALkKQJBGHFF32YmCkXonwAy449"></script>

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
                ?> <div class="sesion" style="margin: 0px;">
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
        ?> <div class="sesion sesionmenu">
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




    <div class="contenedor">
        <div id="button-paypal"></div>
    </div>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' // Monto de la transacción
                        }
                    }]
                });
            }
        }).render("#button-paypal");
    </script>
</body>

</html>