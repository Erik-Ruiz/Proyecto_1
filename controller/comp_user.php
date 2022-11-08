<?php

//Recogemos la contraseña de login.php y la encriptamos en md5 para que en nuestra base de datos reconozca

try{

    $user = $_POST['mail'];

    $pass = $_POST['pass'];
    $pass = sha1($pass);
    

    //Llamos la conexión de la base de datos
    require_once 'connection.php';

    //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
    $user=strtolower(mysqli_real_escape_string($conexion,$user));

    // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
    $sql = "SELECT * from tbl_camarero where correo='{$user}' and password ='{$pass}'";

    $resultado = mysqli_query($conexion,$sql);
    $num=mysqli_num_rows($resultado);


    // mysqli_free_result($resultado);
    // mysqli_free_result($resultado);


    //Si existen creamos la session, si no enviamos a login.php 
    if ($num==1){
        session_start();
        $_SESSION['login'] = $user;
        echo "<script>location.href='../pages/camareros.php'</script>";

    }elseif($num2==1){
        session_start();
        $_SESSION['login'] = $user;
        echo "<script>location.href='../pages/mantenimiento.php'</script>";
    }else{

        // echo "<script>location.href='../index.php?'</script>";

    }

}catch(Exception $e){
    echo $e->getMessage();
    // echo "<script>location.href='../index.php?'</script>";

}
