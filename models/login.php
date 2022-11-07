<?php

require_once './validacion.php';
require_once './conexion.php';

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$passwordHash = sha1($contraseña);

$correo = $connection->real_escape_string($correo);

$sql = "SELECT * FROM tbl_camareros WHERE correo = '$correo' and contraseña = '$passwordHash';";
$sql2 =  "SELECT * FROM tbl_mantenimiento WHERE correo = '$correo' and contraseña = '$passwordHash';";

$stmt = mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location:../index.php?error=errorconexion');
    // echo "<script>location.href='../pages/login.php'</script>";
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
    echo "<script>window.location.href = '../pages/camareros.php' </script>";
} else if ($num2 == 1) {
    session_start();
    session_destroy();
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['admin'] = true;
    echo "<script>window.location.href = '../pages/mantenimiento.php' </script>";
} else {
    echo "<script>window.location.href = '../index.php' </script>";
}