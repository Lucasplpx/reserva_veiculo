<?php
include 'model/Cliente.php';
$cliente = new Cliente();

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $cliente->excluir($id);

    header("Location: listaCliente.php");
}else{
    header("Location: listaCliente.php");
}