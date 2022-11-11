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