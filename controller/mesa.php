<?php

require "connection.php";
$id=$_POST['id'];
$funcion=$_POST['funcion'];

if ($funcion == 'Libre') {
    libre($id);
} else if($funcion == 'Ocupado') {
    ocupar($id);
}else if($funcion == 'Mantenimiento'){
    reparar_camarero($id);
}else if($funcion == 'Reparado'){
    Reparado($id);
}

function ocupar($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET cont_personas = cont_personas+4, estado = 'Ocupado' WHERE id = $id");
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

function reparar_camarero($id){
    require "./connection.php";

    $conexion->autocommit(false);
    
    $conexion->query("UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id");
    $DateAndTime = date('m-d-Y h:i:s', time());  
    $conexion->query("INSERT INTO tbl_t_reparacion (t_i_reparacion,t_f_reparacion,id_mesa) VALUES ('$DateAndTime','',$id)");
    
    $conexion->commit();

    // $sql3 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id";
    // $stmt=mysqli_stmt_init($conexionion);
    // mysqli_stmt_prepare($stmt,$sql3);
    // mysqli_stmt_execute($stmt);
    echo "<script>location.href='../pages/terraza1.php'</script>";
}

// function reparado_mantenimiento($id){
//     require "./connection.php";

//     $conexion->autocommit(false);
    
//     $conexion->query("UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id");
//     $DateAndTime = date('m-d-Y h:i:s', time());  
//     $conexion->query("INSERT INTO tbl_t_reparacion (t_i_reparacion,t_f_reparacion,id_mesa) VALUES ('$DateAndTime','',$id)");
    
//     $conexion->commit();

//     // $sql3 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id";
//     // $stmt=mysqli_stmt_init($conexionion);
//     // mysqli_stmt_prepare($stmt,$sql3);
//     // mysqli_stmt_execute($stmt);
//     echo "<script>location.href='../pages/mantenimiento.php'</script>";
// }

function Reparado($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET cont_reparaciones = cont_reparaciones+1, estado = 'Libre' WHERE id = $id");
    $DateAndTimeF = date('m-d-Y h:i:s', time());
    $conexion->query("UPDATE tbl_t_reparacion SET t_f_reparacion = '$DateAndTimeF' WHERE id_mesa = $id");

    $conexion->commit();
    // $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id";
    // $stmt=mysqli_stmt_init($conexionion);
    // mysqli_stmt_prepare($stmt,$sql2);
    // mysqli_stmt_execute($stmt);
    echo "<script>location.href='../pages/mantenimiento.php'</script>";
}

function tiempoComer($id){

    require "./connection.php";

    $sql1 = "SELECT t_i_comer FROM tbl_t_comer where id = $id";
    $sql2 = "SELECT t_f_comer FROM tbl_t_comer where id = $id";


    $fecha1 = new DateTime($sql1);
    $fecha2 = new DateTime($sql2);

    $diferencia = $fecha1 -> diff($fecha2);

    //FALTA MOSTRAR ESTE CAMPO
    echo $diferencia;
}

function tiempoReparacion($id){

    require "./connection.php";

    // $sql1 = "SELECT t_i_reparacion FROM tbl_t_reparacion where id = $id";
    // $sql2 = "SELECT t_f_reparacion FROM tbl_t_reparacion where id = $id";

    $conexion->autocommit(false);

    $fechaInicio=$conexion->query("SELECT t_i_reparacion FROM tbl_t_reparacion where id = $id");

    $fechaFinal=$conexion->query("SELECT t_f_reparacion FROM tbl_t_reparacion where id = $id");

    $conexion->commit();

    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFinal);

    $diferencia = $fecha1 -> diff($fecha2);

    //FALTA MOSTRAR ESTE CAMPO
    echo $diferencia;
}

?>