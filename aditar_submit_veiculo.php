<?php
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
   

    $veiculo->editar($id, $marca, $modelo, $cor, $ano);

    header("Location: listaVeiculo.php");
}