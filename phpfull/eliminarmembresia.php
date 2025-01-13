<?php
// archivo: eliminar_membresia.php
include("conexion.php");

if (isset($_GET['id_membresia'])) {
    $id_membresia =$_GET['id_membresia']; 
    $sql = $conexion->prepare("UPDATE membresias SET activo = 0 WHERE id = ?");
    $sql->bind_param("i", $id_membresia);
    $sql->execute();
        // Redirige con un mensaje de éxito
        header("Location: /catalogo.php?mensaje=Membresia inabilitada");
        exit();
    } 
?>
