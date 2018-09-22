<?php
require 'config.php';
session_start();

if(empty($_SESSION['lg'])){
    header("Location: login.php");
} else {
    $id = $_SESSION['lg'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT * FROM usuario WHERE id = :id AND ip = :ip";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":ip", $ip);
    $sql->execute();

    if($sql->rowCount() == 0){
        header("Location: login.php");
        exit;
    }
  
}

?>

<a href="index.html">Acessar Área do Administrador !!!</a>

