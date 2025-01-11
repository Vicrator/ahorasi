<?php
include("conexion.php");
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
                session_start();
                $_SESSION["Usuario"]=$comparacion['Usuario'];
                //echo '<div class="alert alert-danger text-center">Entro</div>'; 
                /*Tipo de vista usuario tipo cliente
                echo '<div class="alert alert-danger text-center">Tipo de usuario cliente</div>'; */
                //header("location:https://gymfitpass-f5c7hrcyd7dkcxh2.canadacentral-01.azurewebsites.net");
                //exit;


                // URL de redirección
                $url = "https://gymfitpass-f5c7hrcyd7dkcxh2.canadacentral-01.azurewebsites.net/";

                // Realiza la redirección
                header("Location:/index.php");

                // Asegúrate de detener la ejecución del script después de la redirección
                exit();
            } else {
                session_start();
                $_SESSION["gimnasio"]=$comparacion['Usuario'];
                $_SESSION["Usuario"]=$comparacion['Usuario'];
                header("Location:/index.php");
                /*Tipo de vista usuario tipo gimnasio
                echo '<div class="alert alert-danger text-center">Tipo de usuario gimnasio</div>'; */
            }
        } else {
            echo '<div class="alert alert-danger text-center">Usuario no existe</div>'; 
        }
    }
}
