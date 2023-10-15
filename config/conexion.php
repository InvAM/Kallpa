<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "kallpa";
$port = "3306";

$conexion = mysqli_connect($host, $username, $password, $db, $port);

if (!$conexion) {
    die("No se pudo realizar la conexion con la base de datos" . mysqli_connect_errno());
} else {
    echo "Conexion exitosa con la base de datos";
}