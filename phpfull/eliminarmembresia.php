<?php
// archivo: eliminar_membresia.php
include("conexion.php");

if (isset($_GET['id_membresia'])) {
    $id_membresia =$_GET['id_membresia']; 
    $sql = $conexion->prepare("UPDATE membresias SET activo = 0 WHERE id_membresia = ?");
    $sql->bind_param("i", $id_membresia);
    $sql->execute();
        // Redirige con un mensaje de éxito
        header("Location: /catalogo.php?mensaje=<div class='alert alert-danger text-center'>Membresia inhabilitada exitosamente</div>");
        exit();
    } 

    if (isset($_GET["id_memb"])) {
        $id_membresia =$_GET['id_membresia']; 
        $sql = $conexion->prepare("UPDATE membresias SET activo = 1 WHERE id_membresia = ?");
        $sql->bind_param("i", $id_membresia);
        $sql->execute();
            // Redirige con un mensaje de éxito
            header("Location: /catalogo.php?mensaje=<div class='alert alert-danger text-center'>Membresia habilitada exitosamente</div>");
            exit();
    }
?>
