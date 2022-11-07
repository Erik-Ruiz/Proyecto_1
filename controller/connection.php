<?php
require_once "config.php";
$server = SERVIDOR;
$username = USUARIO;
$password = PASSWORD;
$bd = BD;
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
$conexion = mysqli_connect($server,$username,$password,$bd);

if (mysqli_connect_error()) {
    echo "<script>location.href='../pages/index.php?log=2'</script>";
    exit();
}
