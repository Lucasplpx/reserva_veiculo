<?php
require 'index.php';
include 'model/Reserva.php';
include 'model/Cliente.php';
include 'model/Veiculo.php';

$cliente = new Cliente();
$veiculo = new Veiculo();

if(!empty($_POST['devolucao'])){

    $id = $_POST['devolucao'];
    $reserva = new Reserva();
    $lista = $reserva->getReservaCliente($id);    
} 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/estilo.css"/>
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

    <title>Lista Reservas</title>
</head>
<body>
        
    <h1>Lista de Reservas</h1>

    <br/> <br/>

<table class="table table-dark">
  <thead>
    <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Carro</th>
        <th scope="col">Data Inicio</th>
        <th scope="col">Data Fim</th>
        <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista as $dado):?>
        <tr>
            <td><?php echo $cliente->getNomeCliente($dado['pessoa']);?></td>
            <td><?php echo $veiculo->getMarcaVeiculo($dado['id_carro']);?></td>
            <td><?php echo date_format(new DateTime($dado['data_inicio']), 'd/m/Y');?></td>
            <td><?php echo date_format(new DateTime($dado['data_fim']), 'd/m/Y');?></td>
            <td>
                <a class="badge badge-success" href="editaReserva.php?id=<?php echo $dado['id_r']?>" class="modal_ajax">[ EDITAR ]</a>
                <a class="badge badge-danger" onclick="return confirm('Deseja excluir?');" href="excluirReserva.php?id=<?php echo $dado['id_r'];?>">[ EXCLUIR ]</a>
            </td>  
        </tr>
    <?php endforeach;?>
    <?php 
        if (empty($lista)) {
            //header("Location: index.html");
            echo '<div class="alert alert-danger" style="width: 205px;" role="alert"> Cliente sem reservas !!!</div>';
        }
    
    ?> 

  </tbody>
</table>


<a href="index.html" class="badge badge-light">Página Inicial</a>


</body>
</html>