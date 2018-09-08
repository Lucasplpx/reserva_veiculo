<?php
include 'model/Usuario.php';
$usuario = new Usuario();

$lista = $usuario->getAll();
?>

<html>
    <head>
        <title>Lista Usuarios</title>
        <link rel="stylesheet" href="assets/css/estilo.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>

    </head>
    <body>
        
    <h1>Lista de Usuarios</h1>
    <br/> 
    <a href="usuario.html" class="modal_ajax">[ Adicionar]</a> 
    <br/> <br/>


    <table border="1" width="700">
        <tr>
            <th>ID</th>
            <th>E-MAIL</th>
            <th>SENHA</th>
            <th>AÇÕES</th>
        </tr>
        <?php foreach ($lista as $dado):?>
            <tr>
                <td><?php echo $dado['id'];?></td>
                <td><?php echo $dado['email'];?></td>
                <td><?php echo $dado['senha'];?></td>
                <td>
                    <a href="editarUsuario.php?id=<?php echo $dado['id']?>" class="modal_ajax">[ Editar ]</a>
                    <a onclick="return confirm('Deseja excluir?');" href="excluirUsuario.php?id=<?php echo $dado['id'];?>">[ Excluir ]</a>
                </td>  
            </tr>
        <?php endforeach;?>
    </table>

    <a href="index.html">Página Inicial</a>

    <div class="modal_bg">
        <div class="modal">

        </div>

    </div>