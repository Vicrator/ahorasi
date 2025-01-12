<?php
include("conexion.php");
session_start();
if (empty($_POST["nombre_membresia"]) || empty($_POST["precio"]) || empty($_POST["descripcion"])) {
    header("Location:/membresiadetalles.php?mensaje=<div class='alert alert-danger text-center'>No se llenaron todos los datos</div>");
    exit();
} else {


    if (!empty($_POST["btnregistrar"])) {
        // Validar si se obtuvo el id_gimnasio de $_GET
        if (isset($_SESSION["Usgimnasio"]["id"])) {
            header("Location:/membresiadetalles.php?mensaje=<div class='alert alert-danger text-center'>No se proporcionó el id_gimnasio en la URL.</div>");
            exit();
        } else {
            $id_gimnasio = $_SESSION["Usgimnasio"]["id"];

            // Verificar si se envió el formulario

            $nombre_membresia = $_POST['nombre_membresia'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $activo = isset($_POST['activo']) ? 1 : 0;

            // Insertar en la base de datos
            $sql = "INSERT INTO membresias (id_gimnasio, Nombre_membresia, precio, descripcion, Activo) VALUES ('$id_gimnasio', '$nombre_membresia', '$precio', '$descripcion', '$activo')";
            $stms = $conexion->prepare($sql);
            $stms->execute();
            header("Location:/membresiadetalles.php?mensaje=<div class='alert alert-danger text-center'>Datos insertados correctamente</div>");
            exit();
        }
    }
}
