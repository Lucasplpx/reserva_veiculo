<?php 
include 'model/Usuario.php';
$usuario = new Usuario();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $usuario = $usuario->getUsuario($id);

    if(empty($usuario['email'])){
        header("Location: listaUsuario.php");
        exit;
    }
    
}else{
    header("Location: listaUsuario.php");
    exit;
}

?>

<h1>Alterar dados do Usuario</h1>


<form action="aditar_submit.php" method="post">

    <input type="hidden" name="id" value="<?php echo $usuario['id']?>"/>

    
    <label for="email">E-mail</label><br/><br/>
    <input type="email" name="email" value="<?php echo $usuario['email']?>" id="email"/> <br/><br/>

    <label for="senha">Senha</label><br/><br/>
    <input type="text" name="senha" value="<?php echo $usuario['senha']?>" id="senha"/> <br/><br/>


    <input type="submit" value="Alterar"/>

</form>