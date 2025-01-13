<?php
include("conexion.php");
session_start();
if (empty($_GET["id"])) {
    //echo '<div class="alert alert-danger text-center" >User o password vacios</div>';         
} else {
    $id = $_POST["usuario"];
    $sql = $conexion->prepare("SELECT * FROM membresias WHERE id_membresia = ? ");
    $sql->bind_param("i", $id);
    $sql->execute();

    $Resultados = $sql->get_result();
    if ($Resultados->num_rows > 0) {
        /*Mientras creo la parte del usuario*/
        //echo '<div class="alert alert-danger text-center">Muy bien</div>'; 
        $comparacion = $Resultados->fetch_assoc();
        $idmembresia = $comparacion["id_membresia"];
        $precio = $comparacion["precio"];
        $idusuario = $_SESSION["Usiari"]["id"];
        $idgimnasio = $comparacion["id_gimnasio"];


        $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id = ? ");
        $sql->bind_param("i", $idgimnasio);
        $sql->execute();
        $Resultados = $sql->get_result();
        $usuarios = $Resultados->fetch_assoc();

        $nombregim = $usuarios["Usuario"];

        //echo '<div class="alert alert-danger text-center">Entro</div>'; 
        /*Tipo de vista usuario tipo cliente
                echo '<div class="alert alert-danger text-center">Tipo de usuario cliente</div>'; */
        //header("location:https://gymfitpass-f5c7hrcyd7dkcxh2.canadacentral-01.azurewebsites.net");
        //exit;
        // Realiza la redirección

        $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id = ? ");
        $sql->bind_param("i", $idgimnasio);
        $sql->execute();
        $Resultados = $sql->get_result();


        $sql = $conexion->prepare("INSERT INTO compras (id_usuario,id_membresia,nombre_gimnasio,total) VALUES (?,?,?,?,?)");
        $sql->bind_param("iiss",$idusuario,$idmembresia,$nombregim,$precio );
        $sql->execute();
        header("Location:/catalogo.php?mensaje=<div class='alert alert-danger text-center'>Membresia comprada</div>");
        // Asegúrate de detener la ejecución del script después de la redirección
        exit();
    } else {

        header("Location:/iniciousuario.php?mensaje=<div class='alert alert-danger text-center'>Usuario no existe</div>");
        exit();
    }
}
