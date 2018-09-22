<?php
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();

$lista = $veiculo->getAll();
?>

<html>
    <head>
        <title>Lista Veiculos</title>
        <link rel="stylesheet" href="assets/css/estilo.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>

    </head>
    <body>
        
    <h1>Lista de Veiculos</h1>
    <br/> 
    <a href="veiculo.html" class="modal_ajax">[ Adicionar]</a> 
    <br/> <br/>


    <table border="1" width="700">
        <tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>COR</th>
            <th>ANO</th>
            <th>AÇÕES</th>
        </tr>
        <?php foreach ($lista as $dado):?>
            <tr>
                <td><?php echo $dado['id'];?></td>
                <td><?php echo $dado['marca'];?></td>
                <td><?php echo $dado['modelo'];?></td>
                <td><?php echo $dado['cor'];?></td>
                <td><?php echo $dado['ano'];?></td>
                <td>
                    <a href="editarVeiculo.php?id=<?php echo $dado['id']?>" class="modal_ajax">[ Editar ]</a>
                    <a onclick="return confirm('Deseja excluir?');" href="excluirVeiculo.php?id=<?php echo $dado['id'];?>">[ Excluir ]</a>
                </td>  
            </tr>
        <?php endforeach;?>
    </table>

    <a href="index.html">Página Inicial</a>


    <div class="modal_bg">
        <div class="modal">

        </div>

    </div>