<?php
require_once 'connection.php';

function errorEmail($conexion){

    try{
    
        $user = $_POST['mail'];        

        //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
        $user=strtolower(mysqli_real_escape_string($conexion,$user));
        // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
        $sql = "SELECT * from tbl_camarero where correo='{$user}";
        $sql = "SELECT * from tbl_mantenimiento where correo='{$user}";
        $resultado = mysqli_query($conexion,$sql);

        var_dump($resultado);
        $num=mysqli_num_rows($resultado);

        if ($num==1){

            $error=true;
            return $error;           
    
        }

        }catch(Exception $e){
            $error=false;
            return $error; 
        }
}
function errorPsswd($conexion){

    try{
    
        $pass = $_POST['pass'];
        $pass = sha1($pass);       

        //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
        $user=strtolower(mysqli_real_escape_string($conexion,$pass));
        // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
        $sql = "SELECT * from tbl_camarero where password='{$pass}";
        
        $resultado = mysqli_query($conexion,$sql);

        var_dump($resultado);
        $num=mysqli_num_rows($resultado);

        if ($num==1){

            $error=true;
            return $error;           
    
        }

        }catch(Exception $e){
            $error=false;
            return $error; 
        }

}



    // if (!preg_match_all('$S*(?=S{8,})S*$', $pass) == true) {
    //     $error=true;
    // } else {
    //     $error=false;
    // }
    // return $error;


        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $error=true;
        // }else{
        //     $error=false;
        // }
        // return $error;