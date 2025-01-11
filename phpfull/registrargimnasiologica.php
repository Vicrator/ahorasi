<?php

include("conexion.php");

if (!empty($_POST["btnregistrarse"])) {
    $usuariof = $_POST["usuario"];
    $passwordf = $_POST["password"];
    $passwordf2 = $_POST["password2"];
    $correof = $_POST["correo"];
    $correof2 = $_POST["correo2"];
    $telefono = $_POST["numberInput"];
    $cadena = $_POST["cadena"];
    $sucursal = $_POST["sucursal"];
    $ubicacion = $_POST["ubicacion"];
    $tipousuario = 2;
    if (
        !empty($usuariof) && !empty($passwordf) && !empty($passwordf2)
        && !empty($correof) && !empty($correof2) && !empty($telefono)
        && !empty($cadena) && !empty($sucursal) && !empty($ubicacion)
    ) {
        if ($passwordf == $passwordf2) {
            if ($correof == $correof2) {
                $sqlbuscar = $conexion->prepare("SELECT * FROM usuarios WHERE Usuario = ?  ");
                $sqlbuscar->bind_param("s", $usuariof);
                $sqlbuscar->execute();
                $resultados = $sqlbuscar->get_result();
                if ($resultados->num_rows > 0) {
                    echo '<div class="alert alert-danger text-center">Nombre de usuario ocupado</div>';
                } else {
                    $sqlcorreoduplicado = $conexion->prepare("SELECT * FROM usuarios WHERE correo=?");
                    $sqlcorreoduplicado->bind_param("s", $correof);
                    $sqlcorreoduplicado->execute();
                    $result = $sqlcorreoduplicado->get_result();

                    if ($result->num_rows > 0) {
                        echo '<div class="alert alert-danger text-center">Correo ya registrado anteriormente</div>';
                    } else {

                        $sql = $conexion->prepare("INSERT INTO usuarios (Usuario,contrasena,telefono,correo,tipousuario) VALUES (?,?,?,?,?)");
                        $sql->bind_param("ssisi", $usuariof, $passwordf, $telefono, $correof, $tipousuario);
                        if ($sql->execute()) {
                            $sql2 = $conexion->prepare("INSERT INTO gimnasio (Usuario,nombre_cadena,nombre_sucursal,ubicacion) VALUES (?,?,?,?)");
                            $sql2->bind_param("ssss", $usuariof, $cadena, $sucursal, $ubicacion);
                            if ($sql2->execute()) {
                                echo '<div class="alert alert-danger text-center">Gimnasio registrado correctamente</div>';
                            } else {
                                echo '<div class="alert alert-danger text-center">Error al gimnasio registrado correctamente</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger text-center">Error en el registro</div>';
                        }
                    }
                }
            } else {
                echo '<div class="alert alert-danger text-center">correo no coinciden</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">Contraseñas no coinciden</div>';
        }
    } else {
        echo '<div class="alert alert-danger text-center">Rellenar todos los datos</div>';
    }
}
