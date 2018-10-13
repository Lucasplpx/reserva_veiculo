<?php
require 'index.php';
include 'model/Devolucao.php';
include 'model/Cliente.php';
$cliente = new Cliente();
$devolucao = new Devolucao();

$lista = $devolucao->getDevolucoes();
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

    <title>Lista de Devoluções</title>
</head>
<body>
        
    <h1>Lista de Devolução</h1>
    <br/> 
    <a href="cliente.html" class="badge badge-info">[ ADICIONAR ]</a> 
    <br/> <br/>

<table class="table table-dark">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">CLIENTE</th>
        <th scope="col">VEICULO</th>
        <th scope="col">DATA DEVOLUCAO</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista as $dado):?>
        <tr>
            <td><?php echo $dado['id'];?></th>
            <td><?php echo $dado['pessoa'];?></td>
            <td><?php echo $dado['carro'];?></td>
            <td><?php echo date_format(new DateTime($dado['data_devolucao']), 'd/m/Y H:i:s'); ?></td>
        </tr>
    <?php endforeach;?>
  </tbody>
</table>


<a href="index.html" class="badge badge-light">Página Inicial</a>



</body>
</html>