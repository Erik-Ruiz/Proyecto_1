<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../index.php'</script>";

    die();
  }
    require_once '../components/cabecera.php';
    require_once '../controller/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
</head>
<body>
<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Mantenimiento</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Camareros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

        <form  class="d-flex" role="search" action="../controller/logout.php" method="POST">
          <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
        </form>
</body>
</html>