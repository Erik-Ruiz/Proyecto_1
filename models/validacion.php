<?php

function registroCamposVacios($correo, $contraseña) {
    if (empty($correo) || empty($contraseña)) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}

function errorEmail($correo) {
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}

function checkusername($username, $conexion) {

    $sql1 = "SELECT * FROM tbl_camarero WHERE correo = ? and contraseña = ?";
    $sql2 = "SELECT * FROM tbl_mantenimiento WHERE correo = ? and contraseña = ?";

    $stmt = mysqli_stmt_init($conexion);

    if(mysqli_stmt_prepare($stmt, $sql1)){


    
        if (!mysqli_stmt_prepare($stmt, $sql1)) {
            header('Location:../login.php?error=errorconexion');
            exit();
    
        }
        mysqli_stmt_bind_param($stmt, "s", $correo, $passwordHash);
        mysqli_stmt_execute($stmt);
        $resultadoconsulta = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultadoconsulta)) {
            $row = true;
        } else {
            $error = false;
        }
        mysqli_stmt_close($stmt);
        return $error;
    } elseif (mysqli_stmt_prepare($stmt, $sql2)){

        if (!mysqli_stmt_prepare($stmt, $sql2)) {
            header('Location:../login.php?error=errorconexion');
            exit();
    
        }
        mysqli_stmt_bind_param($stmt, "s", $correo, $passwordHash);
        mysqli_stmt_execute($stmt);
        $resultadoconsulta = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultadoconsulta)) {
            $row = true;
        } else {
            $error = false;
        }
        mysqli_stmt_close($stmt);
        return $error;
    } else{
        echo("ALGO VA MAL");
    }


}