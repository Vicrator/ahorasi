
<?php
/*Puedo ocupar php.init para evitar que los errores se vean en produccion*/ 
$conexion= new mysqli("basegym.mysql.database.azure.com","victorestudiante","soyelestudiante23.","Gymfitpass23-past");
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
}
?>