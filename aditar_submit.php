<?php
require 'index.php';
include 'model/Usuario.php';
$usuario = new Usuario();

if(!empty($_POST['id'])){
    $senha = md5($_POST['senha']);
    $email = $_POST['email'];
    $id = $_POST['id'];

    $usuario->editar($id, $email, $senha);

    header("Location: listaUsuario.php");
}