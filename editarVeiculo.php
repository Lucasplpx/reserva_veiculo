<?php 
require 'index.php';
include 'model/Veiculo.php';
$veiculo = new Veiculo();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $veiculo = $veiculo->getVeiculo($id);

    if(empty($veiculo['modelo'])){
        header("Location: listaVeiculo.php");
        exit;
    }
    
}else{
    header("Location: listaVeiculo.php");
    exit;
}

?>

<h1>Alterar dados do Veiculo</h1>


<form action="aditar_submit_veiculo.php" method="post">

    <input type="hidden" name="id" value="<?php echo $veiculo['id']?>"/>

    
    <label for="marca">Marca</label><br/><br/>
    <input type="text" name="marca" value="<?php echo $veiculo['marca']?>" id="marca"/> <br/><br/>

    <label for="modelo">Modelo</label><br/><br/>
    <input type="text" name="modelo" value="<?php echo $veiculo['modelo']?>" id="modelo"/> <br/><br/>

    <label for="cor">Cor</label><br/><br/>
    <input type="text" name="cor" value="<?php echo $veiculo['cor']?>" id="cor"/> <br/><br/>

    <label for="ano">Ano do Veiculo</label><br/><br/>
    <input type="text" name="ano" value="<?php echo $veiculo['ano']?>" id="ano"/> <br/><br/>




    <input type="submit" value="Alterar"/>

</form>