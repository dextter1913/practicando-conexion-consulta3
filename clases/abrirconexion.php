<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "negocio";
    $tb1 = "usuarios";
    $tb2 = "empleados";
    $conexion = new mysqli($host, $user, $pass, $db);
    error_reporting(10);
    if ($conexion->connect_errno) {
        echo "lo sentimos, estamos trabajando para solucionarlo";
    }
?>