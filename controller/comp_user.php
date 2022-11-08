<?php

//Recogemos la contraseña de login.php y la encriptamos en md5 para que en nuestra base de datos reconozca

try{

    $pass = $_POST['pass'];
    $pass = sha1($pass);

    //Llamos la conexión de la base de datos
    require_once 'connection.php';

    //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
    $user=strtolower(mysqli_real_escape_string($conexion,$_POST['mail']));

    // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
    $sql = "SELECT * from tbl_camarero where correo='$user' and contraseña='$pass'";

    $resultado = mysqli_query($conexion,$sql);
    //Si la base de datos es demasiado grande es mejor usar countrows
    $num=mysqli_num_rows($resultado);
    mysqli_free_result($resultado);

    


    //Si existen creamos la session, si no enviamos a login.php 
    if ($num==1){
        session_start();
        $_SESSION['login'] = $user;
        header("Location: ../pages/camareros.php");
    }else{
        echo "Error";
        header("Location: ../index.php?log=1");
    }

}catch(Exception $e){
    header("Location: ../index.php?log=2");
}
