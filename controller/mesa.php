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
$sql1 = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = $id";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt,$sql1);
mysqli_stmt_execute($stmt);
$sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = $id";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt,$sql2);
mysqli_stmt_execute($stmt);
echo "<script>location.href='../pages/terraza1.php'</script>";
}

function libre($id){
require "./connection.php";
$sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt,$sql2);
mysqli_stmt_execute($stmt);
echo "<script>location.href='../pages/terraza1.php'</script>";
}

function mantener($id){
    require "./connection.php";
$sql3 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id";
$stmt=mysqli_stmt_init($conexion);
mysqli_stmt_prepare($stmt,$sql3);
mysqli_stmt_execute($stmt);
echo "<script>location.href='../pages/terraza1.php'</script>";
}

?>