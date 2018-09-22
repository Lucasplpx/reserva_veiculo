<?php
require 'index.php';
include 'model/Reserva.php';
$reserva = new Reserva();

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $id_carro = $_POST['id_carro'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $pessoa = $_POST['pessoa'];
   

    $reserva->editar($id, $id_carro, $data_inicio, $data_fim, $pessoa);

    header("Location: listaReserva.php");
}