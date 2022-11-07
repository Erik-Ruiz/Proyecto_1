<?php

require_once './validate.php';
require_once '../model/conexion.php';

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$passwordHash = sha1($contraseña);

$correo = $connection->real_escape_string($correo);

$sql = "SELECT * FROM tbl_profesores WHERE correo_profe = '$correo' and contraseña_profe = '$passwordHash';";
$sql2 =  "SELECT * FROM tbl_admin WHERE correo_admin = '$correo' and contraseña_admin = '$passwordHash';";

$stmt = mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location:../index.php?error=errorconexion');
    exit();
}
if (registroCamposVacios($correo, $contraseña) !== FALSE) {
    header('Location:../index.php?error=camposvacios');
    exit();
}
if (errorEmail($correo) !== FALSE) {
    header('Location:../index.php?error=erroremail');
    exit();
}

$resultados = mysqli_query($connection, $sql);
$num = mysqli_num_rows($resultados);
// echo $num;   

$resultados2 = mysqli_query($connection, $sql2);
$num2 = mysqli_num_rows($resultados2);
// echo $num2; 


if ($num == 1) {
    session_start();
    session_destroy();
    session_start();
    $_SESSION['correo'] = $correo;
    echo "<script>window.location.href = '../view/vista.php' </script>";
} else if ($num2 == 1) {
    session_start();
    session_destroy();
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['admin'] = true;
    echo "<script>window.location.href = '../view/vista.php' </script>";
} else {
    echo "<script>window.location.href = '../index.html' </script>";
}