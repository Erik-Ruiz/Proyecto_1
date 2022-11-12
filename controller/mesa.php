<?php

require "./connection.php";
$id=$_POST['id'];
$funcion=$_POST['funcion'];

if ($funcion == 'Libre') {
    libre($id);
} else if($funcion == 'Ocupado') {
    ocupar($id);
}else{
    mantener($id);
}

function ocupar($id){
require "./connection.php";

$conexion->autocommit(false);

$conexion->query("UPDATE tbl_mesa SET cont = cont+4, estado = 'Ocupado' WHERE id = $id");
$DateAndTime = date('m-d-Y h:i:s', time());  
$conexion->query("INSERT INTO tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('$DateAndTime','',$id)");

$conexion->commit();
// $pdo->beginTransaction();

// $sql1 = "UPDATE tbl_mesa SET cont = cont+4, estado = 'Ocupado' WHERE id = $id";
// $stmt= $pdo->prepare($sql1);
// $stmt->execute();

// $id = $pdo->lastInsertId();

// $sql2="INSERT INTO tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('$DateAndTime','',$id)";
// $stmt= $pdo->prepare($sql2);
// $stmt->execute();

// $pdo->commit();

// $sql1 = "UPDATE tbl_mesa SET cont = cont+4, estado = 'Ocupado' WHERE id = $id";
// $stmt=mysqli_stmt_init($conexionion);
// mysqli_stmt_prepare($stmt,$sql1);
// mysqli_stmt_execute($stmt);

echo "<script>location.href='../pages/terraza1.php'</script>";
}

function libre($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id");
    $DateAndTimeF = date('m-d-Y h:i:s', time());
    $conexion->query("UPDATE tbl_t_comer SET t_f_comer = '$DateAndTimeF' WHERE id_mesa = $id");

    $conexion->commit();
    // $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id";
    // $stmt=mysqli_stmt_init($conexionion);
    // mysqli_stmt_prepare($stmt,$sql2);
    // mysqli_stmt_execute($stmt);
    echo "<script>location.href='../pages/terraza1.php'</script>";
}

function mantener($id){
    require "./connection.php";
    $sql3 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id";
    $stmt=mysqli_stmt_init($conexionion);
    mysqli_stmt_prepare($stmt,$sql3);
    mysqli_stmt_execute($stmt);
    echo "<script>location.href='../pages/terraza1.php'</script>";
}


// function tiempoinicio($id){
//     require ("./connection.php");

//     $DateAndTime = date('m-d-Y h:i:s', time());  
//     // echo "The current date and time are $DateAndTime";
    
//     $sql1="INSERT INTO tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('$DateAndTime','',$id)";
//     $stmt=mysqli_stmt_init($conexionion);
//     mysqli_stmt_prepare($stmt,$sql1);
    
//     if (mysqli_stmt_execute($stmt) === TRUE) {
//         $last_id = $conexionion->insert_id;
//         // echo "New record created successfully. Last inserted ID is: " . $last_id;
//     } else {
//         echo "Error: " . $sql1 . "<br>" . $conexionion->error;
//     }
    
//     mysqli_stmt_close($stmt);

// }
// function tiempofin($last_id,$id){
    
//     require ("./connection.php");

//     $DateAndTimeF = date('m-d-Y h:i:s', time());  
//     // echo "The current date and time are $DateAndTime";

//     $t_f_comer = "UPDATE tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('','$DateAndTimeF',$id)";

// }
?>