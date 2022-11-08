<?php
session_start();
$logout = $_GET['logout'];

if(isset($logout)){
    session_destroy();
    echo "<script>location.href='../index.php'</script>";
}else{
    header("Location: ../index.php");
}