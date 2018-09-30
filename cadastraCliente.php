<?php 
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();

if(!empty($_POST['cpf'])){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];


    $cliente->adicionar($nome, $idade, $cpf, $dataNascimento);

    
} 
header("Location: listaCliente.php");