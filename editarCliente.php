<?php 
require 'index.php';
include 'model/Cliente.php';
$cliente = new Cliente();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $cliente = $cliente->getCliente($id);

    if(empty($cliente['cpf'])){
        header("Location: listaCliente.php");
        exit;
    }
    
}else{
    header("Location: listaCliente.php");
    exit;
}

?>

<h1>Alterar dados do Cliente</h1>


<form action="aditar_submit_cliente.php" method="post">

    <input type="hidden" name="id" value="<?php echo $cliente['id']?>"/>

    
    <label for="nome">Nome</label><br/><br/>
    <input type="text" name="nome" value="<?php echo $cliente['nome']?>" id="nome"/> <br/><br/>

    <label for="idade">Idade</label><br/><br/>
    <input type="number" name="idade" value="<?php echo $cliente['idade']?>" id="idade"/> <br/><br/>

    <label for="cpf">Cpf</label><br/><br/>
    <input type="text" name="cpf" value="<?php echo $cliente['cpf']?>" id="cpf"/> <br/><br/>

    <label for="dataNascimento">Data de Nascimento</label><br/><br/>
    <input type="text" name="dataNascimento" value="<?php echo $cliente['data_nascimento']?>" id="dataNascimento"/> <br/><br/>




    <input type="submit" value="Alterar"/>

</form>