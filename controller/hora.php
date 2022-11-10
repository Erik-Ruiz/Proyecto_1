<?php

function tiempoinicio(){
    require ("./connection.php");

    $DateAndTime = date('m-d-Y h:i:s', time());  
    // echo "The current date and time are $DateAndTime";
    
    $sql1="INSERT INTO tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('$DateAndTime','',2)";
    $stmt=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($stmt,$sql1);
    
    if (mysqli_stmt_execute($stmt) === TRUE) {
        $last_id = $conexion->insert_id;
        // echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql1 . "<br>" . $conexion->error;
    }
    
    mysqli_stmt_close($stmt);


    return $last_id;
}
echo tiempoinicio();



function tiempofin($last_id){
    
    require ("./connection.php");

    $DateAndTimeF = date('m-d-Y h:i:s', time());  
    // echo "The current date and time are $DateAndTime";

    $t_f_comer = "UPDATE tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('','$DateAndTimeF',2)";


    
    // $stmt=$pdo->prepare("SELECT id FROM tbl_t_comer WHERE t_i_comer='',id=''");
    // $stmt->bindParam(':nombre', $alu->nombre);

    // $DateAndTime2 = date('m-d-Y h:i:s', time());
    // $ka="SELECT id from tbl_t_comer WHERE ('','$DateAndTime','',2)";  
    // $sql4="SELECT id_comer from tbl_t_comer WHERE ('','$DateAndTime','',2)";  
    // $sql=("UPDATE INTO tbl_tiempo (id,tiempo_inicio,tiempo_fin) VALUES ('$id2',NULL,'$DateAndTime2')");
}

// function concat(){
// $DateAndTime3 ="SELECT id,tiempo_inicio,tiempo_fin,CONCAT(FLOOR(hours_part / 3600), ' hours ',FLOOR(minutes_part / 60), ' minutes ',seconds_part, ' seconds') AS diferencia FROM tbl_tiempo";
// echo $DateAndTime3;
// }


// $pdo->beginTransaction();
// $sql=("INSERT INTO tbl_tiempo (id,tiempo_inicio,tiempo_fin) VALUES (NULL,?,NULL)");
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(1, $DateAndTime);
// $stmt->execute();

?>