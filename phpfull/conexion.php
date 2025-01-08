
<?php
/*Puedo ocupar php.init para evitar que los errores se vean en produccion*/ 
$conexion= new mysqli("basegym.mysql.database.azure.com","victorestudiante","soyelestudiante23.","Gymfitpass23-past");
$conexion->set_charset("utf8");
if ($conexion) {
    echo "Bien";
}
else{
    echo "mal";
}
?>