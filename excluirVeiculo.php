<?php
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $veiculo->excluir($id);

    header("Location: listaVeiculo.php");
}else{
    header("Location: listaVeiculo.php");
}