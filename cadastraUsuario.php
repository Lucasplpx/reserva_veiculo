<?php 
require 'index.php';
include 'model/Usuario.php';
$usuario = new Usuario();

if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $usuario->adicionar($email, $senha);

    
} 
header("Location: listaUsuario.php");