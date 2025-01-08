
<?php
/*
// Habilitar la visualización de errores temporalmente
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conexion= new mysqli("basegym.mysql.database.azure.com","victorestudiante","soyelestudiante23.","gymfitpass23_past", null, MYSQLI_CLIENT_SSL);
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    // Mostrar HTML con mensaje de error
    echo "
        <div style='color: red; font-family: Arial; padding: 10px; border: 1px solid red;'>
            <h2>Error de conexión</h2>
            <p>Detalles del error: " . htmlspecialchars($conexion->connect_error) . "</p>
        </div>
    ";
} else {
    // Mostrar HTML con mensaje de éxito
    echo "
        <div style='color: green; font-family: Arial; padding: 10px; border: 1px solid green;'>
            <h2>Conexión exitosa</h2>
            <p>Se estableció correctamente la conexión a la base de datos.</p>
        </div>
    ";
}*/
?>



<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = 'basegym.mysql.database.azure.com';
$username = 'victorestudiante';
$password = 'soyelestudiante23.';
$dbname = 'gymfitpass23_past';

// Establecer la conexión con SSL
$conexion = new mysqli($host, $username, $password, $dbname, 3306);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
echo 'Conexión segura establecida con éxito.';
?>
