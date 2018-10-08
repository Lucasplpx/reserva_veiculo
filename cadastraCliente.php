<?php 
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();

if(!empty($_POST['cpf'])){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['tel'];
    $celular = $_POST['cel'];


    $cliente->adicionar($nome, $idade, $cpf, $dataNascimento, $endereco, $telefone, $celular);

    
} 
header("Location: listaCliente.php");