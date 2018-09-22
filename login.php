<?php

session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    #conexao banco
    require 'config.php';

    #recebendo os dados do formulario
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuario WHERE email = :email and senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();

    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $id = $dado['id']; 
        #Adicionando Ip
        $ip = $_SERVER['REMOTE_ADDR'];

        #Adicionando a sessão
        $_SESSION['lg'] = $id;

        $sql = "UPDATE usuario SET ip = :ip WHERE id = :id ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
        exit;

    }

}

?>
<h1>Login</h1>
<form method="post">
    E-mail: <br/>
    <input type="email" name="email" /> <br/> <br/>

    Senha: <br/>
    <input type="password" name="senha" /> <br/> <br/>

    <input type="submit" value="Entrar" />

</form>