<?php

function errorEmail($email){
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error=true;
    }else{
        $error=false;
    }
    return $error;
    
}
function errorPsswd($pass){
    if (preg_match_all('$S*(?=S{8,})S*$', $pass) == true) {
        echo "Correcto";
    } else {
        echo "Incorrecto";
    }
}