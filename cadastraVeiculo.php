<?php 
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

if(!empty($_POST['modelo'])){
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
 

    $veiculo->adicionar($marca, $modelo, $cor, $ano);

    
} 
header("Location: listaVeiculo.php");