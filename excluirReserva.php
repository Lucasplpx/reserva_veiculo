<?php
include 'model/Reserva.php';
$reserva = new Reserva();

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $reserva->excluir($id);

    header("Location: listaReserva.php");
}else{
    header("Location: listaReserva.php");
}