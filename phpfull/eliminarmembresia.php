<?php
// archivo: eliminar_membresia.php
include("phpfull/conexion.php");

if (isset($_GET['id_membresia'])) {
    $id_membresia = intval($_GET['id_membresia']); // Asegura que sea un entero
    $sql = $conexion->prepare("UPDATE membresias SET activo = 0 WHERE id = ?");
    $sql->bind_param("i", $id_membresia);

    if ($sql->execute()) {
        // Redirige con un mensaje de éxito
        header("Location: /catalogo.php?mensaje=Membresia inabilitada");
        exit();
    } else {
        // En caso de error
        header("Location: /catalogo.php?mensaje=error");
        exit();
    }
}
?>
