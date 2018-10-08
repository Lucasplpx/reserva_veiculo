<?php
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();

$lista = $cliente->getAll();
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

    <title>Lista Usuarios</title>
</head>
<body>
        
    <h1>Lista de Clientes</h1>
    <br/> 
    <a href="cliente.html" class="badge badge-info">[ ADICIONAR ]</a> 
    <br/> <br/>

<table class="table table-dark">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">IDADE</th>
        <th scope="col">CPF</th>
        <th scope="col">DATA DE NASCIMENTO</th>
        <th scope="col">ENDERECO</th>
        <th scope="col">TELEFONE</th>
        <th scope="col">CELULAR</th>
        <th scope="col">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista as $dado):?>
        <tr>
            <td><?php echo $dado['id'];?></th>
            <td><?php echo $dado['nome'];?></td>
            <td><?php echo $dado['idade'];?></td>
            <td><?php echo $dado['cpf'];?></td>
            <td><?php echo $dado['data_nascimento'];?></td>
            <td><?php echo $dado['endereco'];?></td>
            <td><?php echo $dado['telefone'];?></td>
            <td><?php echo $dado['celular'];?></td>
            <td>
                <a class="badge badge-success" href="editarCliente.php?id=<?php echo $dado['id']?>" class="modal_ajax">[ EDITAR ]</a>
                <a class="badge badge-danger" onclick="return confirm('Deseja excluir?');" href="excluirCliente.php?id=<?php echo $dado['id'];?>">[ EXCLUIR ]</a>
            </td>  
        </tr>
    <?php endforeach;?>
  </tbody>
</table>


<a href="index.html" class="badge badge-light">Página Inicial</a>



</body>
</html>