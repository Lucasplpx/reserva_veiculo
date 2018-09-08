<?php
include 'model/Cliente.php';
$cliente = new Cliente();

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
   

    $cliente->editar($id, $nome, $idade, $cpf, $dataNascimento);

    header("Location: listaCliente.php");
}