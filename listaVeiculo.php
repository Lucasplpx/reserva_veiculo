<?php
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

$lista = $veiculo->getAll();
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

    <title>Lista Veiculos</title>
</head>
<body>
        
    <h1>Lista de Veículos</h1>
    <br/> 
    <a href="veiculo.html" class="badge badge-info">[ ADICIONAR ]</a> 
    <br/> <br/>

<table class="table table-dark">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">MARCA</th>
        <th scope="col">MODELO</th>
        <th scope="col">COR</th>
        <th scope="col">ANO</th>
        <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista as $dado):?>
        <tr>
            <td><?php echo $dado['id'];?></td>
            <td><?php echo $dado['marca'];?></td>
            <td><?php echo $dado['modelo'];?></td>
            <td><?php echo $dado['cor'];?></td>
            <td><?php echo $dado['ano'];?></td>
            <td>
                <a class="badge badge-success" href="editarVeiculo.php?id=<?php echo $dado['id']?>" class="modal_ajax">[ EDITAR ]</a>
                <a class="badge badge-danger" onclick="return confirm('Deseja excluir?');" href="excluirVeiculo.php?id=<?php echo $dado['id'];?>">[ EXCLUIR ]</a>
            </td>  
        </tr>
    <?php endforeach;?>
  </tbody>
</table>


<a href="index.html" class="badge badge-light">Página Inicial</a>



</body>
</html>