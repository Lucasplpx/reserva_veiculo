<?php
include 'model/Usuario.php';
$usuario = new Usuario();

if(!empty($_POST['id'])){
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $usuario->editar($id, $email, $senha);

    header("Location: listaUsuario.php");
}