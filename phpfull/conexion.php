<?php
/*Puedo ocupar php.init para evitar que los errores se vean en produccion*/ 
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);
$conexion= new mysqli("basegym.mysql.database.azure.com","victorestudiante","soyelestudiante23#","gymfitpass23_past");
$conexion->set_charset("utf8");
?>