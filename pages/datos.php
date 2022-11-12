<?php
    require_once "../controller/connection.php";
    require_once "../components/cabecera.php";
?>
<?php
        $sql = "SELECT cont FROM tbl_mesa where id=2";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_execute($stmt);
        $resultadoconsulta=mysqli_stmt_get_result($stmt);
        // $resultfa=$resultadoconsulta->fetch_all(MYSQLI_ASSOC);
        echo $resultadoconsulta;


?>
