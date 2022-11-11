<?php
require_once '../components/cabecera.php';
require_once '../controller/connection.php';

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/terraza.css" />
</head>
<br>

<div>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">Camareros Terraza 1</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Camareros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body align-self-center text-center">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Terrazas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./terraza1.php">Terraza 1</a></li>
                                <li><a class="dropdown-item" href="./terraza2.php">Terraza 2</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sala Privada
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Sala Privada 1</a></li>
                                <li><a class="dropdown-item" href="#">Sala Privada 2</a></li>
                            </ul>

                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Comedor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="comedor1">Sala 1</a></li>
                                <li><a class="dropdown-item" href="comedor2">Sala 2</a></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
                        <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
                    </form>

                </div>
            </div>
        </div>
    </nav>
    <div class="padding-top">
        <!-- MESA1 -->
        <div class="column-3">
            <h1 class="pado">Mesa1</h1>

            <div id="imagen">
                <?php
                $sql = "SELECT estado,id FROM tbl_mesa";
                $stmt=mysqli_stmt_init($conexion);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_execute($stmt);
                $resultadoconsulta=mysqli_stmt_get_result($stmt);
                $resultfa=$resultadoconsulta->fetch_all(MYSQLI_ASSOC);
                // mysqli_fetch_all($resultadoconsulta);
                $sql = "SELECT estado FROM tbl_mesa WHERE id = 1";
                if ($sql == 'Libre') {
                    echo "<img src='../img/mesaPequeLibre.png' />";
                } else if ($sql == 'Ocupado') {
                    echo "<img src='../img/mesaPequeOcupada.png' />";
                } else {
                    echo "<img src='../img/mesaPequeMantenimiento.png' width='480px'/>";
                }

                ?>


            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen('imagen')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen1('imagen')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen2('imagen')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen(id) {
                    // img = document.getElementById(id);
                    // img.innerHTML = '<img src="./Mesa_Libre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 1";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 1";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                    location.reload();
                }

                function mostrar_imagen1(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 1";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 1";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 1";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen2(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 1";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 1";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>
        </div>

        <!-- MESA2 -->
        <div class="column-3">
            <h1 class="pado">Mesa2</h1>

            <div id="imagen2">
            <?php
                $sql2 = "SELECT estado FROM tbl_mesa WHERE id = 2";
                if ($sql == 'Libre') {
                    echo "<img src='../img/mesaPequeLibre.png' />";
                } else if ($sql == 'Ocupado') {
                    echo "<img src='../img/mesaPequeOcupada.png' />";
                } else {
                    echo "<img src='../img/mesaPequeMantenimiento.png' width='480px'/>";
                }

                ?>
            </div>
        <?php
        $contmesa=0;
        foreach($resultfa as $mesa){
                if ($resultfa[$contmesa]['estado'] == 'Libre') {
                    echo "<img src='../img/mesa_libre.png' />";
                } else if ($resultfa[$contmesa]['estado'] == 'Ocupado') {
                    echo "<img src='../img/Mesa_Ocupada.png' />";
                } else {
                    echo "<img src='../img/Mesa_reparacion.png' width='480px'/>";
                }?>
            <form method="post" class="padding" action="../controller/mesa.php">
            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">    
                <input type="submit" class="favorite styledc" value="Libre" name="Libre" onClick="javascript:mostrar_imagen('imagen')" />
                <input type='hidden' name='funcion' value='Libre'>    
            </form>
                <form method="post" class="padding" action="../controller/mesa.php">
                    <input type="submit" class="favorite styleda" value="Ocupar" onClick="javascript:mostrar_imagen1('imagen')" />
                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                    <input type='hidden' name='funcion' value='Ocupado'>
                </form>
                <form method="post" class="padding" action="../controller/mesa.php">
                    <input type="submit" class="favorite styledb" value="Mantener" onClick="javascript:mostrar_imagen2('imagen')" />
                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                    <input type='hidden' name='funcion' value='Mantenimiento'>
                </form>
        <?php $contmesa++; } ?>
    </body>
</html>