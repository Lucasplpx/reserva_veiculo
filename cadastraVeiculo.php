<?php 
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

if(!empty($_POST['modelo'])){
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
    $chassi = $_POST['chassi'];
 

    $veiculo->adicionar($marca, $modelo, $cor, $ano, $chassi);

    
} 
header("Location: listaVeiculo.php");