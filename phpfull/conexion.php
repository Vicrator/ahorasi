
<?php
/*Puedo ocupar php.init para evitar que los errores se vean en produccion*/ 
$conexion= new mysqli("basegym.mysql.database.azure.com","victorestudiante","soyelestudiante23.","Gymfitpass23-past");
$conexion->set_charset("utf8");


// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    // Log de errores en lugar de mostrar mensajes en pantalla
    error_log("Error de conexión: " . $conexion->connect_error);
    die("Error al conectar con la base de datos. Inténtalo más tarde.");
} else {
    echo "Conexión exitosa.";
}
?>