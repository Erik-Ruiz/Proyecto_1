<?php
// session_start();
// if (empty($_SESSION['login'])) {
//     header("Location: ../pages/index.php");
//     die();
// }
require_once './components/cabecera.html';

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./css/terraza.css" />
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
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen20('imagen2')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen21('imagen2')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen22('imagen2')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen20(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 2";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 2";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                }

                function mostrar_imagen21(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 2";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 2";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 2";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen22(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 2";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 2";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>
        </div>

        <!-- MESA3 -->
        <div class="column-3">
            <h1 class="pado">Mesa3</h1>

            <div id="imagen3">
            <?php
                $sql3 = "SELECT estado FROM tbl_mesa WHERE id = 3";
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
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen30('imagen3')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen31('imagen3')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen32('imagen3')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen30(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 3";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 3";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                }

                function mostrar_imagen31(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 3";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 3";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 3";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen32(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 3";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 3";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>
        </div>

        <!-- MESA4 -->
        <div class="column-3">
            <h1 class="pado">Mesa4</h1>

            <div id="imagen4">
            <?php
                $sql4 = "SELECT estado FROM tbl_mesa WHERE id = 4";
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
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen40('imagen4')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen41('imagen4')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen42('imagen4')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen40(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 4";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 4";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                }

                function mostrar_imagen41(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 4";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 4";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 4";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen42(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 4";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 4";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>
        </div>


        <!-- MESA5 -->
        <div class="column-3">
            <h1 class="pado">Mesa5</h1>

            <div id="imagen5">
            <?php
                $sql5 = "SELECT estado FROM tbl_mesa WHERE id = 5";
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
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen50('imagen5')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen51('imagen5')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen52('imagen5')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen50(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 5";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 5";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                }

                function mostrar_imagen51(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 5";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 5";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 5";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen52(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 5";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 5";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>
        </div>


        <!-- MESA6 -->
        <div class="column-3">
            <h1 class="pado">Mesa6</h1>

            <div id="imagen6">
            <?php
                $sql6 = "SELECT estado FROM tbl_mesa WHERE id = 6";
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
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen60('imagen6')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen61('imagen6')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen62('imagen6')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen60(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 6";
                    if (!$sql == 'Libre') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = 6";
                    } else {
                        echo "console.log('Ya esta libre')";
                    }
                    ?>
                }

                function mostrar_imagen61(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 6";
                    if (!$sql == 'Ocupado') {
                        $sqll = "UPDATE tbl_mesa SET cont = cont+4 WHERE id = 6";
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Ocupado' WHERE id = 6";
                    } else {
                        echo "console.log('Ya esta ocupado')";
                    }
                    ?>
                }

                function mostrar_imagen62(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                    <?php
                    $sql = "SELECT estado FROM tbl_mesa WHERE id = 6";
                    if (!$sql == 'Mantenimiento') {
                        $sql2 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = 6";
                    } else {
                        echo "console.log('Ya esta en mantenimiento')";
                    }
                    ?>
                }
            </script>

            <h1>
                Ocupación:
                <?php
                $sql = "SELECT estado FROM tbl_mesa WHERE estado = 'ocupado'";

                ?>

            </h1>
        </div>

        </body>

</html>