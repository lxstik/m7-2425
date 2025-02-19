<?php
$host = 'mysql-asans.alwaysdata.net';
$dbname = 'asans_grupo_guarani';
$username = 'asans';
$password = 'soydaw2025';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
} else {
    echo 'CONEXION EXITOSA';
}

$mysqli->set_charset("utf8mb4");
?>


