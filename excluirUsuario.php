<?php
require 'index.php';
include 'model/Usuario.php';
$usuario = new Usuario();

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $usuario->excluir($id);

    header("Location: listaUsuario.php");
}else{
    header("Location: listaUsuario.php");
}