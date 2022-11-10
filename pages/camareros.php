<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../index.php'</script>";

    die();
  }
    require_once '../components/cabecera.php';
    require_once '../controller/connection.php';
    // header("refresh: 3;");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Camareros</title>
</head>
<body>

<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Camareros</a>

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
              <li><a class="dropdown-item" href="#">Terraza 1</a></li>
              <li><a class="dropdown-item" href="#">Terraza 2</a></li>
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
              <li><a class="dropdown-item" href="#">Sala 1</a></li>
              <li><a class="dropdown-item" href="#">Sala 2</a></li>
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
    
</body>
</html>