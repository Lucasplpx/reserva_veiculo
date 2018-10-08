<?php 
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();

if(!empty($_POST['cpf'])){
    $nome = $_POST['nome'];
    //$idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = trim($_POST['endereco']);
    $telefone = $_POST['tel'];
    $celular = $_POST['cel'];

    $dataConvertida =  $cliente->converteData($_POST['dataNascimento']);
    $idadePelaData = $cliente->getIdade($dataConvertida); 

 

    $cliente->adicionar($nome, $idadePelaData, $cpf, $dataNascimento, $endereco, $telefone, $celular);

    
} 
header("Location: listaCliente.php");