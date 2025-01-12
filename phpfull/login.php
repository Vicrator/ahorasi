<?php
include("conexion.php");
session_start();
if (!empty($_POST["btnsesion"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        //echo '<div class="alert alert-danger text-center" >User o password vacios</div>'; 
        
    } else {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = $conexion->prepare("SELECT * FROM usuarios WHERE Usuario = ? and contrasena = ? ");
        $sql->bind_param("ss", $usuario, $password);
        $sql->execute();

        $Resultados = $sql->get_result();
        if ($Resultados->num_rows > 0) {
            /*Mientras creo la parte del usuario*/
            //echo '<div class="alert alert-danger text-center">Muy bien</div>'; 
            $comparacion = $Resultados->fetch_assoc();
            if ($comparacion['tipousuario'] == "1") {                

                $_SESSION["Usuario"]=$comparacion['Usuario'];
                //echo '<div class="alert alert-danger text-center">Entro</div>'; 
                /*Tipo de vista usuario tipo cliente
                echo '<div class="alert alert-danger text-center">Tipo de usuario cliente</div>'; */
                //header("location:https://gymfitpass-f5c7hrcyd7dkcxh2.canadacentral-01.azurewebsites.net");
                //exit;
                // Realiza la redirección
                header("Location:/index.php");
                // Asegúrate de detener la ejecución del script después de la redirección
                exit();
            } elseif($comparacion['tipousuario'] == "2") {
                $_SESSION["gimnasio"]=$comparacion['Usuario'];
                header("Location:/index.php");
                exit();
                /*Tipo de vista usuario tipo gimnasio
                echo '<div class="alert alert-danger text-center">Tipo de usuario gimnasio</div>'; */
            }
        } else {
            $mensaje= '<div class="alert alert-danger text-center">Usuario no existe</div>'; 
            header("Location:/iniciousuario.php");
            exit();
        }
    }
}
?>