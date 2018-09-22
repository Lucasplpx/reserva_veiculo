<?php
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();

$lista = $cliente->getAll();
?>

<html>
    <head>
        <title>Lista Clientes</title>
        <link rel="stylesheet" href="assets/css/estilo.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>

    </head>
    <body>
        
    <h1>Lista de Clientes</h1>
    <br/> 
    <a href="cliente.html" class="modal_ajax">[ Adicionar]</a> 
    <br/> <br/>


    <table border="1" width="700">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>IDADE</th>
            <th>CPF</th>
            <th>DATA DE NASCIMENTO</th>
            <th>AÇÕES</th>
        </tr>
        <?php foreach ($lista as $dado):?>
            <tr>
                <td><?php echo $dado['id'];?></td>
                <td><?php echo $dado['nome'];?></td>
                <td><?php echo $dado['idade'];?></td>
                <td><?php echo $dado['cpf'];?></td>
                <td><?php echo $dado['data_nascimento'];?></td>
                <td>
                    <a href="editarCliente.php?id=<?php echo $dado['id']?>" class="modal_ajax">[ Editar ]</a>
                    <a onclick="return confirm('Deseja excluir?');" href="excluirCliente.php?id=<?php echo $dado['id'];?>">[ Excluir ]</a>
                </td>  
            </tr>
        <?php endforeach;?>
    </table>

    <a href="index.html">Página Inicial</a>

    <div class="modal_bg">
        <div class="modal">

        </div>

    </div>