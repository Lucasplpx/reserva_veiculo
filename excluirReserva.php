<?php
require 'index.php';
include 'model/Reserva.php';
include 'model/Cliente.php';
include 'model/Veiculo.php';
require 'model/Devolucao.php';

if(!empty($_GET['id'])){

    $devolucao = new Devolucao();
    $cliente = new Cliente();
    $veiculo = new Veiculo();
    $reserva = new Reserva();
    
    $id = $_GET['id'];

    $lista = $reserva->getReserva($id);

    print_r($lista['pessoa']);
    $nome = $cliente->getNomeCliente($lista['pessoa']);
    $carro = $veiculo->getMarcaVeiculo($lista['id_carro']);
    
    $devolucao->adicionar($nome, $carro);
   
    $devolucao->excluirReserva($id);

   header("Location: devolucao.php");
}else{
   header("Location: devolucao.php");
}